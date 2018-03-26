<?php

namespace App\Http\controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\News;
use DB;


class controllernews extends Controller
{
  // public function index()
  // {
  //     return view('admin/dashboard');
  // }

  public function add_news(Request $request)
  {
  $news = new news();
  $news->name_user     = Input::get("name_user");
  $news->topic     = Input::get("topic");
  $news->detail     = Input::get("detail");

  if($request->file('image')){ //Upload Image
    $file = Input::file('image');
    $file->move(public_path().'/news/img',$file->getClientOriginalName());
    $news->img = $file->getClientOriginalName();
  }

  if($request->file('pdfUpload')){ //Upload file pdf
    $file = Input::file('pdfUpload');
    $file->move(public_path().'/news/file',$file->getClientOriginalName());
    $news->file = $file->getClientOriginalName();
  }
  if(Input::file('video')){ //Upload file video
    $file = Input::file('video');
    $file->move(public_path().'/news/video',$file->getClientOriginalName());
    $news->video = $file->getClientOriginalName();
  }

  $news->save();
  return Redirect('/dashboard');
}
public function news_detailshow($id)
{
    $newsdetail = News::find($id);
    return view('admin/newsdetail',compact('newsdetail'));
}
public function news_editshow($id)
{
    $newsedit = News::find($id);
    return view('admin/newsedit',compact('newsedit'));
}
public function edit_news(Request $request, $id)
{
    $news = news::find($id);
    $news->name_user        = $request->name_user;
    $news->topic   = $request->topic;
    $news->detail      = $request->detail;
    if($request->file('image')){ //Upload Image
      $file = Input::file('image');
      $file->move(public_path().'/news/img',$file->getClientOriginalName());
      $news->img = $file->getClientOriginalName();
    }

    if($request->file('pdfUpload')){ //Upload file pdf
      $file = Input::file('pdfUpload');
      $file->move(public_path().'/news/file',$file->getClientOriginalName());
      $news->file = $file->getClientOriginalName();
    }
    if(Input::file('video')){ //Upload file video
      $file = Input::file('video');
      $file->move(public_path().'/news/video',$file->getClientOriginalName());
      $news->video = $file->getClientOriginalName();
    }

    $news->save();
    return Redirect()->back();
}

  public function news_block(Request $request,$id)
  {
    $news = News::find($id);
    $news->status     = '0';

    $news->save();
      return redirect('/dashboard');
  }

  public function news_unblock(Request $request,$id)
  {
      $news = News::find($id);
      $news->status     = '1';

      $news->save();
      return redirect('/dashboard');
  }
  public function news_delete($id)
  {
      DB::table('news')->where('id',$id)->delete();
      return redirect('/dashboard');
  }

}
