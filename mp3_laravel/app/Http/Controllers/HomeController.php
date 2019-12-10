<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BaiHatMoi;
use App\CaSi;
use App\BaiHatHot;

class HomeController extends Controller
{
    public function test(){
        $casi = BaiHatHot::find(1)->theloai;
        echo $casi->tentheloai;
        // foreach($casi as $c) echo $c->tencasi;
        // return 1;
        //chạy đi ta đang lấy ra thử chưa chạy cái j hết
        // $product = BaiHatHot::find(1);
        //model ma` chia kieu do la` chet me r :v laanf dau xai` nen lam dai, yeu sql vcl
        // foreach ($product->casi()->where('id', 1) as $order) {
        //     // In số tiền các đơn hàng đã được thanh toán liên quan đến sản phẩm 1.
        //     echo $order->tencasi;
        // }
    }
    public function home(){
        $baihatmoi = BaiHatMoi::all();
        return view('pages.home', compact('baihatmoi'));
    }
    public function playmusic(){
        return view('pages.playmusic');
    }
}
