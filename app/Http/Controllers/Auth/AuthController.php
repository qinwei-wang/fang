<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function login()
    {
        return view('auth.login');
    }

    /**
     * 用户登录
     *
     * @param LoginRequest $loginRequest
     */
    public function postLogin(Request $request)
    {
        //判断帐号是否激活
        $parameters = [
            'email' => $request->get('account'), // May be the username too
            'password' => $request->get('password'),
        ];
        $login = Auth::attempt($parameters,$request->get('remember'));
        if($login){
            PPLog::create(null,LogType::WebLogin,'登录系统',$parameters['email']);
            return Redirect::intended('/');
        }else{
            return Redirect::back()->withErrors(trans('login.alert.failure_login'));
        }
    }

    /**
     * 退出登录
     *
     * @return mixed
     */
    public function getLogout()
    {
        if (env('IS_SSO_AUTH')) {
            return Redirect::to(env('SSO_API_BASE_URL').'/auth/logout');
        }
        if(Auth::check()){
            Auth::logout();
        }
        return Redirect::intended('/');
    }
}
