<?php

namespace App\Http\Controllers\Front\Auth;

use App\User;
use App\Notifications\PasswordResetLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(user_env().'.guest');
    }

    public function showLinkRequestForm()
    {
        return view(user_env().'.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ]);

        $email = $request->input('email');
        $token = create_random_token();
        $user = User::where('email', $email)->where('type', 'user')->first();

        if ($user != null) {
            $user->notify(new PasswordResetLink($user, $token));

            // destroy password reset.
            DB::table('password_resets')->where('email', $user->email)->delete();
            // store password reset.
            DB::table('password_resets')->insert(
                ['email' => $user->email, 'token' => $token]
            );

            session()->flash('message', [
                'type' => 'success',
                'content' => 'Password reset link has been sent to your email.'
            ]);

            return back();
        }

        session()->flash('message', [
            'type' => 'danger',
            'content' => 'We cannot find your account.'
        ]);

        return back();
    }
}
