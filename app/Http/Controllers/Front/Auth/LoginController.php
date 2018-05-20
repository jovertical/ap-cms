<?php

namespace App\Http\Controllers\Front\Auth;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('front.guest')->except('logout');
    }

    public function showLoginForm()
    {
        $classes = [
          'Cosmetics11_Cosmetics_store2'
        ];

        return view(user_env().'.auth.login', compact('classes'));
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string|min:6|max:255',
            'password'  => 'required|string|min:6|max:255'
        ]);

        // login attempt
        if ($this->attempt($request)) {
            // if login attempt is successful
            $request->session()->regenerate();

            if (url()->previous() == route(user_env().'.login')) {
                return redirect()->route(user_env().'.home');
            }

            return back();
        }

        // if login attempt failed
        throw ValidationException::withMessages(['name' => [trans('auth.failed')]]);

        return back();
    }

    protected function attempt(Request $request)
    {
        $username = filter_var($request->input('name'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        return  Auth::attempt([
                    $username   => $request->input('name'),
                    'password'  => $request->input('password'),
                    'verified'  => 1,
                    'active'    => 1,
                    'type'      => 'user'
                ], $request->filled('remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        session()->flash('message', [
            'type' => 'success',
            'content' => 'You have been logged out from the system.'
        ]);

        return redirect()->route(user_env().'.login');
    }
}
