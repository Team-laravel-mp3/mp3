@extends('admin.master.layout')
@section('baihathot','active')
@section('titlemenu','Bài hát hót')
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
        <form action="{{ route('postbaihathot') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Tên bài hát</label>
                <input type="text" class="form-control" name="tenbaihat">
            </div>
            <div class="form-group">
                <label for="">File nhạc</label>
                <input type="file" name="mp3" class="form-control-file" >
            </div>
            <div class="form-group">
                <label for="">Ảnh bài hát</label>
                <input type="file" name="image" class="form-control-file" >
            </div>
            <div class="form-group">
                <label for="">Tên ca sĩ</label>
                <div>
                    <select name="casi[]" class="select-move" multiple>
                        @foreach (App\CaSi::all() as $cs)
                            <option value="{{ $cs->id }}">{{ $cs->tencasi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label >Thê loại</label>
                <select name="theloai" class="form-control">
                    @foreach (App\TheLoai::all() as $tl)
                        <option value="{{ $tl->id }}">{{ $tl->tentheloai }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Lời bài hát</label>
                <textarea class="form-control" name="loibaihat" id="editor1" rows="3"></textarea>
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