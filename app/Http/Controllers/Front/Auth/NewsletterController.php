<?php

namespace App\Http\Controllers\Front\Auth;

/** 
 * Jobs
 */
use App\Jobs\{SendNewsletter};

/**
 * Models
 */
use App\{Newsletter};

/**
 * Laravel
 */
use DB, Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscribers|max:255'
        ], [
            'email.unique' => 'You are already subscribed our beloved guest.'
        ]);

        if ($validator->fails()) {
            session()->flash('message', [
                'type' => 'warning',
                'content' => implode($validator->errors()->all(), '<br />')
            ]);

            return back();
        }

        Newsletter::where('trigger', 'subscribed')->where('active', 1)->each(
            function ($newsletter) use ($request) {
                dispatch(new SendNewsletter($request->input('email'), $newsletter));
            }
        );

        DB::table('newsletter_subscribers')->insert([
            'email' => $request->input('email'),
            'subscribed_at' => now()
        ]);

        session()->flash('message', [
            'type' => 'success',
            'content' => 'Thanks for subscribing our beloved guest! Check your email for updates.'
        ]);

        return back();
    }
}