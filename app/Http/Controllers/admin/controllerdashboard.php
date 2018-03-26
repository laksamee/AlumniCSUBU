<?php

namespace App\Http\controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\News;
use App\Blog;

class controllerdashboard extends Controller
{
  // public function index()
  // {
  //     return view('admin/dashboard');
  // }

  public function index()
  {
      $users = User::orderBy('generation', 'ASC')->get();
      $news = news::orderBy('created_at', 'DESC')->get();
      $blog = Blog::orderBy('created_at', 'DESC')->get();

      return view('admin/dashboard')->with('news',$news)->with('users',$users )->with('blog',$blog );
  }


}
