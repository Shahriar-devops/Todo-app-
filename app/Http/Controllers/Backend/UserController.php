<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Repositories\Role\RoleInterface;
use App\Repositories\User\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repo;
    protected $role;
    public function __construct(UserInterface $repo,RoleInterface $role)
    {
        $this->repo = $repo;
        $this->role = $role;
    }
    public function index(){
        $users      = $this->repo->get();
        return view('backend.user.index',compact('users'));
    }

    public function create(){
        $roles    = $this->role->all();
        return view('backend.user.create',compact('roles'));
    }
    //new user store
    public function store(StoreRequest $request){

        if(env('DEMO')) {
            toast(__('store_system_error'),'error');
            return redirect()->back()->withInput();
        }

        if($this->repo->store($request)):
            toast(__('user_added'),'success');
            return redirect()->route('user.index');
        else:
            toast(__('error'),'error');
            return redirect()->back()->withInput();
        endif;
    }
    public function edit($id){
        $user      = $this->repo->edit($id);
        $roles     = $this->role->all();
        return view('backend.user.edit', compact('user','roles'));
    }

    //update user
    public function update(UpdateRequest $request){

        if(env('DEMO')) {
            toast(__('update_system_error'),'error');
            return redirect()->back()->withInput();
        }

        if($this->repo->update($request)):
            toast(__('user_updated'),'success');
            return redirect()->route('user.index');
        else:
            toast(__('error'),'error');
            return redirect()->back()->withInput();
        endif;
    }

    //delete user
    public function delete($id){
        if(env('DEMO')) {
            toast(__('delete_system_error'),'error');
            return redirect()->back();
        }
        if($this->repo->delete($id)){
            toast(__('user_deleted'),'success');
            return redirect()->route('user.index');
        }else{
            toast(__('error'),'error');
            return redirect()->back();
        }
    }


    //edit user permissions
    public function permissions($id){
        $user         = $this->repo->edit($id);
        $permissions  = $this->role->permissions();
        return view('backend.user.permissions',compact('user','permissions'));
    }

    //update user permissions
    public function permissionsUpdate(Request $request){
        if($this->repo->permissionsUpdate($request)):
            toast(__('user_permission_updated'),'success');
            return redirect()->route('user.index');
        else:
            toast(__('error'),'error');
            return redirect()->back()->withInput();
        endif;
    }

    //user status change active or inactive
    public function StatusChange($id){
        if($this->repo->statusUpdate($id)){
            return true;
        }else{
            return false;
        }
    }

    //user can ban or unban
    public function BanUnban($id){
        if($this->repo->BanUnban($id)){
            return true;
        }else{
            return false;
        }
    }
}
