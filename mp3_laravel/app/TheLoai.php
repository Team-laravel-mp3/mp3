<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = "theloai";

    public function baihatmoi(){
        return $this->hasMany('App\BaiHatMoi','idtheloai','id');
    }
    public function baihathot(){
        return $this->hasMany('App\BaiHatHot','idtheloai','id');
    }
}
