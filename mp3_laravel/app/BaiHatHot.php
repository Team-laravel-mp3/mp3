<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiHatHot extends Model
{
    protected $table = "baihathot";
    
    public function theloai(){
        return $this->belongsTo('App\TheLoai','idtheloai','id');
    }
    //id cua ban trung gian phai trun`g ten với id bản ch
    // cú pháp là (APP\...,tên bảng trung gian,tên cột thay thế của chính model này trong bảng trung gian,
   // tên cột thay thế của bảng cần ghép trong bảng trung gian, tên cột khóa chính của chính bảng này, tên khóa chính của bảng caafn ghép)
    public function casi(){
        return $this->belongsToMany('App\CaSi','baihathot_casi','idbaihathot','idcasi','id','id');
    }
}
