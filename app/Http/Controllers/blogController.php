<?php

namespace App\Http\controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Blog;


class blogController extends Controller
{
  public function index()
  {
    $blog = Blog::orderBy('created_at', 'DESC')->paginate(10);
    return view('blog')->with('blog',$blog );
  }
  public function post_blog()
    {
        $blog = new blog();
        $blog->topic   = Input::get("topic");
        $blog->name    = Input::get("name");
        $blog->email   = Input::get("email");
        $blog->detail  = Input::get("detail");
        $blog->save();
      return Redirect('/blog');
    }


}
