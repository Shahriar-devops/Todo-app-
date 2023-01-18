<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Repositories\Language\LanguageInterface;
use App\Repositories\Settings\SettingsInterface;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    protected $language;
    protected $settingsRepo;
    public  function __construct(LanguageInterface $language,SettingsInterface $settingsRepo)
    {

        $this->language     = $language;
        $this->settingsRepo = $settingsRepo;
    }
    public function index(){
        $languages          = $this->language->activelang();
        return view('backend.settings.general_settings.index',compact('languages'));
    }

    //update general settings
    public function generalSettingsUpdate(Request $request){

        if($this->settingsRepo->updateSettings($request)):
            toast(__('general_settings_updated'),'success');
            return redirect()->route('settings.general.settings.index');
        else:
            toast(__('error'),'error');
            return redirect()->back();
        endif;
    }
}
