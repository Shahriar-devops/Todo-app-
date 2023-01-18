<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Repositories\Settings\SettingsInterface;
use Illuminate\Http\Request;

class ReCaptchaSettingsController extends Controller
{
    protected $settingsRepo;
    public function __construct(SettingsInterface $settingsRepo)
    {
        $this->settingsRepo = $settingsRepo;
    }
    public function index(){

        return view('backend.settings.recaptcha_settings.index');
    }

    public function update(Request $request){
        if($this->settingsRepo->updateSettings($request)):
            toast(__('recaptcha_updated'),'success');
            return redirect()->route('settings.recaptcha.index');
        else:
            toast(__('error'),'success');
            return redirect()->back()->withInput();
        endif;
    }
}
