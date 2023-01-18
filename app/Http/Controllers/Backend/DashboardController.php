<?php

namespace App\Http\Controllers\Backend;

use App\Enums\TodoStatus;
use App\Http\Controllers\Controller;
use App\Models\Backend\FlagIcon;
use App\Models\Backend\LoginActivity;
use App\Models\Backend\Permission;
use App\Models\Backend\Role;
use App\Models\Backend\Todo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $data = [];

    public function index()
    {

        $this->data['usersCount']           = User::orderByDesc('id')->count();
        $this->data['todayUsersCount']      = User::whereDate('created_at', date('Y-m-d'))->orderByDesc('id')->count();
        $this->data['users']                = User::orderByDesc('id')->limit(5)->get();
        $this->data['rolesCount']           = Role::orderByDesc('id')->count();
        $this->data['permissionCount']      = Permission::orderByDesc('id')->count();
        $this->data['todoCount']            = Todo::orderByDesc('id')->count();
        $this->data['todayTodoCount']       = Todo::whereDate('created_at', date('Y-m-d'))->orderByDesc('id')->count();
        $this->data['todos']                = Todo::orderByDesc('id')->limit(5)->get();


        //todo charts
        $date                               = Carbon::now();
        $startMonth                         = $date->startOfYear()->format('m');
        $endMonth                           = $date->endOfYear()->format('m');
        $month                              = [];
        for ($i=(int)$startMonth; $i <= $endMonth ; $i++) {
            $month[]= (string)$i;
        }
        $this->data['month']                = $month;
        $this->data['TodoPending']          = TodoStatus::PENDING;
        $this->data['TodoProcessing']       = TodoStatus::PROCESSING;
        $this->data['TodoCompleted']        = TodoStatus::COMPLETED;
        //end todo charts

        //login activity
        $this->data['LoginActivity']        = LoginActivity::get()->groupBy('country_code');

        //end login activity


        return view('backend.dashboard',$this->data);
    }
}
