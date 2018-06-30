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
use App\sendMail\mail_member;




class controllermember extends Controller
{

  public function member_add()
  {
    $user = new User();
    $user->id_std     = Input::get("userid");
    $user->name       = Input::get("name");
    $user->email      = Input::get("email");
    $user->years      = Input::get("years");
	$user->generation = Input::get("generation");
    $user->address    = Input::get("address");
    $pass             = str_random(6);
    $user->password   = Hash::make($pass);
    $user->remember_token = Hash::make(openssl_random_pseudo_bytes(30));
    $user->type   = 'member';
    $user->status   = 'confirm';
    if(Input::file('image')){ //Upload Image
      $file = Input::file('image');
      $file->move(public_path().'/user/profile',$file->getClientOriginalName());
      $user->profile = $file->getClientOriginalName();
    }
    if(Input::file('pdfUpload')){ //Upload file pdf
      $file = Input::file('pdfUpload');
      $file->move(public_path().'/user/file',$file->getClientOriginalName());
      $user->senior_project = $file->getClientOriginalName();
    }
    if(Input::file('video')){ //Upload file video
      $file = Input::file('video');
      $file->move(public_path().'/user/video_project',$file->getClientOriginalName());
      $user->video_project = $file->getClientOriginalName();
    }

    Mail::send('admin/sendmail/mail_member_add',compact('user','pass'), function($message){
       $message->to(Input::get("email"),Input::get("name"))->subject
          ('ลงทะเบียนสมาชิกศิษย์เก่าสาขาวิทยาการคอมพิวเตอร์ มหาวิทยาลัยอุบลราชธานี');
       $message->from('laksamee.pr.27@ubu.ac.th','CS-UBU Alumni');
    });
    $user->save();
    return Redirect('/dashboard');
  }
  public function showedit($id)
  {
    $user = User::find($id);
    return view('admin.memberedit',compact('user'));
  }

  public function member_update(Request $request, $id)
  {
    $user = User::find($id);
    $user->name          = $request->name;
    $user->years         = $request->years;
    $user->generation    = $request->generation;
    $user->email         = $request->email;
    if(Input::file('img')){ //Upload Image
      $file = Input::file('img');
      $file->move(public_path().'/user/profile',$file->getClientOriginalName());
      $user->profile = $file->getClientOriginalName();
    }
    if(Input::file('pdfUpload')){ //Upload file pdf
      $file = Input::file('pdfUpload');
      $file->move(public_path().'/user/file',$file->getClientOriginalName());
      $user->senior_project = $file->getClientOriginalName();
    }
    if(Input::file('video')){ //Upload file video
      $file = Input::file('video');
      $file->move(public_path().'/user/video_project',$file->getClientOriginalName());
      $user->video_project = $file->getClientOriginalName();
    }

    $user->save();
    return Redirect()->back();
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

  public function member_delete($id)
  {
      DB::table('users')->where('id',$id)->delete();
      return redirect('/dashboard');
  }




}
