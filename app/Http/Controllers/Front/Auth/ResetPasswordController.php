<?php

namespace App\Http\Controllers\Front\Auth;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    protected $redirectTo = '/user';

    public function __construct()
    {
        $this->middleware(user_env().'.guest');
    }

    public function showResetForm(Request $request, $token = null)
    {
        $password_reset = DB::table('password_resets')->where('token', $token)->first();
        $email = $request->input('email');

        if (is_null($password_reset)) {
            session()->flash('message', [
                'type' => 'danger',
                'content' => 'There are problems reseting your account. Please try again.'
            ]);

            return redirect()->route(user_env().'.password.request');
        }

        return view(user_env().'.auth.passwords.reset', compact(['email', 'token']));
    }

    public function reset(Request $request, $token)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6|max:255|pwned:100'
        ]);

        $password_reset = DB::table('password_resets')->where('token', $token)->first();

        $user = User::where('email', $password_reset->email)->first();
        $user->password = bcrypt($request->input('password'));
        $user->save();

        DB::table('password_resets')->where('token', $token)->delete();

        Auth::loginUsingId($user->id);

        return redirect()->route(user_env().'.home');
    }
}
