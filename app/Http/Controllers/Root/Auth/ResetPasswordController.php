<?php

namespace App\Http\Controllers\Root\Auth;

use Notify;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        $password_reset = DB::table('password_resets')->where('token', $token)->first();

        if (is_null($password_reset)) {
            session()->flash('message', [
                'type' => 'danger',
                'content' => 'There are problems reseting your account. Please try again.'
            ]);

            return redirect()->route(user_env().'.password.request');
        }

        return view('root.auth.passwords.reset', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function reset(Request $request, $token)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6|max:255|pwned:100'
        ]);

        try {
            $password_reset = DB::table('password_resets')->where('token', $token)->first();
            $user = User::where('email', $password_reset->email)->first();
            $user->password = bcrypt($request->input('password'));

            if ($user->save()) {
                DB::table('password_resets')->where('token', $token)->delete();

                Auth::loginUsingId($user->id);

                Notify::success(greet(), '');

                return redirect()->route('root.home');
            }

            session()->flash('message', [
                'type' => 'warning',
                'content' => 'We cannot reset your password. Please try again.'
            ]);
        } catch (Exception $e) {
            session()->flash('message', [
                'type' => 'danger',
                'content' => $e->getMessage()
            ]);
        }

        return back();
    }
}
