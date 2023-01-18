<?php

namespace Database\Seeders;

use App\Enums\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Date;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user                = new User();
        $user->name          = 'Super Admin';
        $user->email         = 'superadmin@example.com';
        $user->designations  = 'Admin';
        $user->gender        = Gender::MALE;
        $user->date_of_birth = Date('d-m-Y');
        $user->phone         = '01820030000';
        $user->role_id       = 1;
        $user->permissions   = $this->adminPermissions();
        $user->password      = Hash::make('123456');
        $user->save();

        $user                = new User();
        $user->name          = 'User';
        $user->email         = 'user@example.com';
        $user->designations  = 'User';
        $user->gender        = Gender::MALE;
        $user->date_of_birth = Date('d-m-Y');
        $user->phone         = '01820000000';
        $user->role_id       =  2;
        $user->permissions   = $this->userPermissions();
        $user->password      = Hash::make('123456');
        $user->save();


        $user                = new User();
        $user->name          = 'User 2';
        $user->email         = 'user2@example.com';
        $user->designations  = 'User 2';
        $user->gender        = Gender::MALE;
        $user->date_of_birth = Date('d-m-Y');
        $user->phone         = '01820000000';
        $user->role_id       =  2;
        $user->permissions   = $this->userPermissions();
        $user->password      = Hash::make('123456');
        $user->save();


        $user                = new User();
        $user->name          = 'User 3';
        $user->email         = 'user3@example.com';
        $user->designations  = 'User 3';
        $user->gender        = Gender::MALE;
        $user->date_of_birth = Date('d-m-Y');
        $user->phone         = '01820000000';
        $user->role_id       =  2;
        $user->permissions   = $this->userPermissions();
        $user->password      = Hash::make('123456');
        $user->save();

        $user                = new User();
        $user->name          = 'User 4';
        $user->email         = 'user4@example.com';
        $user->designations  = 'User 4';
        $user->gender        = Gender::MALE;
        $user->date_of_birth = Date('d-m-Y');
        $user->phone         = '01820000000';
        $user->role_id       =  2;
        $user->permissions   = $this->userPermissions();
        $user->password      = Hash::make('123456');
        $user->save();

    }

    public function adminPermissions(){
        return [
                //role
                'role_read',
                'role_create',
                'role_update',
                'role_delete',
                //user
                'user_read',
                'user_create',
                'user_update',
                'user_delete',
                'user_permissions',
                'user_ban_unban',
                'user_status_update',
                 //todo
                 'todo_read',
                 'todo_create',
                 'todo_update',
                 'todo_delete',
                 'todo_status_update',
                //language
                'language_read',
                'language_create',
                'language_update',
                'language_delete',
                'language_phrase',
                //activity logs
                'activity_logs_read',
                //login activity
                'login_activity_read',
                //backup
                'backup_read',
                //general settings
                'general_settings_read',
                'general_settings_update',
                //mail settings
                'mail_settings_read',
                'mail_settings_update',
                //recaptha
                'recaptcha_settings_read',
                'recaptcha_settings_update'
              ];
    }

     //user permissions
     public function userPermissions(){
        return [
                'role_read',
                'user_read',
                'todo_read',
                'language_read',
                'activity_logs_read',
                'login_activity_read'
              ];
    }

}
