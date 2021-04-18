<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request){
        
        
        // Define who the email is going to
        // should not be hardcoded but not neccessary
        $to_email = $request->input('toEmail');
        $to_subject = $request->input('subject');
        $to_message = $request->input('message');
        
        // from part of the email
        $from_name = "Alex";
        $from_email = "alex.vergara009@gmail.com";
        
        // define the array for the body of the email
        $data = array('body' => $to_message,  'signature' => $from_name);
        
        // use the mail class to send the email out
        // mail is the view we are using
        // $data is the array defining the body
        // You can pass the neccessary variables with the use keyword
        Mail::send('sendEmail', $data, function($message) use($to_email, $to_subject, $from_email, $from_name)
        {
            $message->to($to_email)->subject($to_subject);
            $message->from($from_email, $from_name);
        });
        
        // echo email sent message
        return view('email');
        
    }
}
