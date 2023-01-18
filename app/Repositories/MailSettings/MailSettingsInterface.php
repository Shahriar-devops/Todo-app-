<?php
namespace App\Repositories\MailSettings;
interface MailSettingsInterface
{
    public function mailSendTest($request);
}
