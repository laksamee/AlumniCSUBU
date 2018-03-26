<?php

namespace App\Http\controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\News;
use App\Blog;

class controllermemberprofile extends Controller
{
  public function member_profile()
  {
      return view('member/member_profile');
  }

  public function member_updateprofile(Request $request, $id)
  {
    $user = User::find($id);
    $user->id_std        = $request->idstd;
    $user->name          = $request->name;
    $user->years         = $request->years;
    $user->generation    = $request->generation;
    $user->email         = $request->email;
    if(Input::file('member_img')){ //Upload Image
      $file = Input::file('member_img');
      $file->move(public_path().'/user/profile',$file->getClientOriginalName());
      $user->profile = $file->getClientOriginalName();
    }
    if(Input::file('pdfUpload')){ //Upload file pdf
      $file = Input::file('pdfUpload');
      $file->move(public_path().'/user/file',$file->getClientOriginalName());
      $user->senior_project = $file->getClientOriginalName();
    }
    if(Input::file('video')){ //Upload file pdf
      $file = Input::file('video');
      $file->move(public_path().'/user/video',$file->getClientOriginalName());
      $user->video_project = $file->getClientOriginalName();
    }

    $user->save();
    return Redirect()->back();
  }


}
