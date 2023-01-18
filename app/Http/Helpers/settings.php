<?php

// settings helper
//settings

use App\Models\Backend\Setting;
use App\Models\Upload;
use Illuminate\Support\Facades\File;

if(!function_exists('settings')){
    function settings($title=""){
         $settings = Setting::where('title',$title)->first();
         if($settings):
            return $settings->value;
         endif;
        return null;
    }
}
//end settings helpers





//logo
if(!function_exists('logo')){
    function logo($upload_id=null){
        $logo   = Upload::find($upload_id);
        if($logo && File::exists(public_path($logo->original))):
            return static_asset($logo->original);
        endif;
        return static_asset('Backend/images/logo.png');
    }
}
//end logo


//favicon
if(!function_exists('favicon')){
    function favicon($upload_id=null){
        $favicon   = Upload::find($upload_id);
        if($favicon && File::exists(public_path($favicon->original))):
            return static_asset($favicon->original);
        endif;
        return static_asset('Backend/images/favicon.png');
    }
}
//end favicon

