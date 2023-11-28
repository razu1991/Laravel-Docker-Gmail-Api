<?php

namespace App\Jobs;

use App\Mail\RegistrationWelcomeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Dacastro4\LaravelGmail\Services\Message\Mail;
use Symfony\Component\Mime\Address;


class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emailData;

    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    public function handle()
    {
        $mail = new Mail();
        $mail->to($this->emailData['to']['email'], $name = $this->emailData['to']['name'] );
        $mail->cc(new Address(env('MAIL_FROM_ADDRESS')));
        $mail->bcc(new Address(env('MAIL_FROM_ADDRESS')));
        $mail->from(env('MAIL_FROM_ADDRESS'), $name = env('MAIL_FROM_NAME') );
        $mail->subject($this->emailData['subject']);
        $mail->message($this->emailData['message']);
        $mail->send();
    }
}
