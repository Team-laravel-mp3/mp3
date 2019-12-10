<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\CaSi;
use App\TheLoai;

class AdminController extends Controller
{
    public function user(){
        $user = User::all();
        return view('admin.user',['user'=>$user]);
    }
    public function getdeleteuser($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user')->with('thông báo','Xóa user thành công');
    }
    //
    ///
    
}
