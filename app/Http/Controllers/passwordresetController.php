<?php

namespace App\Http\controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\BcryptHasher;

use App\User;
use DB;
class passwordresetController extends Controller
{
  // public function index()
  // {
  //     return view('index');
  // }

    public function index()
    {
        return view('/passwordreset');
    }
    public function reset(Request $request)
    {
      $email = DB::table('users')->select('email')->get();
      $user = User::where('email')->get();
      if($email == Input::get("email")){
        Mail::send('admin/sendmail/mail_admin_add',compact('user','pass'), function($message){
           $message->to(Input::get("email"),Input::get("name"))->subject
              ('ลงทะเบียนผู้ดูแลระบบ');
           $message->from('laksamee.pr.27@ubu.ac.th','Alumni CS-UBU');
        });
        return Redirect()->back();
      }

    }


}
