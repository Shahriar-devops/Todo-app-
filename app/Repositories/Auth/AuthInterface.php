<?php
namespace App\Repositories\Auth;

interface AuthInterface{
    public function passwordResetlink($request);
    public function passwordUpdate($request);
    public function registermailSend($user);
    public function verifyNow($request);
}
