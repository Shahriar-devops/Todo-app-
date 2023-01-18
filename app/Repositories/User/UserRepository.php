<?php
namespace App\Repositories\User;

use App\Enums\BanUser;
use App\Enums\Status;
use App\Models\Backend\Role;
use App\Models\Upload;
use App\Models\User;
use App\Repositories\Upload\UploadInterface;
use App\Repositories\User\UserInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface{
    protected $upload;
    public function __construct(UploadInterface $upload)
    {
        $this->upload = $upload;
    }
    public function get(){
        return User::orderByDesc('id')->paginate(10);
    }

    public function ActiveUsers(){
        return User::where('is_ban',BanUser::UNBAN)->where('status',Status::ACTIVE)->get();
    }


    //add new user
    public function store($request){
        try {

            $role                 =  Role::find($request->role);

            $user                 =  new User();
            $user->name           =  $request->name;
            $user->email          =  $request->email;
            $user->date_of_birth  =  $request->date_of_birth;
            $user->gender         =  $request->gender;
            $user->designations   =  $request->designations;
            $user->role_id        =  $request->role;
            $user->permissions    =  $role->permissions;
            $user->phone          =  $request->phone;
            $user->address        =  $request->address;
            $user->about          =  $request->about;
            $user->password       =  Hash::make($request->password);
            if($request->avatar):
            $user->avatar         = $this->upload->upload('user','',$request->avatar);
            endif;
            if($request->cover_avatar):
            $user->cover_avatar   = $this->upload->upload('user','',$request->cover_avatar);
            endif;
            $user->status         =  $request->status == 'on' ? Status::ACTIVE:Status::INACTIVE;
            $user->save();

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }
    public function edit($id){
        return User::find($id);
    }
    //user update
    public function update($request){
        try {
            $role                 =  Role::find($request->role);

            $user                 =  User::find($request->id);
            $user->name           =  $request->name;
            $user->email          =  $request->email;
            $user->date_of_birth  =  $request->date_of_birth;
            $user->gender         =  $request->gender;
            $user->designations   =  $request->designations;
            $user->role_id        =  $request->role;
            $user->permissions    =  $role->permissions;
            $user->phone          =  $request->phone;
            $user->address        =  $request->address;
            $user->about          =  $request->about;
            if($request->password):
            $user->password       =  Hash::make($request->password);
            endif;
            if($request->avatar):
            $user->avatar         = $this->upload->upload('user',$user->avatar,$request->avatar);
            endif;
            if($request->cover_avatar):
            $user->cover_avatar   = $this->upload->upload('user',$user->cover_avatar,$request->cover_avatar);
            endif;
            $user->status         =  $request->status == 'on' ? Status::ACTIVE:Status::INACTIVE;
            $user->save();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    //delete user
    public function delete($id){
        try {
            $user    = User::find($id);
            //delete profile and cover image from project and database
            if($user && $user->Avatar && File::exists(public_path($user->Avatar->original))):
                unlink(public_path($user->Avatar->original));
                $avatar=Upload::find($user->avatar);
                $avatar->delete();
            endif;
            if($user && $user->coverAvatar && File::exists(public_path($user->coverAvatar->original))):
                unlink(public_path($user->coverAvatar->original));
                $cover=Upload::find($user->cover_avatar);
                $cover->delete();
            endif;

            return $user->delete();

        } catch (\Throwable $th) {
            return false;
        }

    }

    //update user permissions
    public function permissionsUpdate($request){
        try {

            $user                    = User::find($request->user_id);
                $user->permissions   = $request->permissions ? $request->permissions:[];
            $user->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    //user status update
    public function statusUpdate($id){
        try {
            $user                 =  User::find($id);
            if($user->status      == Status::ACTIVE):
            $user->status         =  Status::INACTIVE;
            elseif($user->status  == Status::INACTIVE):
            $user->status         =  Status::ACTIVE;
            endif;
            $user->save();
            return true;
        } catch (\Throwable $th) {
           return false;
        }
    }

    //user can ban or unban
    public function BanUnban($id){
        try {
            $user                 =  User::find($id);
            if($user->is_ban      == BanUser::BAN):
            $user->is_ban         =  BanUser::UNBAN;
            elseif($user->is_ban  == BanUser::UNBAN):
            $user->is_ban         =  BanUser::BAN;
            endif;
            $user->save();

            return true;
        } catch (\Throwable $th) {
           return false;
        }
    }
}
