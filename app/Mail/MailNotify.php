<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /** build the message
     * @return $this
     */
    public function build()
    {
        return $this->from('testlaravelterm4@gmail.com', 'Smile Line')
//				->to($email, $name)
            ->subject($this->data['subject'])
            ->view('profile.partials.mail')
            ->with('data', $this->data);
    }
}
