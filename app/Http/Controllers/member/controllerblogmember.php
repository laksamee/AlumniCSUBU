<?php

namespace App\Http\controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Blog;
use App\Comments;
use DB;
class controllerblogmember extends Controller
{
  public function add_blog()
  {
        $blog = new Blog();
        $blog->name  = Input::get("name");
        $blog->email = Input::get("email");
        $blog->topic = Input::get("topic");
        $blog->detail = Input::get("detail");
        $blog->save();
        return Redirect('/memberdashboard');
  }
  public function blog_edit($id)
  {
    $topic = Blog::find($id);
    return view('member/member_blogedit')->with('topic',$topic);
  }
  public function member_blogupdate(Request $request,$id)
  {
    $update = Blog::find($id);

    $update->topic          = $request->topic;
    $update->detail         = $request->detail;
    $update->save();
    return Redirect()->back();
  }

  public function blog_delete($id)
  {
      DB::table('blog')->where('id',$id)->delete();
      DB::table('comment')->where('id_blog',$id)->delete();
      return Redirect()->back();
  }

  public function blog_show($id)
  {

    $topic = Blog::find($id);
    $comment = Comments::where('id_blog', '=', $id)->paginate(5);
    return view('member/member_blogdetail')->with('topic',$topic)->with('comment',$comment);
  }
/////////////////////////////////////////////////////////////////////////////////////////////
  public function member_comment(Request $request,$id)
  {
        $comment = new Comments();
        $comment->id_blog         = $id;
        $comment->name            = $request->name;
        $comment->email           = $request->email;
        $comment->detail         = $request->detail;
        $comment->save();
        return Redirect()->back();
  }


  public function comment_deletemember($id)
  {
    DB::table('comment')->where('id',$id)->delete();
    return Redirect()->back();
  }

  public function comment_deletemember_home($id)
  {
    DB::table('comment')->where('id',$id)->delete();
    return Redirect()->back();
  }

}
