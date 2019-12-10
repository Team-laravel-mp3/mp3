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
        <form action="add" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Tên thể loại</label>
                <input type="text" class="form-control" name="tentheloai">
            </div>
            <div class="form-group">
                <label for="">Ảnh thể loại</label>
                <input type="file" name="image" class="form-control-file" >
            </div>
            <input type="submit" class="btn btn-primary" value="Add">
        </form>
    </div>
</div>
@endsection