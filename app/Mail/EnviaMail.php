<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $datos_del_mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos_del_mail)
    {
        $this->datos_del_mail = $datos_del_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->from('sender@example.com')
//            ->view('mails.mail-contenido-mail')
////            ->text('mails.demo_plain')
//            ->with(
//                [
//                    'testVarOne' => '1',
//                    'testVarTwo' => '2',
//                ])
//            ->attach(public_path('/images').'/avatar.jpg', [
//                'as' => 'demo.jpg',
//                'mime' => 'image/jpeg',
//            ]
//            );
        return $this->from('zuraksin@gmail.com')
            ->view('mails.mail-contenido-mail');
    }
}
