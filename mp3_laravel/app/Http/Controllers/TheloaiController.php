<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\CaSi;
use App\TheLoai;

class TheloaiController extends Controller
{
    public function theloai(){
        $theloai = TheLoai::all();
        return view('admin.theloai',['theloai'=>$theloai]);
    }
    public function getdeletetheloai($id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai')->with('thông báo','Xóa user thành công');
    }
    public function gettheloai(){
        return view('admin.addtheloai');
    }
    public function posttheloai(Request $request){
        $this->validate($request,[
            'tentheloai'=>'required|min:3',
            'image'=>'required'
        ],[
            'tentheloai.required'=>'Bạn chưa nhập tên người dùng',
            'tentheloai.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
            'image.required'=>'Bạn chưa chọn ảnh'
        ]);
        $theloai = new TheLoai;
        $theloai->tentheloai = $request->tentheloai;
        if($request->hasFile('image')==true){
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();//lấy tên file ảnh
            $image = rand(0,9999)."_".$name_image;
            while (file_exists("images/images_theloai".$image)) {
                $image = rand(0,9999)."_".$name_image;
            }
            $file->move(public_path("images/images_theloai"),$image);
            $theloai->image = $image;
        }
        else{
            $theloai->image = "";
        }
        $theloai->save();

        return redirect('admin/theloai')->with('thongbao','Thêm thành công');
    }
    public function getedittheloai($id){
        $theloai = TheLoai::find($id);
        return view('admin.edittheloai',['theloai'=>$theloai]);
    }
    public function postedittheloai(Request $request, $id){
        $this->validate($request,[
            'tentheloai'=>'required|min:3',
        ],[
            'tentheloai.required'=>'Bạn chưa nhập tên người dùng',
            'tentheloai.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
        ]);
        if($request->hasFile('image')==true){
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();//lấy tên file ảnh
            $image = rand(0,9999)."_".$name_image;
            while (file_exists("images/images_theloai".$image)) {
                $image = rand(0,9999)."_".$name_image;
            }
            $file->move(public_path("images/images_theloai"),$image);
            $request->image = $image;
        }
        else{
            $request->image = $request->img_hidden;
        }
        TheLoai::where('id',$id)->update([
            'tentheloai'=> $request->tentheloai,
            'image'=> $request->image
        ]);

        return redirect('admin/theloai')->with('thongbao','Sữa thành công');

    }   
}
