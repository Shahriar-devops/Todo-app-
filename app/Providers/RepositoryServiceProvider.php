<?php

namespace App\Providers;

use App\Repositories\Auth\AuthInterface;
use App\Repositories\Auth\AuthRepository;
use App\Repositories\Backup\BackupInterface;
use App\Repositories\Backup\BackupRepository;
use App\Repositories\Language\LanguageInterface;
use App\Repositories\Language\LanguageRepository;
use App\Repositories\LoginActivity\LoginActivityInterface;
use App\Repositories\LoginActivity\LoginActivityRepository;
use App\Repositories\MailSettings\MailSettingsInterface;
use App\Repositories\MailSettings\MailSettingsRepository;
use App\Repositories\Profile\ProfileInterface;
use App\Repositories\Profile\ProfileRepository;
use App\Repositories\Project\ProjectInterface;
use App\Repositories\Project\ProjectRepository;
use App\Repositories\Role\RoleInterface;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Settings\SettingsInterface;
use App\Repositories\Settings\SettingsRepository;
use App\Repositories\Todo\TodoInterface;
use App\Repositories\Todo\TodoRepository;
use App\Repositories\Upload\UploadInterface;
use App\Repositories\Upload\UploadRepository;
use App\Repositories\User\UserInterface;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(ExampleInterface::class,ExampleRepository::class);
        $this->app->bind(ProfileInterface::class,             ProfileRepository::class);
        $this->app->bind(UploadInterface::class,              UploadRepository::class);
        $this->app->bind(RoleInterface::class,                RoleRepository::class);
        $this->app->bind(UserInterface::class,                UserRepository::class);
        $this->app->bind(LanguageInterface::class,            LanguageRepository::class);
        $this->app->bind(TodoInterface::class,                TodoRepository::class);
        $this->app->bind(LoginActivityInterface::class,       LoginActivityRepository::class);
        $this->app->bind(BackupInterface::class,              BackupRepository::class);
        $this->app->bind(AuthInterface::class,                AuthRepository::class);
        //settings
        $this->app->bind(SettingsInterface::class,            SettingsRepository::class);
        $this->app->bind(MailSettingsInterface::class,        MailSettingsRepository::class);
        //end settings
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
