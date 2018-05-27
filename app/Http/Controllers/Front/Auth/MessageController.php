<?php

namespace App\Http\Controllers\Front\Auth;

/**
 * Jobs
 */
use App\Jobs\{SendMessage};

/**
 * Laravel
 */
use DB, Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'body' => 'required|max:510'
        ]);

        if ($validator->fails()) {
            session()->flash('message', [
                'type' => 'warning',
                'content' => implode($validator->errors()->all(), '<br />')
            ]);

            return back();
        }

        dispatch(new SendMessage($request->all()));

        DB::table('messages')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_number' => $request->input('contact_number'),
            'body' => $request->input('body'),
            'sent_at' => now()
        ]);

        session()->flash('message', [
            'type' => 'success',
            'content' => 'Thanks for sending us a message our beloved guest! We will contact you back.'
        ]);

        return back();
    }
}