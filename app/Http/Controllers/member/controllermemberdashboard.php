<?php

namespace App\Http\controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\News;
use App\Blog;

class controllermemberdashboard extends Controller
{
  public function index()
  {

      $news = news::orderBy('created_at', 'DESC')->get();
      $blog = Blog::orderBy('created_at', 'DESC')->get();

      return view('member/memberdashboard')->with('news',$news)->with('blog',$blog );
  }


}
