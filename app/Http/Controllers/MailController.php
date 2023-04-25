<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use http\Exception;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail($email, $body)
    {
        $data = [
            'subject' => 'Smile Line Mail',
            'body' => $body,
        ];

        try {
            Mail::to($email)->send(new MailNotify($data));
            return redirect()->back();
        } catch (Exception $th) {
            return redirect()->back()->with('message', 'Failed to Send Mail');
        }
    }
}
