<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
class Controllerchackmember extends Controller
{

    public function user_chack($id)
    {
        $chack = User::find($id);
        return view('admin.userchack',compact('chack'));
    }

    public function user_confirm(Request $request, $id)
    {
        $user = User::find($id);
        $user->status     = 'confirm';

        $user->save();
        return redirect('dashboard');
    }

}
