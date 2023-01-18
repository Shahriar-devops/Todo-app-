<?php

namespace Database\Seeders\Backend;

use App\Models\Backend\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //general settings
        Setting::create(['title'=>'name',               'value'=>'laravel blog admin']);
        Setting::create(['title'=>'phone',              'value'=>'01820000000']);
        Setting::create(['title'=>'email',              'value'=>'admin@gmail.com']);
        Setting::create(['title'=>'logo',               'value'=>null]);
        Setting::create(['title'=>'favicon',            'value'=>null]);
        Setting::create(['title'=>'copyright',          'value'=>'Copyright © 2022 Laravel blog admin. All rights reserved.']);
        Setting::create(['title'=>'default_language',   'value'=>'en']);

        //mail settings
        Setting::create(['title' => 'mail_driver',      'value' => 'smtp']);
        Setting::create(['title' => 'sendmail_path',    'value' => '/usr/sbin/sendmail -bs -i']);
        Setting::create(['title' => 'mail_host',        'value' => 'smtp.mailtrap.io']);
        Setting::create(['title' => 'mail_port',        'value' => '2525']);
        Setting::create(['title' => 'mail_address',     'value' => 'admin@gmail.com']);
        Setting::create(['title' => 'mail_name',        'value' => 'Laravel admin blog']);
        Setting::create(['title' => 'mail_username',    'value' => 'd9f98a444876e4']);
        Setting::create(['title' => 'mail_password',    'value' => 'ad457b5e0ad2cd']);
        Setting::create(['title' => 'mail_encryption',  'value' => 'tls']);
        Setting::create(['title' => 'signature',        'value' => 'laravel admin blog']);

        //reCaptcha settings
        Setting::create(['title' => 'recaptcha_site_key',          'value' => '6Lcf3yAhAAAAACWKvubI45IoCx8bXgLpcNAHENQV']);
        Setting::create(['title' => 'recaptcha_secret_key',        'value' => '6Lcf3yAhAAAAABaGgYpPwBSKVSXcfXvamu-G07Y9']);
        Setting::create(['title' => 'recaptcha_status',            'value' => 0 ]);


        //social login settings
        //facebook
        // Setting::create(['title' => 'facebook_client_id',     'value' => '761215211788306']);
        // Setting::create(['title' => 'facebook_client_secret', 'value' => '7723532b0459756c86a8c0467ab27ae1']);
        // Setting::create(['title' => 'facebook_status',        'value' => 1]);
        // //google
        // Setting::create(['title' => 'google_client_id',     'value' => '730724862191-cncotvoaiai5vd5hikltrah9df39uou5.apps.googleusercontent.com']);
        // Setting::create(['title' => 'google_client_secret', 'value' => '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']);
        // Setting::create(['title' => 'google_status',        'value' => 1]);
    }
}
