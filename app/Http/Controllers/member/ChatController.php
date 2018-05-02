<?php

namespace App\Http\Controllers\member;
use App\Http\Controllers\Controller;
use App\Chat;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{



     public function index_chat()
     {
         return view('member.member_chats');
     }

}
