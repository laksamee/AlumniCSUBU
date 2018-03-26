<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function field(){
      if(filter_var(request()->username,FILTER_VALIDATE_EMAIL)){
        return 'email';
      }else {
        return 'id_std';
      }
    }

    public function login(){
      if (Auth::attempt([$this->field() => request()->username,'password' => request()->password,'type' => 'admin',
      'status' => 'confirm'])){
        return redirect()->intended('/dashboard');
      }else if (Auth::attempt([$this->field() => request()->username,'password' => request()->password,'type' => 'member',
      'status' => 'confirm'])){
        return redirect()->intended('/memberdashboard');
      }else {
        Session::flash('error');
        return redirect()->back();
      }
    }
}
