@extends('admin.master.layout')
@section('baihatmoi','active')
@section('titlemenu','Bài hát mới')
@section('content')
    <div class="container">
        <form action="{{ route('postduyet',$kiemduyet->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-3">
                    <p><b>Người đăng tải:</b> <span style="float: right">{{ $kiemduyet->user->name }}</span></p>
                    <p><b>Tên bài hát:</b><span style="float: right"> {{ $kiemduyet->tenbaihat }}</span></p>
                    <p><b>Nghệ sĩ trình bày:</b> <span style="float: right">{{ $kiemduyet->nghesi }}</span></p>
                    <p><b>Thể loại:</b> <span style="float: right">{{ $kiemduyet->theloai->tentheloai }}</span></p>
                    <p><b>Hình ảnh:</b> </p>
                    <img style="max-width: 100%" src="{{ asset('images/images_baihatmoi/'.$kiemduyet->image) }}" alt="">
                    <br><br>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <p><b>Nghe nhạc:</b> </p>
                    <audio src="{{ asset('mp3/mp3_moi/'.$kiemduyet->file) }}" controls></audio>
                    <div>
                        <p><b>Lời bài hát:</b> </p>
                        <p>
                            {!! $kiemduyet->loibaihat !!}
                        </p>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Duyệt">
        </form>
        <form action="{{ route('postkhongduyet',$kiemduyet->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-primary" value="Không duyệt">
        </form>
    </div>
@endsection