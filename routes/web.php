<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\ActivityLogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\LocalizationController;
use App\Http\Controllers\Backend\LoginActivityController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\Settings\GeneralSettingsController;
use App\Http\Controllers\Backend\Settings\MailSettingsController;
use App\Http\Controllers\Backend\Settings\ReCaptchaSettingsController;
use App\Http\Controllers\Backend\TodoController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['XSS'])->group(function(){
    Auth::routes();
    Route::get('/',                                      [LoginController::class,'rootpaths']);
    //demo user login
    Route::get('demo/login',                             [LoginController::class,'demoLogin'])->name('demo.login');

    //language change
    Route::get('localization/{lang}',                    [LocalizationController::class,'setLocale'])->name('localization');

    //auth
    Route::get('verify-now',                            [RegisterController::class,'VerifyNow'])->name('verify.now');
    Route::get('register-mail/resend',                  [RegisterController::class,'resendRegisterMail'])->name('register.resend.verify.mail');
    Route::post('/password-reset-link',                 [ForgotPasswordController::class,'passwordResetLink'])->name('password.reset.link');
    Route::get('/password-reset/{token}',               [ForgotPasswordController::class,'passwordReset'])->name('custom.password.reset');
    Route::post('/password-update',                     [ForgotPasswordController::class,'passwordUpdate'])->name('custom.password.update');
    //end auth


    // admin panel routes
    Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {

        Route::get('/',                                 [DashboardController::class,        'index'])->name('admin.dashboard');
        //profile
        Route::prefix('profile')->name('profile.')->group(function(){
            Route::get('/',                             [ProfileController::class,          'index'])->name('index');
            Route::get('/settings',                     [ProfileController::class,          'settingsProfile'])->name('settings');

            Route::prefix('settings')->name('settings.')->group(function(){
                Route::post('/update',                  [ProfileController::class,          'ProfileUpdate'])->name('update');
                Route::post('/account/update',          [ProfileController::class,          'AccountUpdate'])->name('account.update');
                Route::post('/avatar/update',           [ProfileController::class,          'AvatarUpdate'])->name('avatar.update');
                Route::post('/change/password',         [ProfileController::class,          'passwordUpdate'])->name('password.update');
            });
        });
        //end profile

        //role
        Route::prefix('role')->name('role.')->group(function(){
            Route::get('/',                             [RoleController::class,    'index'])->name('index')->middleware('hasPermission:role_read');
            Route::get('/create',                       [RoleController::class,    'create'])->name('create')->middleware('hasPermission:role_create');
            Route::post('/store',                       [RoleController::class,    'store'])->name('store')->middleware('hasPermission:role_create');
            Route::get('/edit/{id}',                    [RoleController::class,    'edit'])->name('edit')->middleware('hasPermission:role_update');
            Route::put('/update',                       [RoleController::class,    'update'])->name('update')->middleware('hasPermission:role_update');
            Route::delete('/delete/{id}',               [RoleController::class,    'delete'])->name('delete')->middleware('hasPermission:role_delete');
        });
        //end role

        //user
        Route::prefix('user')->name('user.')->group(function(){
            Route::get('/',                             [UserController::class,   'index'])->name('index')->middleware('hasPermission:user_read');
            Route::get('/create',                       [UserController::class,   'create'])->name('create')->middleware('hasPermission:user_create');
            Route::post('/store',                       [UserController::class,   'store'])->name('store')->middleware('hasPermission:user_create');
            Route::get('/edit/{id}',                    [UserController::class,   'edit'])->name('edit')->middleware('hasPermission:user_update');
            Route::put('/update',                       [UserController::class,   'update'])->name('update')->middleware('hasPermission:user_update');
            Route::delete('/delete/{id}',               [UserController::class,   'delete'])->name('delete')->middleware('hasPermission:user_delete');
            Route::get('/permissions/{id}',             [UserController::class,   'permissions'])->name('permissions')->middleware('hasPermission:user_permissions');
            Route::put('/permissions/update',           [UserController::class,   'permissionsUpdate'])->name('permissions.update')->middleware('hasPermission:user_permissions');
            Route::post('/status/change/{id}',          [UserController::class,   'StatusChange'])->name('status.change')->middleware('hasPermission:user_status_update');//ajax using
            Route::post('/ban/unban/{id}',              [UserController::class,   'BanUnban'])->name('ban.unban')->middleware('hasPermission:user_ban_unban');//ajax using
        });
        //end user



        //todo
        Route::prefix('todo')->name('todo.')->group(function() {
            Route::get('/',                             [TodoController::class,   'index'])->name('index')->middleware('hasPermission:todo_read');
            Route::get('/create',                       [TodoController::class,   'create'])->name('create')->middleware('hasPermission:todo_create');
            Route::post('/store',                       [TodoController::class,   'store'])->name('store')->middleware('hasPermission:todo_create');
            Route::get('/edit/{id}',                    [TodoController::class,   'edit'])->name('edit')->middleware('hasPermission:todo_update');
            Route::put('/update/{id}',                  [TodoController::class,   'update'])->name('update')->middleware('hasPermission:todo_update');
            Route::delete('/delete/{id}',               [TodoController::class,   'destroy'])->name('delete')->middleware('hasPermission:todo_delete');
            Route::get('/status/update/{id}',           [TodoController::class,   'statusUpdate'])->name('status.update')->middleware('hasPermission:todo_status_update');
        });
        //end todo


        //multiple language mange
        Route::prefix('language')->name('language.')->group(function(){
            Route::get('/',                             [LanguageController::class, 'index'])->name('index')->middleware('hasPermission:language_read');
            Route::get('/create',                       [LanguageController::class, 'create'])->name('create')->middleware('hasPermission:language_create');
            Route::post('/store',                       [LanguageController::class, 'store'])->name('store')->middleware('hasPermission:language_create');
            Route::get('/edit/{id}',                    [LanguageController::class, 'edit'])->name('edit')->middleware('hasPermission:language_update');
            Route::put('/update',                       [LanguageController::class, 'update'])->name('update')->middleware('hasPermission:language_update');
            Route::get('/edit/phrase/{id}',             [LanguageController::class, 'editPhrase'])->name('edit.phrase')->middleware('hasPermission:language_phrase');
            Route::post('/update/phrase/{code}',        [LanguageController::class, 'updatePhrase'])->name('update.phrase')->middleware('hasPermission:language_phrase');
            Route::delete('/delete/{id}',               [LanguageController::class, 'delete'])->name('delete')->middleware('hasPermission:language_delete');
        });
        //end multiple language manage


        Route::prefix('activity-logs')->name('activity.logs.')->group(function(){
            Route::get('/',                             [ActivityLogController::class, 'index'])->name('index')->middleware('hasPermission:activity_logs_read');
            Route::get('/view/{id}',                    [ActivityLogController::class, 'view'])->name('view')->middleware('hasPermission:activity_logs_read');
        });

        //login activity logs
        Route::prefix('login-activity')->name('login.activity.')->group(function(){
            Route::get('/',                             [LoginActivityController::class, 'index'])->name('index')->middleware('hasPermission:login_activity_read');
        });

        //backup
        Route::prefix('backup')->name('backup.')->group(function(){
            Route::get('/',                             [BackupController::class, 'index'])->name('index')->middleware('hasPermission:backup_read');
            Route::get('/download',                     [BackupController::class, 'BackupDownload'])->name('download')->middleware('hasPermission:backup_read');
        });

        //settings===================================================
        Route::prefix('settings')->name('settings.')->group(function(){
            //general settings
            Route::prefix('general-settings')->name('general.settings.')->group(function(){
                Route::get('/',                          [GeneralSettingsController::class, 'index'])->name('index')->middleware('hasPermission:general_settings_read');
                Route::put('/update',                    [GeneralSettingsController::class, 'generalSettingsUpdate'])->name('update')->middleware('hasPermission:general_settings_update');
            });

            //mail settings
            Route::prefix('mail-settings')->name('mail.settings.')->Group(function(){
                Route::get('/',                          [MailSettingsController::class, 'index'])->name('index')->middleware('hasPermission:mail_settings_read');
                Route::put('/update',                    [MailSettingsController::class, 'update'])->name('update')->middleware('hasPermission:mail_settings_update');
                Route::post('/test-send-mail',           [MailSettingsController::class, 'testSendMail'])->name('testsendmail')->middleware('hasPermission:mail_settings_update');
            });

            //recaptcha settings
            Route::prefix('recaptcha-settings')->name('recaptcha.')->group(function(){
                Route::get('/',                          [ReCaptchaSettingsController::class, 'index'])->name('index')->middleware('hasPermission:recaptcha_settings_read');
                Route::put('/update',                    [ReCaptchaSettingsController::class, 'update'])->name('update')->middleware('hasPermission:recaptcha_settings_update');
            });

        });
    });

});
//need sweetalert implements  full system success and error message in controller
