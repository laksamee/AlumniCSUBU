<?php

namespace App\Http\controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comments;

class commentsController extends Controller
{
  public function index($id)
  {

    $topic = Blog::find($id);
    $comment = Comments::where('id_blog', '=', $id)->paginate(5);
    return view('/comments')->with('topic',$topic)->with('comment',$comment);
  }
  public function post_comment(Request $request, $id)
  {

      $comment = new comments();
      $comment->id_blog         = $id;
      $comment->name            = $request->name;
      $comment->email           = $request->email;
      $comment->detail          = $request->detail;
      $comment->save();


      return  Redirect()->back();

  }


}
