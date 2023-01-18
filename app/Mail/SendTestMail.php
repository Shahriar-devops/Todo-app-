<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTestMail extends Mailable
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
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $logo      = logo(settings('logo'));
        $site_name = settings('name');
        $copyright = settings('copyright');
        return $this->from(settings('mail_address',settings('mail_name')))->view('backend.settings.mail_settings.send_test_mail',compact('logo','site_name','copyright'))->subject(__('test_send_mail'));
    }
}
