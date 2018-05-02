<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Mail;
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
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
             'idstd' => 'required|string|max:10',
             'name' => 'required|string|max:255',
             'years' => 'required|string|max:4',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:6|confirmed',
         ]);
     }

     /**
      * Create a new user instance after a valid registration.
      *
      * @param  array  $data
      * @return \App\User
      */
     protected function create(array $data)
     {
        Session::flash('success');
         $user = User::create([
             'id_std' => $data['idstd'],
             'name' => $data['name'],
             'years' => $data['years'],
             'email' => $data['email'],
             'password' => bcrypt($data['password']),
             'type' =>'member',
             'status' => 'unconfirm',
         ]);

         $emails = User::select('email')->where('type','admin')->get();
         $email = array_pluck($emails, 'email');
         Mail::send('sendmail/mail_member_register', compact('user'), function($message) use ($email) {
           $message->to($email);
           $message->subject('ตรวจสอบรายชื่อลงทะเบียนศิษย์เกาสาขาวิทยาการคอมพิวเตอร์ ');
            $message->from('laksamee.pr.57@ubu.ac.th','Alumni CS UBU');
         });
         return $user;
     }
}
