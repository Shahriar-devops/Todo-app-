<?php

namespace Database\Seeders;

use Database\Seeders\Backend\FlagIconSeeder;
use Database\Seeders\Backend\LanguageConfigSeeder;
use Database\Seeders\Backend\LanguageSeeder;
use Database\Seeders\Backend\PermissionSeeder;
use Database\Seeders\Backend\ProjectSeeder;
use Database\Seeders\Backend\RoleSeeder;
use Database\Seeders\Backend\SettingSeeder;
use Database\Seeders\Backend\TodoSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FlagIconSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(LanguageConfigSeeder::class);
        $this->call(TodoSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
