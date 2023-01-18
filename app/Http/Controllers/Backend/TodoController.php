<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreRequest;
use App\Repositories\Todo\TodoInterface;
use App\Repositories\User\UserInterface;
use Illuminate\Http\Request;

class TodoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repo,$userRepo;

    public function __construct(TodoInterface $repo,UserInterface $userRepo)
    {
        $this->repo = $repo;
        $this->userRepo = $userRepo;
    }
    public function index()
    {
        $todos = $this->repo->all();
        return view('backend.todo.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $users      = $this->userRepo->ActiveUsers();
        return view('backend.todo.create',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id){
        $todo          = $this->repo->get($id);
        $users         = $this->userRepo->ActiveUsers();
        return view('backend.todo.edit', compact('todo','users'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        if(env('DEMO')) {
            toast(__('store_system_error'),'error');
            return redirect()->back()->withInput();
        }
        if($this->repo->store($request)){
            toast(__('todo_added'),'success');
            return redirect()->route('todo.index');
        }else{
            toast(__('error'),'error');
            return redirect()->back();
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(StoreRequest $request,$id)
    {
        if(env('DEMO')) {
            toast(__('update_system_error'),'error');
            return redirect()->back()->withInput();
        }
        if($this->repo->update($request,$id)){
            toast(__('todo_updated'),'success');
            return redirect()->route('todo.index');
        }else{
            toast(__('error'),'error');
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        if(env('DEMO')) {
            toast(__('delete_system_error'),'error');
            return redirect()->back();
        }
        $this->repo->delete($id);
        toast(__('todo_deleted'),'success');
        return redirect()->route('todo.index');
    }

    public function statusUpdate($id)
    {

        if(env('DEMO')) {
            toast(__('upaate_system_error'),'error');
            return redirect()->back()->withInput();
        }
        if($this->repo->statusUpdate($id)){
            toast(__('todo_status_update'),'success');
            return redirect()->route('todo.index');
        }else{
            toast(__('error'),'error');
            return redirect()->back();
        }
    }
}
