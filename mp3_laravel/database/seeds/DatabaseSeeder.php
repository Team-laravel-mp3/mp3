<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(baihat_casi::class);
        $this->call(baihatduyet::class);
        $this->call(users::class);
        $this->call(theloai::class);
        $this->call(casi::class);
        $this->call(baihatmoi::class);
        $this->call(baihathot::class);
        $this->call(baihathot_casi::class);
    }
}
class baihat_casi extends Seeder
{
    public function run()
    {
        DB::table('baihat_casi')->insert([
            ['idbaihat'=>'1','idcasi'=>'1'],
            ['idbaihat'=>'1','idcasi'=>'2'],
            ['idbaihat'=>'2','idcasi'=>'1'],
            ['idbaihat'=>'2','idcasi'=>'2']
        ]);
    }
}
class baihatduyet extends Seeder
{
    public function run()
    {
        DB::table('baihatduyet')->insert([
            ['idbaihatmoi'=>'1','trangthai'=>'đã duyệt'],
            ['idbaihatmoi'=>'2','trangthai'=>'đã duyệt']
        ]);
    }
}
class baihathot_casi extends Seeder
{
    public function run()
    {
        DB::table('baihathot_casi')->insert([
            ['idbaihathot'=>'1','idcasi'=>'1'],
            ['idbaihathot'=>'1','idcasi'=>'2'],
            ['idbaihathot'=>'2','idcasi'=>'1'],
            ['idbaihathot'=>'2','idcasi'=>'2']
        ]);
    }
}
class baihathot extends Seeder
{
    public function run()
    {
        DB::table('baihathot')->insert([
            ['tenbaihathot'=>'HOT ABC','loibaihat'=>'cái quần què','file'=>'không có','image'=>'cũng đéo có','idtheloai'=>'1'],
            ['tenbaihathot'=>'hot abc','loibaihat'=>'cái áo què','file'=>'không có','image'=>'cũng đéo có','idtheloai'=>'1']
        ]);
    }
}
class baihatmoi extends Seeder
{
    public function run()
    {
        DB::table('baihatmoi')->insert([
            ['tenbaihat'=>'ABC','loibaihat'=>'sdlkjaskldjklasjdljaslkjda','file'=>'không có','image'=>'cũng đéo có','iduser'=>'1','idtheloai'=>'1','status'=>'1'],
            ['tenbaihat'=>'abc','loibaihat'=>'jkasdlaskldjaslkjdlkasjldk','file'=>'không có','image'=>'cũng đéo có','iduser'=>'1','idtheloai'=>'1','status'=>'1']
        ]);
    }
}
class casi extends Seeder
{
    public function run()
    {
        DB::table('casi')->insert([
            ['tencasi'=>'Quang Lê','anhdaidien'=>'đéo có nhé','introduce'=>'aaaaaaaaaa'],
            ['tencasi'=>'Sơn Tùng MTP','anhdaidien'=>'đéo có nhé','introduce'=>'bbbbbbbbbbb'],
            ['tencasi'=>'Jack','anhdaidien'=>'đéo có nhé','introduce'=>'aaaaaaaaaa'],
            ['tencasi'=>'Bích Phương','anhdaidien'=>'đéo có nhé','introduce'=>'bbbbbbbbbbb']
        ]);
    }
}
class theloai extends Seeder
{
    public function run()
    {
        DB::table('theloai')->insert(
            ['tentheloai'=>'bolero','image'=>''],
            ['tentheloai'=>'rock','image'=>'']
        );
    }
}
class users extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Thang',
            'avatar'=>'',
            'email'=>'thang@12345',
            'password'=>bcrypt('123456')
        ]);
    }
}

