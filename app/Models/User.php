<?php

namespace App\Models;

use App\Enums\Status;
use App\Models\Backend\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('User')
        ->logOnly(['name', 'email','phone','designations','date_of_birth','gender','role_id'])
        ->setDescriptionForEvent(fn(string $eventName) => "{$eventName}");
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'password',
        'role_id',
        'permissions',
        'verify_token',
        'forgot_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'permissions'       => 'array'
    ];

    public function Avatar(){
        return $this->belongsTo(Upload::class,'avatar','id');
    }

    public function coverAvatar(){
        return $this->belongsTo(Upload::class,'cover_avatar','id');
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function getAvatarImageAttribute(){

        if($this->Avatar  &&  File::exists(public_path($this->Avatar->original['original']))):
            return static_asset($this->Avatar->original['original']);
        endif;
        return static_asset('backend/images/default/user.jpg');
    }
    public function getCoverAvatarImageAttribute(){

        if($this->coverAvatar  && File::exists(public_path($this->coverAvatar->original['original']))):
            return static_asset($this->coverAvatar->original['original']);
        endif;
        return static_asset('backend/images/default/cover-image.jpg');
    }

}
