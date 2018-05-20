<?php

namespace App\Http\Controllers\Front\Auth;

/** 
 * Jobs
 */
use App\Jobs\{SendVerificationEmail, SendNewsletter};

/**
 * Notifications
 */
use App\Notifications\{WelcomeMessage, EmailVerification, LoginCredential};

/**
 * Models
 */
use App\{User, Newsletter};

/**
 * Laravel
 */
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(user_env().'.guest');
    }

    public function showRegisterForm()
    {
        return view(user_env().'.auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name'        => 'required|string|max:255',
            'last_name'         => 'required|string|max:255',
            'contact_number'    => 'required|numeric',
            'address'           => 'required|string|max:510',
            'email'             => 'required|string|email|max:255|unique:users,email,NULL,id,deleted_at,NULL',
            'password'          => 'required|string|confirmed|min:6|pwned:100',
        ]);

        $token = base64_encode($request->input('email'));
        $name = create_username($request->input('email'));
        $password = $request->input('password');

        $user = new User;
        $user->first_name       = $request->input('first_name');
        $user->last_name        = $request->input('last_name');
        $user->contact_number   = $request->input('contact_number');
        $user->address          = $request->input('address');
        $user->name             = $name;
        $user->email            = $request->input('email');
        $user->email_token      = $token;
        $user->password         = bcrypt($password);

        if ($user->save()) {
            // Welcome email.
            $user->notify(new WelcomeMessage($user));
            
            event(new Registered($user));

            // Trigger email verification job
            dispatch(new SendVerificationEmail($user, $token));

            // Trigger send newsletter job.
            Newsletter::where('trigger', 'registered')->where('active', 1)->each(
                function ($newsletter) use ($request) {
                    dispatch(new SendNewsletter($request->input('email'), $newsletter));
                }
            );

            // Prompt user for email verification.
            session()->flash('message', [
                'type' => 'success',
                'content' => 'Your account has been created, check your email for verification.'
            ]);

            return back();
        }

        session()->flash('message', [
            'type' => 'warning',
            'content' => 'We cannot process your registration, Please try again.'
        ]);

        return back();
    }

    public function verify($token)
    {
        $user = User::where('email_token', $token)->first();
        $user->verified = 1;

        if ($user->save()) {
            auth()->login($user);

            session()->flash('message', [
                'type' => 'success',
                'content' => 'Account has been successfuly verified!'
            ]);

            return redirect()->route(user_env().'.home');
        }
    }
}
