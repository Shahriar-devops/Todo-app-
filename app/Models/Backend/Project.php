<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
class Project extends Model
{
    use HasFactory,LogsActivity;


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Project')
        ->logOnly(['title','date','description'])
        ->setDescriptionForEvent(fn(string $eventName) => "{$eventName}");
    }
}
