<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AccController extends Controller
{   
    public function getDangNhap(){
        return view('pages.login');
    }
    public function postDangNhap(Request $request)
    { 
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:5|max:32'
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa Nhập mật khẩu',
            'password.min'=>'Password không được nhở hơn 5 kí tự',
            'password.max'=>'Password không được lớn hơn 32 kí tự'
        ]);
        // if(Auth::attempt(['email'=>$request->email=='thang@gmail.com','password'=>$request->password=='123456'])){
        //     return redirect('/admin/dashboard');
        // }
         if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/home');
        }
        else{
           return redirect('login')->with('thongbao','Đăng nhập không thành công'); 
        }
    }
    public function getregister(){
        return view('pages.register');
    }
    public function postregister(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:5|max:32',
            'repassword'=>'required|same:password'
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.uniqued'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa Nhập mật khẩu',
            'password.min'=>'Password không được nhở hơn 5 kí tự',
            'password.max'=>'Password không được lớn hơn 32 kí tự',
            'repassword.required'=>'Bạn chưa nhập lại mật khẩu',
            'repassword.same'=>'Mật khẩu nhập lại chưa khớp'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->avatar="default_avatar.png";
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('register')->with('thongbao','Thêm thành công');

    }
}
