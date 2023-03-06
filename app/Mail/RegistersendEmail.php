<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistersendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $username;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username,$password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thank you for subscribing to our newsletter')
        ->markdown('emails.register-send-email')
        ->with('username',$this->username)
        ->with('password',$this->password);
    }
}
