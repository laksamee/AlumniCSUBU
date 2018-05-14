<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Mail;
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


          Mail::send('admin/sendmail/mail_confirm', array('user'=>$user), function($message) use ($user) {
             $message->to($user->email)->subject
                ('ตรวจสอบยืนยันการลงทะเบียนศิษย์เก่าสาขาวิทยาการคอมพิวเตอร์ มหาวิทยาลัยอุบลราชธานี');
             $message->from('laksamee.pr.57@ubu.ac.th','Alumni CS UBU');
          });

        $user->save();
        return redirect('dashboard');
    }

}
