<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Pdf extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    public $detail;
    public $beneficial;
    public $address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$password,$firstname,$lastname,$detail,$beneficial,$address)
    {
        $this->email = $email;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->detail = $detail;
        $this->beneficial = $beneficial;
        $this->address = $address;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thank you for subscribing to our newsletter')
            ->markdown('emails.insurance-email')
            ->with('username',$this->email)
            ->with('password',$this->password)
            ->with('firstname',$this->firstname)
            ->with('lastname',$this->lastname)
            ->with('detail',$this->detail)
            ->with('beneficial',$this->beneficial)
            ->with('email',$this->email)
            ->with('address',$this->address)
            ->with('premium',10000)
            ;
    }
}
