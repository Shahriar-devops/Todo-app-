<?php
namespace App\Repositories\Profile;

use App\Models\User;
use App\Repositories\Profile\ProfileInterface;
use App\Repositories\Upload\UploadInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProfileRepository implements ProfileInterface{

    protected $upload;
    public function __construct(UploadInterface $upload)
    {
        $this->upload      = $upload;
    }
    public function profileUpdate($request){
        try {
           $user           = User::find(Auth::user()->id);
           $user->name     = $request->name;
           $user->phone    = $request->phone;
           $user->save();

           return true;
        } catch (\Throwable $th) {
           return false;
        }
    }
    public function accountUpdate($request){
        try {
            $user                 = User::find(Auth::user()->id);
            $user->email          = $request->email;
            $user->designations   = $request->designations;
            $user->date_of_birth  = $request->date_of_birth;
            $user->gender         = $request->gender;
            $user->address        = $request->address;
            $user->about          = $request->about;
            $user->save();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function avatarUpdate($request){
        try {
            $user        = User::find(Auth::user()->id);
            if($request->avatar):
                $user->avatar              = $this->upload->upload('user',Auth::user()->avatar,$request->avatar);
            endif;
            if($request->cover_avatar):
                $user->cover_avatar        = $this->upload->upload('user',Auth::user()->cover_avatar,$request->cover_avatar);
            endif;
            $user->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function passwordChange($request){
        try {
            $user    = User::find(Auth::user()->id);
            if(!$user):
                return false;
            endif;

            if(Hash::check($request->current_password, $user->password)):
                $user->password    = Hash::make($request->new_password);
                $user->save();
                return true;
            else:
                return 'invalid_password';
            endif;
            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }
}
