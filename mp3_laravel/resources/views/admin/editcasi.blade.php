@extends('admin.master.layout')
@section('casi','active')
@section('titlemenu','Ca Sĩ')
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
        <form action="{{ route('posteditcasi',$casi->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Tên ca sĩ</label>
                <input type="text" class="form-control" name="tencasi" value="{{ $casi->tencasi }}">
            </div>
            <div class="form-group">
                <label for="">Ảnh ca sĩ</label>
                <input type="file" name="image" class="form-control-file" >
                <input type="hidden" name="img_hidden" value="{{ $casi->anhdaidien }}">
                <img  class="thumbnail" src="{{ asset('images/images_casi/'.$casi->anhdaidien) }}" width="400">
            </div>
            <div class="form-group">
                <label>Giới thiệu</label>
                <textarea class="form-control" name="introduce" id="editor1" rows="3">{{ $casi->introduce }}</textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Add">
        </form>
    </div>
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'editor1' );
    </script>
</div>
@endsection