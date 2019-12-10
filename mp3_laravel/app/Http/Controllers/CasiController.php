<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\CaSi;
use App\TheLoai;

class CasiController extends Controller
{
    public function casi(){
        $casi = CaSi::all();
        return view('admin.casi',['casi'=>$casi]);
    }
    public function getaddcasi(){
        return view('admin.addcasi');
    }
    public function postaddcasi(Request $request)
    {
        $this->validate($request,[
            'tencasi'=>'required|min:3',
            'image'=>'required',
            'introduce'=>'required|min:10',
        ],[
            'tencasi.required'=>'Bạn chưa nhập tên người dùng',
            'tencasi.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
            'introduce.required'=>'Bạn chưa nhập tiểu sử của ca sĩ',
            'introduce.min'=>'Giới thiệu phải nhiều hơn 10 kí tự'
        ]);
        $casi = new CaSi;
        $casi->tencasi = $request->tencasi;
        $casi->introduce = $request->introduce;
        if($request->hasFile('image')==true){
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();//lấy tên file ảnh
            $image = rand(0,9999)."_".$name_image;
            while (file_exists("images/images_casi".$image)) {
                $image = rand(0,9999)."_".$name_image;
            }
            $file->move(public_path("images/images_casi"),$image);
            $casi->anhdaidien = $image;
        }
        else{
            $casi->anhdaidien = "";
        }
        
        $casi->save();

        return redirect('admin/casi')->with('thongbao','Thêm thành công');

    }
    public function getdeletecasi($id){
        $casi = CaSi::find($id);
        // $image_path = app_path("images/images_casi/{$casi->anhdaidien}");
        // if (File::exists($image_path)) {
        //     //File::delete($image_path);
        //     unlink($image_path);
        // }
        $casi->delete();
        return redirect('admin/casi')->with('thông báo','Xóa user thành công');
    }
    public function geteditcasi($id){
        $casi = CaSi::find($id);
        return view('admin.editcasi',['casi'=>$casi]);
    }
    public function posteditcasi(Request $request, $id){
        $this->validate($request,[
            'tencasi'=>'required|min:3',
            'introduce'=>'required|min:10',
        ],[
            'tencasi.required'=>'Bạn chưa nhập tên người dùng',
            'tencasi.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
            'introduce.required'=>'Bạn chưa nhập tiểu sử của ca sĩ aa',
            'introduce.min'=>'Giới thiệu phải nhiều hơn 10 kí tự'
        ]);
       
        if($request->hasFile('image')==true){
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();//lấy tên file ảnh
            $image = rand(0,9999)."_".$name_image;
            while (file_exists("images/images_casi".$image)) {
                $image = rand(0,9999)."_".$name_image;
            }
            $file->move(public_path("images/images_casi"),$image);
            $request->anhdaidien = $image;
        }
        else{
            $request->anhdaidien = $request->img_hidden;
        }
        CaSi::where('id',$id)->update([
            'tencasi'=> $request->tencasi,
            'anhdaidien'=> $request->anhdaidien,
            'introduce'=> $request->introduce
        ]);

        return redirect('admin/casi')->with('thongbao','Sữa thành công');

    }
}
