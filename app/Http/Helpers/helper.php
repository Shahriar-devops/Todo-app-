<?php
// permission check

use App\Enums\BanUser;
use App\Enums\Status;
use App\Models\Backend\Language;
use App\Models\Backend\LoginActivity;
use App\Models\Backend\Todo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// default language
if(!function_exists('defaultLanguage')){
    function defaultLanguage(){
        $default_lang = settings('default_language');
        if($default_lang):
            return $default_lang;
        endif;
        return 'en';
    }
}
//end default language

//rtl and ltr
if (!function_exists('languageDirection')) {

    function languageDirection($code)
    {
        $lang = Language::where('code',$code)->first();
        if($lang): 
            return $lang->text_direction;
        endif;

        return 'ltr';
    }
}


//fetch all active language
if(!function_exists('language')){
    function language(){
        return Language::where('status',Status::ACTIVE)->get();
    }
}

//fetch active language icon
if(!function_exists('languageicon')){
    function languageicon($code){
         $lang = Language::where('code',$code)->where('status',Status::ACTIVE)->first();
         if(!$lang):
           Session::forgot('locale');
         endif;
         return $lang->icon_class;
    }
}

//fetch active language icon
if(!function_exists('languagename')){
    function languagename($code){
         $lang = Language::where('code',$code)->where('status',Status::ACTIVE)->first();
         if(!$lang):
           Session::forgot('locale');
         endif;
         return $lang->name;
    }
}



if(!function_exists('hasPermission')){
    function hasPermission($permission=null){
        if(in_array($permission,Auth::user()->permissions)):
            return true;
        endif;
        return false;
    }
}
//end permission check


// date format
if(!function_exists('dateFormat')) {
    function dateFormat($date)
    {
        $date  = DateTime::createFromFormat('d/m/Y',$date);
        return Carbon::parse($date)->format('d M Y');
    }
}
//end date format



//activity changes old data
if (!function_exists('oldLogDetails')) {

    function oldLogDetails($oldLogs,$newLogs)
    {
        foreach ($oldLogs as $key => $value) {
            if($newLogs == $key){
                    return $value;
            }
        }
    }
}


//demo users
if (!function_exists('demoUsers')) {

    function demoUsers()
    {
       return User::where(['status'=>Status::ACTIVE,'is_ban'=>BanUser::UNBAN])->limit(2)->get();
    }
}

//todo charts
if (!function_exists('todoChart')) {

    function todoChart($month,$status)
    {

         $date     = Carbon::createFromDate(Date('Y-').$month.Date('-d'));
         $startDay = $date->startOfMonth()->startOfDay()->format('Y-m-d H:i:s');
         $endOfDay = $date->endOfMonth()->endOfDay()->format('Y-m-d H:i:s');
         $todo     = Todo::where('status',$status)->whereBetween('created_at',[$startDay,$endOfDay])->orderByDesc('id')->get();
         return $todo->count();

    }
}

//login activity country wise user
if (!function_exists('countryLogin')) {

    function countryLogin($user)
    {
        $user_id = $user->pluck('id')->toArray();
        $users = LoginActivity::whereIn('id',$user_id)->get();
        return $users->groupBy('user_id')->count();
    }
}


if (!function_exists('static_asset')) {

    function static_asset($path = ''){
        if (strpos(php_sapi_name(), 'cli') !== false || defined('LARAVEL_START_FROM_PUBLIC')) {
            return app('url')->asset($path);
        }else{
            return app('url')->asset('public/'.$path);
        }

    }
}


