<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaSi extends Model
{
    //
    protected $table = "casi";

    // public function baihatmoi(){
    //     return $this->belongsToMany('App\BaiHatMoi','baihat_casi','idcasi','idbaihat');
    // }
    public function baihathot(){
        return $this->belongsToMany('App\BaiHatHot','baihathot_casi','idcasi','idbaihathot');
    }
}
