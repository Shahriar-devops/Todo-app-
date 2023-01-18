<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Repositories\Role\RoleInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $repo;
    public function __construct(RoleInterface $repo){
        $this->repo    = $repo;
    }
    //index
    public function index(){

        $roles       = $this->repo->get();
        return view('backend.role.index',compact('roles'));
    }
    //create
    public function create(){
        $permissions    = $this->repo->permissions();
        return view('backend.role.create',compact('permissions'));
    }
    //store
    public function store(StoreRequest $request){
        if($this->repo->store($request)):
            toast(__('role_added'),'success');
            return redirect()->route('role.index');
        else:
            toast(__('error','error'));
            return redirect()->back()->withInput();
        endif;
    }

    //edit
    public function edit($id){
        $permissions     = $this->repo->permissions();
        $role            = $this->repo->edit($id);
        return view('backend.role.edit',compact('permissions','role'));
    }

    public function update(UpdateRequest $request){

        if($this->repo->update($request)):
            toast(__('role_updated'),'success');
            return redirect()->route('role.index');
        else:
            toast(__('error'),'error');
            return redirect()->back()->withInput();
        endif;
    }
    //delete
    public function delete($id){
        if($this->repo->delete($id)){
            toast(__('role_deleted'),'success');
            return redirect()->route('role.index');
        }else{
            toast(__('error'),'error');
            return redirect()->back();
        }
    }
}
