<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\View\View;


class SendMailController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function sendMail(Request $request){

        Mail::send('email.email', $request->all(), function($message) use ($request) {


            $message->to('mosakovskijj10@gmail.com');
            $message->subject($request->subject);
            $message->from($request->email);

        });

        dd('Mail Send Successfully');

    }
}
