<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BaiHatMoi;

class BaihatmoiController extends Controller
{
    //
    public function baihatmoi(){
        $baihatmoi = BaiHatMoi::all();
        return view('admin.baihatmoi',['baihatmoi'=>$baihatmoi]);
    }
    public function getkiemduyet($id){
        $kiemduyet = BaiHatMoi::find($id);
        return view('admin.kiemduyet',['kiemduyet'=>$kiemduyet]);
    }
    public function postduyet(Request $request, $id){
        BaiHatMoi::where('id',$id)->update([
            'status'=> "3"
        ]);
        return redirect('admin/baihatmoi')->with('thongbao','duyệt thành công');
    }
    public function postkhongduyet(Request $request, $id){
        echo $id;
        BaiHatMoi::where('id',$id)->update([
            'status'=> "2"
        ]);
        return redirect('admin/baihatmoi')->with('thongbao','thành công');
    }
}
