<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuth\ForgotPassword;
use App\Models\User;
use App\Repositories\Auth\AuthInterface;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    protected $repo;
    public function __construct(AuthInterface $repo)
    {
        $this->repo = $repo;
    }
    public function passwordResetLink(Request $request){

        $user = User::where('email',$request->email)->first();
        if(!$user):
            return redirect()->back()->withErrors([
                'email' =>"We can't find a user with that email address."
            ]);
        endif;
        if($this->repo->passwordResetlink($request)):
            return redirect()->back()->with('status','We have sended password reset link.');
        else:
            toast('Mail server is not working. Please try again','error');
            return redirect()->back();
        endif;
    }

    public function passwordReset($token){
        return view('auth.passwords.reset',compact('token'));
    }

    public function passwordUpdate(ForgotPassword $request){
        $user = User::where('email',$request->email)->first();
        if(!$user):
            return redirect()->back()->withErrors([
                'email' =>"We can't find a user with that email address."
            ]);
        endif;
        if($user->forgot_token !== $request->token):
            toast('token has expired.','error');
            return redirect('password/reset/'.$request->token.'?email='.$request->email);
        endif;

        if($this->repo->passwordUpdate($request)):
            toast('Password successfully changes','success');
            return redirect()->route('login');
        else:
            toast(__('error'),'error');
            return redirect('password/reset/'.$request->token.'?email='.$request->email);
        endif;
    }

}
