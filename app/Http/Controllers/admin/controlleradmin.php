<?php

namespace App\Http\controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use App\User;
use DB;
use Mail;
use Illuminate\Support\Facades\Crypt;


class controlleradmin extends Controller
{
  public function admin_add(Request $request)
  {


    $user = new User();
    $user->name       = Input::get("name");
    $user->email      = Input::get("email");
    $pass             = str_random(6);
    $user->password   = Hash::make($pass);
    $user->remember_token = Hash::make(openssl_random_pseudo_bytes(30));
    $user->type      = 'admin';
    $user->status   = 'confirm';
    $user->block    = '1';

    //$data = array('name','email','pass');

    if(Input::file('admin_img')){ //Upload Image
      $file = Input::file('admin_img');
      $file->move(public_path().'/user/profile',$file->getClientOriginalName());
      $user->profile = $file->getClientOriginalName();
    }
          Mail::send('admin/sendmail/mail_admin_add',compact('user','pass'), function($message){
             $message->to(Input::get("email"),Input::get("name"))->subject
                ('ลงทะเบียนผู้ดูแลระบบ');
             $message->from('laksamee.pr.27@ubu.ac.th','CS-UBU Alumni');
          });

    $user->save();
    return Redirect('/dashboard');
  }

  public function admin_edit($id)
  {
      $user = User::find($id);
      return view('admin/adminedit',compact('user'));
  }
  public function admin_update(Request $request, $id)
  {
    $user = User::find($id);
    $user->name       = $request->name;
    $user->email      = $request->email;
    if($request->file('admin_img')){  /////Upload Image
      $file = Input::file('admin_img');
      $file->move(public_path().'/user/profile',$file->getClientOriginalName());
      $user->profile = $file->getClientOriginalName();
    }
    $user->save();
      return redirect()->back();
  }
  public function block(Request $request, $id)
  {
      $user = User::find($id);
      $user->block     = '0';

      $user->save();
      return redirect('/dashboard');
  }

  public function unblock(Request $request, $id)
  {
      $user = User::find($id);
      $user->block     = '1';

      $user->save();
      return redirect('/dashboard');
  }

  public function admin_delete($id)
  {
      DB::table('users')->where('id',$id)->delete();
      return redirect('/dashboard');
  }



  public function profile_admin()
  {
      return view('admin/profileadmin');
  }
  public function profile_update(Request $request, $id)
  {

    $user = User::find($id);
    $user->name       = $request->name;
    $user->email      = $request->email;
    if($request->file('admin_img')){ //Upload Image
      $file = Input::file('admin_img');
      $file->move(public_path().'/user/profile',$file->getClientOriginalName());
      $user->profile = $file->getClientOriginalName();
    }

    $user->save();
    return Redirect()->back();
  }


}
