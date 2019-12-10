@extends('admin.master.layout')
@section('theloai','active')
@section('titlemenu','Thể loại')
@section('content')
<div>
    <div class="articles">
        @if(count($errors)>0)
        <div class="alert alert-primary">
            @foreach ($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
        @endif
        @if(session('thongbao'))
            <div class="alert alert-primary">
                {{ session('thongbao') }}
            </div>
        @endif
        <form action="{{ route('postedittheloai',$theloai->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Tên thể loại</label>
                <input type="text" class="form-control" name="tentheloai" value="{{ $theloai->tentheloai }}">
            </div>
            <div class="form-group">
                <label for="">Ảnh ca sĩ</label>
                <input type="file" name="image" class="form-control-file" >
                <input type="hidden" name="img_hidden" value="{{ $theloai->image }}">
                <img  class="thumbnail" src="{{ asset('images/images_theloai/'.$theloai->image) }}" width="400">
            </div>
            <input type="submit" class="btn btn-primary" value="Add">
        </form>
    </div>
</div>
@endsection