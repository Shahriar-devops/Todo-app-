<?php

namespace Database\Seeders\Backend;

use App\Models\Backend\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role               = new Role();
        $role->name         = 'Admin';
        $role->slug         = str_replace(' ','-',strtolower('Admin'));
        $role->permissions  = $this->adminPermissions();
        $role->save();


        $role               = new Role();
        $role->name         = 'User';
        $role->slug         = str_replace(' ','-',strtolower('User'));
        $role->permissions  = $this->userPermissions();
        $role->save();
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
                //recaptcha settings
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
