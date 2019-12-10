<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiHatMoi extends Model
{
    protected $table = "baihatmoi";

    public function baihatduyet(){
        return $this->hasOne('App\BaiHatDuyet','idbaihatmoi','id');
    }
    public function theloai(){
        return $this->belongsTo('App\TheLoai','idtheloai','id');
    }
    public function user(){
        return $this->belongsTo('App\User','iduser','id');
    }
    // public function baihatcasi(){
    //     return $this->belongsToMany('App\CaSi','baihat_casi','idbaihat','idcasi');
    // }
}
