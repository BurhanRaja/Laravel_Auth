<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // public function greet(Lead $lead) {
    //     $data = array('name'=>"Admin World",
    //         'greet' => 'Hello ' . $lead->name . ',',
    //         'body' => 'This email is to sent for the confirmation on you joining the <b>Admin World</b> Community',
    //         'end' => 'Thank you'
    //     );

    //     Mail::send('emailTemp.greet', $data, function($message) {
    //        $message->to('mails4burhan@gmail.com', 'Burhanuddin')->subject
    //           ('Welcome to the Admin Community');
    //        $message->from('burhanuddin@techysquad.com','Burhan Raja');
    //     });
    //     return redirect('/dashboard/leads')->with('successMessage', 'Email Sent Successfully');
    // }

    public function greet(Lead $lead) {
        $data = [
            'name' => $lead->name,
            'email' => $lead->email,
            'country_code' => $lead->country_code,
            'mobile' => $lead->mobile,
            'subject' => $lead->subject,
            'country' => $lead->country,
            'state' => $lead->state,
            'city' => $lead->city
            ];
            Mail::to($lead->email)->send(new MyTestMail($data));
            return redirect('/dashboard/leads')->with('successMessage', 'Email Sent Successfully');
    }
}

