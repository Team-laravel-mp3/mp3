<?php

namespace App\Http\Controllers;

use App\BaiHatMoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user(){
        return view('pages.user');
    }
    public function userbaihat(){
        return view('pages.user.baihatuser');
    }
    public function usercasi(){
        return view('pages.user.casiuser');
    }
    public function danhsachupload(){
        $baihatmoi = BaiHatMoi::all();
        return view('pages.user.danhsachupload',['baihatmoi'=>$baihatmoi]);
    }
    public function getdeletebaihatmoi($id){
        $baihatmoi = BaiHatMoi::find($id);
        
        $image_path = public_path("images/images_baihatmoi/".$baihatmoi->image);
        if (file_exists($image_path)) {
            // File::delete($image_path);
            unlink($image_path);
        }
        
        $baihatmoi->delete();
        return redirect('user/danhsachupload')->with('thông báo','Xóa bài hát thành công');
    }
    public function getedit($id){
        $baihatmoi = BaiHatMoi::find($id);
        return view('pages.user.editbaihatmoi',['baihatmoi'=>$baihatmoi]);
    }
    public function playlist(){
        return view('pages.user.playlist');
    }
    public function userupload(){
        return view('pages.user.upload');
    }
    public function postuserupload(Request $request){
        $this->validate($request,[
            'tenbaihat'=>'required|min:3',
            'mp3'=>'required',
            'image'=>'required',
            'theloai'=>'required',
            'loibaihat'=>'required|min:50',
        ],[
            'tenbaihat.required'=>'Bạn chưa nhập tên người dùng',
            'tencasi.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
            'mp3.required'=>'Bạn chưa nhập tên người dùng',
            'image.required'=>'Bạn chưa nhập tên người dùng',
            'theloai.required'=>'Bạn chưa nhập tên người dùng',
            'loibaihat.required'=>'Bạn chưa nhập lời bài hát',
            'loibaihat.min'=>'Lời bài hát phải nhiều hơn 50 kí tự'
        ]);
        
        $baihatmoi = new BaiHatMoi;
        $baihatmoi->iduser = Auth::user()->id;
        $baihatmoi->tenbaihat = $request->tenbaihat;
        $baihatmoi->loibaihat = $request->loibaihat;
        $baihatmoi->idtheloai = $request->theloai;
        // $baihatmoi->tencasi = $request->tencasi;
        if($request->hasFile('image')==true){
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();//lấy tên file ảnh
            $image = rand(0,9999)."_".$name_image;
            while (file_exists("images/images_baihatmoi".$image)) {
                $image = rand(0,9999)."_".$name_image;
            }
            $file->move(public_path("images/images_baihatmoi"),$image);
            $baihatmoi->image = $image;
        }
        else{
            $baihatmoi->image = "";
        }
        if($request->hasFile('mp3')==true){
            $file = $request->file('mp3');
            $name_mp3= $file->getClientOriginalName();//lấy tên file ảnh
            $mp3 = rand(0,9999)."_".$name_mp3;
            while (file_exists("mp3/mp3_moi".$mp3)) {
                $mp3 = rand(0,9999)."_".$name_mp3;
            }
            $file->move(public_path("mp3/mp3_moi"),$mp3);
            $baihatmoi->file = $mp3;
        }
        else{
            $baihatmoi->file = "";
        }
        $baihatmoi->status = "1";
        $baihatmoi->save();

        
        // $insertedId = $baihathot->id;
        // $baihathot_casi = BaiHatHot::find($insertedId);
        
        // foreach($request->casi as $value){
        //     $baihathot_casi->casi()->attach($value); 
        // }

        return redirect('user/danhsachupload')->with('thongbao','Thêm thành công');
    }
}
