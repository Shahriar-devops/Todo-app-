<?php
namespace App\Repositories\Profile;

Interface ProfileInterface {
    public function profileUpdate($request);
    public function accountUpdate($request);
    public function avatarUpdate($request);
    public function passwordChange($request);
}
