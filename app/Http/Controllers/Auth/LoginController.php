<?php

namespace App\Http\Controllers\Auth;

use App\Enums\BanUser;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\LoginActivity\LoginActivityInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */



    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $LoginActivity;
    public function __construct(LoginActivityInterface $LoginActivity)
    {
        $this->middleware('guest')->except('logout');
        $this->LoginActivity  = $LoginActivity;

    }

    public function rootpaths(){
        return redirect()->route('admin.dashboard');
    }
    public function demoLogin(Request $request){
        $user = User::where('email',$request->email)->first();
        Auth::login($user);

        //add user  login activity
        if(Auth::check()):
            $this->LoginActivity->addLoginActivity(\Request::header('user_agent'),'user_logged_in');
        endif;
        //add user  login activity

          return $this->sendLoginResponse($request);

    }

    public function login(LoginRequest $request){


        if($request->remember != null)
        {
            Cookie::queue('useremail',   $request->email,1440);
            Cookie::queue('userpassword',$request->password,1440);
        }
        else
        {
            Cookie::queue(Cookie::forget('useremail'));
            Cookie::queue(Cookie::forget('userpassword'));
        }


        $user            = User::where('email',$request->email)->first();

        if($user && $user->email_verified !== 1){
            return redirect()->back()->withErrors([
                'email' => __('Account is not verified.')
            ])->withInput();
        }

        if($user && $user->status == Status::INACTIVE){
            return redirect()->back()->withErrors([
                'email' => __('inactive_account')
            ])->withInput();
        }


        if($user && $user->is_ban == BanUser::BAN){
            return redirect()->back()->withErrors([
                'email' => __('banned_account')
            ])->withInput();
        }


        if(!$user){
            return redirect()->back()->withErrors([
                'email' => trans('auth.failed')
            ])->onlyInput('email','password');
        }
        if($user && !Hash::check($request->password,$user->password)){
            return redirect()->back()->withErrors([
                'password'=>  trans('auth.password')
            ])->onlyInput('email','password');
        }



        if (method_exists($this, 'hasTooManyLoginAttempts') &&
              $this->hasTooManyLoginAttempts($request)) {
              $this->fireLockoutEvent($request);
              return $this->sendLockoutResponse($request);
          }
          $remember  = $request->remember ? true : false;
          if ($this->attemptLogin($request,$remember)) {
              if ($request->hasSession()) {
                  $request->session()->put('auth.password_confirmed_at', time());
              }

              //add user  login activity
              if(Auth::check()):
                    $this->LoginActivity->addLoginActivity(\Request::header('user_agent'),'user_logged_in');
              endif;
              //add user  login activity

              return $this->sendLoginResponse($request);
          }

          // If the login attempt was unsuccessful we will increment the number of attempts
          // to login and redirect the user back to the login form. Of course, when this
          // user surpasses their maximum number of attempts they will get locked out.
          $this->incrementLoginAttempts($request);


    }

    public function logout(Request $request){
        //add user  logout activity
        if(Auth::check()):
            $this->LoginActivity->addLoginActivity(\Request::header('user_agent'),'user_logged_out');
        endif;
        //add user  logout activity

        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($response = $this->loggedOut($request)) {
            return $response;
        }
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');


    }



}
