<?php
namespace App\Repositories\User;
Interface UserInterface{
    public function get();
    public function ActiveUsers();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($id);
    public function permissionsUpdate($request);
    public function statusUpdate($id);
    public function BanUnban($id);
}
