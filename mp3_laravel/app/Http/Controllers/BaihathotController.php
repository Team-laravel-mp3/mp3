<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BaiHatHot;
use App\BaiHatHotCaSi;
use App\CaSi;

class BaihathotController extends Controller
{
    public function baihathot(){
        $baihathot = BaiHatHot::paginate(5);
        return view('admin.baihathot',['baihathot'=>$baihathot]);
    }
    public function getbaihathot(){
        return view('admin.addbaihathot');
    }
    public function postbaihathot(Request $request)
    {
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
        $baihathot = new BaiHatHot;
        $baihathot->tenbaihathot = $request->tenbaihat;
        $baihathot->loibaihat = $request->loibaihat;
        $baihathot->idtheloai = $request->theloai;
        if($request->hasFile('image')==true){
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();//lấy tên file ảnh
            $image = rand(0,9999)."_".$name_image;
            while (file_exists("images/images_baihathot".$image)) {
                $image = rand(0,9999)."_".$name_image;
            }
            $file->move(public_path("images/images_baihathot"),$image);
            $baihathot->image = $image;
        }
        else{
            $baihathot->image = "";
        }
        if($request->hasFile('mp3')==true){
            $file = $request->file('mp3');
            $name_mp3= $file->getClientOriginalName();//lấy tên file ảnh
            $mp3 = rand(0,9999)."_".$name_mp3;
            while (file_exists("mp3/mp3_hot".$mp3)) {
                $mp3 = rand(0,9999)."_".$name_mp3;
            }
            $file->move(public_path("mp3/mp3_hot"),$mp3);
            $baihathot->file = $mp3;
        }
        else{
            $baihathot->file = "";
        }
        
        $baihathot->save();

        
        $insertedId = $baihathot->id;
        $baihathot_casi = BaiHatHot::find($insertedId);
        
        foreach($request->casi as $value){
            $baihathot_casi->casi()->attach($value); 
        }

        return redirect('admin/baihathot')->with('thongbao','Thêm thành công');

    }
    public function getdeletebaihathot($id){
        $baihathot_casi = BaiHatHot::find($id);
        
        $image_path = public_path("images/images_baihathot/".$baihathot_casi->image);
        if (file_exists($image_path)) {
            // File::delete($image_path);
            unlink($image_path);
        }
        
        $baihathot_casi->delete();
        $baihathot_casi->casi()->detach($id);
        return redirect('admin/baihathot')->with('thông báo','Xóa bài hát thành công');
    }
    public function geteditbaihathot($id){
        $baihathot = BaiHatHot::find($id);
        return view('admin.editbaihathot',['baihathot'=>$baihathot]);
    }
    public function posteditbaihathot(Request $request, $id){
        // $this->validate($request,[
        //     'tenbaihat'=>'required|min:3',
        //     'mp3'=>'required',
        //     'image'=>'required',
        //     'theloai'=>'required',
        //     'loibaihat'=>'required|min:50',
        // ],[
        //     'tenbaihat.required'=>'Bạn chưa nhập tên người dùng',
        //     'tencasi.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
        //     'mp3.required'=>'Bạn chưa nhập tên người dùng',
        //     'image.required'=>'Bạn chưa nhập tên người dùng',
        //     'theloai.required'=>'Bạn chưa nhập tên người dùng',
        //     'loibaihat.required'=>'Bạn chưa nhập lời bài hát',
        //     'loibaihat.min'=>'Lời bài hát phải nhiều hơn 50 kí tự'
        // ]);
        
        
        if($request->hasFile('image')==true){
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();//lấy tên file ảnh
            $image = rand(0,9999)."_".$name_image;
            while (file_exists("images/images_baihathot".$image)) {
                $image = rand(0,9999)."_".$name_image;
            }
            $file->move(public_path("images/images_baihathot"),$image);
            $request->image = $image;
        }
        else{
            $request->image = $request->img_hidden;
        }
        if($request->hasFile('mp3')==true){
            $file = $request->file('mp3');
            $name_mp3= $file->getClientOriginalName();//lấy tên file ảnh
            $mp3 = rand(0,9999)."_".$name_mp3;
            while (file_exists("mp3/mp3_hot".$mp3)) {
                $mp3 = rand(0,9999)."_".$name_mp3;
            }
            $file->move(public_path("mp3/mp3_hot"),$mp3);
            $request->file = $mp3;
        }
        else{
            $request->file = $request->mp3_hidden;
        }
        
        //$data = CaSi::find(2);
    
        // echo $data->casi->get()->idbaihathot;
        // foreach($data->baihathot as $value){
        //     $aa = $value->pivot->idbaihathot.'<br>';
        //     $bb = CaSi::find($aa)->tencasi;
        //     echo $aa;
        // }
       
        BaiHatHot::where('id',$id)->update([
            'tenbaihathot'=> $request->tenbaihat,
            'file'=> $request->file,
            'loibaihat'=>  $request->loibaihat,
            'image'=> $request->image,
            'idtheloai'=> $request->theloai
        ]);

        
        $baihathot_casi = BaiHatHot::find($id);
        $baihathot_casi->casi()->detach(); 
        foreach($request->casi as $value){
            $baihathot_casi->casi()->attach($value); 
        }
        
        return redirect('admin/baihathot')->with('thongbao','Sữa thành công');

    }
}
