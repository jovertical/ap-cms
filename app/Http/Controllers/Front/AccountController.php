<?php

namespace App\Http\Controllers\Front;

use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function profile()
    {
        $user = auth()->user();

        return view(user_env().'.account.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date|before:18 years ago',
            'province' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'contact_number' => 'required|max:255',
            'tin' => 'required|max:255',
            'occupation' => 'required|max:255',
        ], [
            'birthdate.before' => 'You must be 18 years old.'
        ]);

        try {
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->birthdate = $request->input('birthdate');
            $user->address = ucfirst(
                strtolower(
                    $request->input('province').'|'.
                    $request->input('city').'|'.
                    $request->input('district')
                )
            );
            $user->contact_number = $request->input('contact_number');
            $user->tin = $request->input('tin');
            $user->occupation = $request->input('occupation');

            if ($user->save()) {
                session()->flash('message', [
                    'type' => 'success',
                    'content' => 'Profile updated.'
                ]);

                return back();
            }

            session()->flash('message', [
                'type' => 'warning',
                'content' => 'Cannot update your profile.'
            ]);
        } catch (Exception $e) {
            session()->flash('message', [
                'type' => 'danger',
                'content' => $e->getMessage()
            ]);
        }

        return back();
    }

    public function password()
    {
        $user = auth()->user();

        return view(user_env().'.account.password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|confirmed|min:6|pwned:100'
        ]);

        $user = auth()->user();

        try {
            if (Hash::check($request->input('old_password'), $user->password)) {
                $user->password = bcrypt($request->input('password'));

                if ($user->save()) {
                    auth()->logout();

                    $request->session()->invalidate();

                    session()->flash('message', [
                        'type' => 'success',
                        'content' => 'Password updated.'
                    ]);

                    return redirect()->route(user_env().'.login');
                }
            }

            session()->flash('message', [
                'type' => 'warning',
                'content' => 'Cannot update password.'
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
