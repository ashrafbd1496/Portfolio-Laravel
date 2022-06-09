<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'name'   =>  'required|max:255',
            'email'   =>  'required|max:255',
            'phone'   =>  'required|max:255',
            'subject'   =>  'required|max:255',
            'message'   =>  'required|max:500',
            'contact_question'   =>  'required|integer',
            'captcha'   =>  'required',
        ]);

        // Get All Request
        $input = $request->all();

        if ($input['null_value'] != "") {
            return redirect()->to('/'.'#contact')
                ->with('warning_contact', 'frontend.please_try_again');
        }

        if ($input['contact_question'] != $input['captcha']) {
            return redirect()->to('/'.'#contact')
                ->with('warning_contact', 'frontend.please_try_again');
        }

        // Record to database
        Message::firstOrCreate([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'subject' => $input['subject'],
            'message' => $input['message'],
        ]);

        return redirect()->to('/'.'#contact')
            ->with('success_contact', 'frontend.your_message_has_been_delivered');
    }

}