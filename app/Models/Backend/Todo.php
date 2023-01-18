<?php

namespace App\Models\Backend;

use App\Enums\TodoStatus;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
class Todo extends Model
{
    use HasFactory,LogsActivity;


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Todo')
        ->logOnly(['title','user.name','date','description','status'])
        ->setDescriptionForEvent(fn(string $eventName) => "{$eventName}");
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function upload(){
        return $this->belongsTo(Upload::class,'todo_file','id');
    }
    public function getMyStatusAttribute(){
        if($this->status == TodoStatus::PENDING){
            return '<span class="badge badge-pill badge-primary">'.__('pending').'</span>';
        }elseif($this->status == TodoStatus::PROCESSING){
            return '<span class="badge badge-pill badge-warning">'.__('processing').'</span>';
        }elseif($this->status == TodoStatus::COMPLETED){
            return '<span class="badge badge-pill badge-success">'.__('completed').'</span>';
        }
    }
}
