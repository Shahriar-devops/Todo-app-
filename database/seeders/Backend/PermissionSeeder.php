<?php

namespace Database\Seeders\Backend;

use App\Models\Backend\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $attributes  =[
                            //role
                            'role' => [
                                'read'           => 'role_read',
                                'create'         => 'role_create',
                                'update'         => 'role_update',
                                'delete'         => 'role_delete',
                            ],
                            //user
                            'users' => [
                                'read'           => 'user_read',
                                'create'         => 'user_create',
                                'update'         => 'user_update',
                                'delete'         => 'user_delete',
                                'permissions'    => 'user_permissions',
                                'ban_or_unban'   => 'user_ban_unban',
                                'status_update'  => 'user_status_update',
                            ],

                            //todo
                            'todo' => [
                                'read'           => 'todo_read',
                                'create'         => 'todo_create',
                                'update'         => 'todo_update',
                                'delete'         => 'todo_delete',
                                'status'         => 'todo_status_update',
                            ],


                             //activity logs
                             'activity_logs'=>[
                                'read'       => 'activity_logs_read'
                            ],
                            //login activity
                            'login_activity'=>[
                                'read'       => 'login_activity_read'
                             ],
                             //backup
                            'backup'=>[
                                'read'       => 'backup_read'
                             ],

                             //language
                            'language'=>[
                                'read'           => 'language_read',
                                'create'         => 'language_create',
                                'update'         => 'language_update',
                                'phrase'         => 'language_phrase',
                                'delete'         => 'language_delete',
                            ],

                             //settings module
                             'general_settings'=>[
                                'read'           => 'general_settings_read',
                                'update'         => 'general_settings_update',
                             ],
                             'mail_settings'=>[
                                'read'           => 'mail_settings_read',
                                'update'         => 'mail_settings_update',
                             ],
                             'recaptcha'=>[
                                'read'       => 'recaptcha_settings_read',
                                'update'     => 'recaptcha_settings_update'
                             ]



                        ];

                        foreach ($attributes as $key=> $value) {
                            $permission             = new Permission();
                            $permission->attribute  = $key;
                            $permission->keywords   = $value;
                            $permission->save();
                        }
    }
}
