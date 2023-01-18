<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\MailSettingsRequest;
use App\Http\Requests\Settings\MailTestRequest;
use App\Repositories\MailSettings\MailSettingsInterface;
use App\Repositories\Settings\SettingsInterface;
use Illuminate\Http\Request;

class MailSettingsController extends Controller
{
    protected $repo;
    protected $settingsRepo;

    public function __construct(MailSettingsInterface $repo,SettingsInterface $settingsRepo)
    {
        $this->repo    = $repo;
        $this->settingsRepo = $settingsRepo;
    }
    public function index(){

        return view('backend.settings.mail_settings.index');
    }

    public function update(MailSettingsRequest $request){

        if($this->settingsRepo->updateSettings($request)):
            toast(__('mail_settings_updated'),'success');
            return redirect()->route('settings.mail.settings.index');
        else:
            toast(__('error'),'error');
            return redirect()->back();
        endif;
    }

    public function testSendMail(MailTestRequest $request){
        if($this->repo->mailSendTest($request)):
            toast(__('mail_send_test'),'success');
            return redirect()->route('settings.mail.settings.index');
        else:
            toast(__('mail_error'),'error');
            return redirect()->back();
        endif;
    }
}
