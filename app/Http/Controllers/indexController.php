<?php

namespace App\Http\controllers;

use Illuminate\Http\Request;
use App\User;
use App\News;

class indexController extends Controller
{
  // public function index()
  // {
  //     return view('index');
  // }

    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();
        $news = news::orderBy('created_at', 'DESC')->paginate(5);

        return view('/index')->with('news',$news)->with('users',$users );
    }
    public function detail($id)
    {
        $detail = news::find($id);
        return view('/newsdetail',compact('detail'));
    }

    public function memberdetial($id)
    {
        $user = User::find($id);
        return view('/member',compact('user'));
    }


}
