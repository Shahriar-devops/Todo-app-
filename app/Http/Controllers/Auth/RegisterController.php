<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Backend\Role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Repositories\Auth\AuthInterface;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Auth\Events\Registered;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $repo;
    public function __construct(AuthInterface $repo)
    {
        $this->middleware('guest');
        $this->repo   = $repo;
    }


    public function register(Request $request)
    {

            $this->validator($request->all())->validate();
            event(new Registered($user = $this->create($request->all())));
             if($user && !$this->repo->registermailSend($user)):
                toast('Mail server is not working. Please try again','error');
                return redirect()->back();
             endif;
            if ($response = $this->registered($request, $user)) {
                return $response;
            }
            $resend =  "if you don't received the verification mail, please click the resend. "."<a class='text-primary'  href='".route('register.resend.verify.mail',['email'=>$user->email])."'><b>Resend</b></a>";
            return redirect()->back()->with('status','We have sended email verification link.Please check your inbox.'.$resend);



    }

    public function resendRegisterMail(Request $request){
        $user      = User::where(['email'=>$request->email])->first();
        $verified = User::where(['email'=>$request->email,'email_verified'=>1])->first();
        if($verified):
            toast('Account already activated.','error');
            return redirect()->back();
        endif;
        if($user && !$this->repo->registermailSend($user)):
            toast('Mail server is not working. Please try again','error');
            return redirect()->back();
        endif;
        $resend =  "if you don't received the verification mail, please click the resend. "."<a class='text-primary'  href='".route('register.resend.verify.mail',['email'=>$user->email])."'><b>Resend</b></a>";
        return redirect()->back()->with('status','We have sended email verification link.Please check your inbox.'.$resend);

    }


    public function VerifyNow(Request $request){
        $user = User::where(['email'=>$request->email,'verify_token'=>$request->verify_token])->first();
        if(!$user):
            toast('token has expired.','error');
            return redirect()->route('login');
        endif;

        if($this->repo->verifyNow($request)):
            return redirect('/login')->with('status','Account has been activated.');
        else:
            toast(__('error'),'error');
            return redirect()->route('login');
        endif;
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if(settings('recaptcha_status') == 1):
            $recaptcha  = 'required|string';
        else:
            $recaptcha  = '';
        endif;

        return Validator::make($data, [
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'date_of_birth' => ['required'],
            'gender'        => ['required'],
            'phone'         => ['required','numeric'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => $recaptcha
        ],[
            'gender.required' => 'Please select a gender.',
            'g-recaptcha-response.required'=>'Please verify that you are not a robot.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        $role                = Role::find(2);
        return User::create([
            'name'           => $data['name'],
            'email'          => $data['email'],
            'phone'          => $data['phone'],
            'gender'         => $data['gender'],
            'role_id'        => $role ? $role->id : null,
            'permissions'    => $role ? $role->permissions : [],
            'date_of_birth'  => Carbon::parse($data['date_of_birth'])->format('d-m-Y'),
            'password'       => Hash::make($data['password']),
            'verify_token'   => \Str::random(16),
        ]);
    }
}
