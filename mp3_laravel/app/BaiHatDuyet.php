<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiHatDuyet extends Model
{
    protected $table="baihatduyet";

    public function baihatmoi(){
        return $this->belongsTo('App\BaiHatMoi','idbaihatmoi','id');
    }
}
