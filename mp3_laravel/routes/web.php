<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','HomeController@test');

Route::get('/login','AccController@getDangNhap')->name('getDangNhap');
Route::post('/login','AccController@postDangNhap')->name('postDangNhap');

Route::get('/register','AccController@getregister');
Route::post('/register','AccController@postregister');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/home','HomeController@home')->name('home');
Route::get('/playmusic','HomeController@playmusic');

Route::group(['prefix'=>'user'],function(){
    Route::get('/','UserController@user')->name('trangcanhan');
    Route::get('/baihat','UserController@userbaihat')->name('userbaihat');
    Route::get('/casi','UserController@usercasi')->name('usercasi');

    Route::get('/danhsachupload','UserController@danhsachupload')->name('danhsachupload');

    Route::get('/edit/{id}','UserController@getedit')->name('getedit');
    Route::post('/edit/{id}','UserController@postedit')->name('postedit');

    Route::get('/playlist','UserController@playlist')->name('playlistuser');

    Route::get('delete/{id}','UserController@getdeletebaihatmoi')->name('deletebaihatmoi');

    Route::get('/upload','UserController@userupload')->name('userupload');
    Route::post('/upload','UserController@postuserupload')->name('postuserupload');
});

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'user'],function(){
        Route::get('/','AdminController@user')->name('userlist');

        Route::get('delete/{id}','AdminController@getdeleteuser')->name('deleteuser');
    });
    Route::group(['prefix'=>'casi'],function(){
        Route::get('/','CasiController@casi')->name('casilist');

        Route::get('/add','CasiController@getaddcasi')->name('addcasi');
        Route::post('/add','CasiController@postaddcasi')->name('postaddcasi');

        Route::get('delete/{id}','CasiController@getdeletecasi')->name('deletecasi');

        Route::get('edit/{id}','CasiController@geteditcasi')->name('editcasi');
        Route::post('edit/{id}','CasiController@posteditcasi')->name('posteditcasi');
    });
    Route::group(['prefix'=>'theloai'],function(){
        Route::get('/','TheloaiController@theloai')->name('theloailist');

        Route::get('/add','TheloaiController@gettheloai')->name('addtheloai');
        Route::post('/add','TheloaiController@posttheloai')->name('postaddtheloai');

        Route::get('delete/{id}','TheloaiController@getdeletetheloai')->name('deletetheloai');

        Route::get('edit/{id}','TheloaiController@getedittheloai')->name('edittheloai');
        Route::post('edit/{id}','TheloaiController@postedittheloai')->name('postedittheloai');
    });
    Route::group(['prefix'=>'baihathot'],function(){
        Route::get('/','BaihathotController@baihathot')->name('baihathotlist');

        Route::get('/add','BaihathotController@getbaihathot')->name('addbaihathot');
        Route::post('/add','BaihathotController@postbaihathot')->name('postbaihathot');

        Route::get('delete/{id}','BaihathotController@getdeletebaihathot')->name('deletebaihathot');

        Route::get('edit/{id}','BaihathotController@geteditbaihathot')->name('editbaihathot');
        Route::post('edit/{id}','BaihathotController@posteditbaihathot')->name('posteditbaihathot');
    });
    Route::group(['prefix'=>'baihatmoi'],function(){
        Route::get('/','BaihatmoiController@baihatmoi')->name('baihatmoi');

        Route::get('kiemduyet/{id}','BaihatmoiController@getkiemduyet')->name('getkiemduyet');
        Route::post('kiemduyet/{id}','BaihatmoiController@postduyet')->name('postduyet');
        Route::post('kiemduyet1/{id}','BaihatmoiController@postkhongduyet')->name('postkhongduyet');
    });
});