<?php
namespace App\Repositories\Settings;

use App\Enums\Status;
use App\Models\Backend\Setting;
use App\Repositories\Upload\UploadInterface;

class SettingsRepository implements SettingsInterface
{
    public function __construct(UploadInterface $upload){
        $this->upload = $upload;
    }
    public function updateSettings($request){
         try {
                $ignore    = [];
                $ignore [] = '_token';
                $ignore [] = '_method';

                //mail settings
                if($request->mail_driver && $request->mail_driver == 'sendmail'):
                    $ignore [] ="mail_host";
                    $ignore [] ="mail_port";
                    $ignore [] ="mail_address";
                    $ignore [] ="mail_name";
                    $ignore [] = "mail_username";
                    $ignore [] ="mail_password";
                    $ignore [] ="mail_encryption";
                    $ignore [] ="signature";
                elseif($request->mail_driver && $request->mail_driver == 'smtp'):
                    $ignore[]='sendmail_path';
                endif;
                //end mail settings


                //end social login settings
                if($request->recaptcha){
                    $ignore[]                  = "recaptcha";
                    $request['recaptcha_status']= $request->recaptcha_status == 'on'? Status::ACTIVE:Status::INACTIVE;
                }
                //end recaptcha

                //social login settings
                // elseif($request->facebook){
                //     $ignore[]                  = "facebook";
                //     $request['facebook_status']= $request->facebook_status == 'on'? Status::ACTIVE:Status::INACTIVE;
                // }
                // elseif($request->google){
                //     $ignore[]                  = "google";
                //     $request['google_status']= $request->google_status == 'on'? Status::ACTIVE:Status::INACTIVE;
                // }

                // dd($request->except($ignore));

                foreach ($request->except($ignore) as $key => $value) {
                    $settings        = Setting::where('title',$key)->first();

                    if($settings){
                        if($key == 'logo'){
                            $logo              = Setting::where('title',$key)->first();
                            $settings->value  = $this->upload->upload('settings',$logo->value,$request->logo);
                        }elseif($key == 'favicon'){
                            $favicon           = Setting::where('title',$key)->first();
                            $settings->value  = $this->upload->upload('settings',$favicon->value,$request->favicon);
                        }else{
                            $settings->value   = $value;
                        }
                        $settings->save();
                    }else{
                        $settings          = new Setting();
                        $settings->title   = $key;
                        if($key == 'logo'){
                            $settings->value  = $this->upload->upload('settings','',$request->logo);
                        }elseif($key == 'favicon'){
                            $settings->value  = $this->upload->upload('settings','',$request->favicon);
                        }else{
                            $settings->value   = $value;
                        }

                        $settings->save();
                    }
                }
                return true;
         } catch (\Throwable $th) {

            return false;
         }
    }
}
