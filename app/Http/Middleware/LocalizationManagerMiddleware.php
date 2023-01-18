<?php

namespace App\Http\Middleware;

use App\Models\Backend\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class LocalizationManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('locale')){//if language change
            $lang = Language::where('code',Session::get('locale'))->first();
            if(!$lang ):
                App::setLocale('en');
                Session::put('locale','en');
            endif;
            if(File::exists(base_path('/lang/'.Session::get('locale')))):
                App::setlocale(Session::get('locale'));
            endif;
        }else{//default language
            $lang = Language::where('code',defaultLanguage())->first();
            if($lang && File::exists(base_path('/lang/'.$lang->code)))://if was find language and language folder
                App::setlocale(defaultLanguage());
            else:
                Session::put('locale','en');
                App::setlocale(Session::get('locale'));
            endif;
        }

        return $next($request);
    }
}
