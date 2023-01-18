<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\AccountUpdateRequest;
use App\Http\Requests\Profile\ChangePasswordRequest;
use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Repositories\Profile\ProfileInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repo;
    public function __construct(ProfileInterface $repo)
    {
        $this->repo  = $repo;
    }
    public function index(Request $request){
        return view('backend.profile.master',compact('request'));
    }

    //profile update page
    public function settingsProfile(Request $request){
        return view('backend.profile.profile-content.settings.master',compact('request'));
    }

    //profile update
    public function ProfileUpdate(ProfileUpdateRequest $request){
        if($this->repo->ProfileUpdate($request)):
            toast(__('profile_updated'),'success');
            return redirect()->route('profile.index')->withInput($request->only('profile_update'));
        else:
            toast(__('error'),'error');
            return redirect()->back()->withInput();
        endif;
    }



    //profile account update
    public function AccountUpdate(AccountUpdateRequest $request){
        if($this->repo->accountUpdate($request)):
            toast(__('account_updated'),'success');
            return redirect()->route('profile.index')->withInput($request->only('account_update'));
        else:
            toast(__('error','error'));
            return redirect()->back()->withInput();
        endif;
    }


    public function AvatarUpdate(Request $request){
        if($this->repo->avatarUpdate($request)):
            toast(__('avatar_updated'),'success');
            return redirect()->route('profile.index')->withInput($request->only('avatar_update'));
        else:
            toast(__('error'),'error');
            return redirect()->back()->withInput();
        endif;
    }

    //update password
    public function passwordUpdate(ChangePasswordRequest $request){

        if($this->repo->passwordChange($request) === 'invalid_password'):
            toast(__('error'),'error');
            return redirect()->back()->withErrors([
                'current_password' => __('validation.invalid',['attribute'=>'Current Password'])
            ])->withInput();
        elseif($this->repo->passwordChange($request)):
            toast(__('password_changes'),'error');
            return redirect()->route('profile.index')->withInput($request->only('password_update'));
        else:
            toast(__('error'),'error');
            return redirect()->back()->withInput();
        endif;

    }
}
