<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PdfMail extends Mailable
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
    public function __construct($user_id,$prefix,$name,$lastname,$email,$goverment_id,
    $created_at,$updated_at,$title)
    {
        $this->user_id = $user_id;
        $this->prefix = $prefix;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->goverment_id = $goverment_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->title = $title;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thank you for subscribing to our newsletter')
            ->markdown('emails.pdf')
            ->with('user_id',$this->user_id)
            ->with('prefix',$this->prefix)
            ->with('name',$this->name)
            ->with('lastname',$this->lastname)
            ->with('email',$this->email)
            ->with('goverment_id',$this->goverment_id)
            ->with('created_at',$this->created_at)
            ->with('updated_at',$this->updated_at)
            ->with('title',$this->title)
            ;
    }
}
