<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeasMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        return [
            "driver" => "smtp",
            "host" => "smtp.mailtrap.io",
            "port" => 2525,
            "from" => array(
                "address" => "from@example.com",
                "name" => "Example"
            ),
            "username" => "2ddc310c9f10c5",
            "password" => "48b93f18129f96",
            "sendmail" => "/usr/sbin/sendmail -bs"
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
