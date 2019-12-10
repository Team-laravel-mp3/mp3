@extends('admin.master.layout')
@section('baihathot','active')
@section('titlemenu','Bài hát hot')
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
        <form action="{{ route('posteditbaihathot',$baihathot->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Tên bài hát</label>
                <input type="text" class="form-control" name="tenbaihat" value="{{ $baihathot->tenbaihathot }}">
            </div>
            <div class="form-group">
                <label for="">File nhạc</label>
                <input type="file" name="mp3" class="form-control-file">
                <input type="hidden" name="mp3_hidden" value="{{ $baihathot->file }}">
                <audio src="{{ asset('mp3/mp3_hot/'.$baihathot->file) }}"  controls="controls" ></audio>
            </div>
            <div class="form-group">
                <label for="">Ảnh bài hát</label>
                <input type="file" name="image" class="form-control-file" >
                <input type="hidden" name="img_hidden" value="{{ $baihathot->image }}">
                <img src="{{ asset('/images/images_baihathot/'.$baihathot->image) }}" width="200"  alt="">
            </div>
            <div class="form-group">
                <label for="name">Tên ca sĩ</label>
                <div>
                    <select name="casi[]" class="select-move" multiple>
                        {{--  đỗ hết tên ca sĩ ra nếu ca sĩ nào hát bài hát có id này thì
                             in ra còn ko thì in ở dưới  --}}
                        @foreach (App\CaSi::all() as $cs)
                        <?php
                            $aa = App\Casi::find($cs->id);
                            foreach ($aa->baihathot as $bb) {
                                $cc = $bb->pivot->idbaihathot;// id=1
                                ?>
                                @if( $cc == $baihathot->id)
                                       <option value="{{ $cs->id }}" {{ in_array($cs->id, old("casi") ?: []) ? "selected": "selected"}}>{{ $cs->tencasi }}</option>
                                       {{-- <option value="{{ $cs->id }}" selected="selected">{{ $cs->tencasi }}</option> --}}

                                @else 
                                    <option value="{{ $cs->id }}" >{{ $cs->tencasi }}</option>
                                @endif
                                <?php
                            }
                        ?>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label >Thể loại</label>
                <select name="theloai" class="form-control" value="{{ $baihathot->idthelaoi }}">
                    @foreach (App\TheLoai::all() as $tl)
                        @if($tl->id==$baihathot->idtheloai)
                            <option selected="selected" value="{{ $tl->id }}">{{ $tl->tentheloai }}</option> 
                        @else    
                            <option value="{{ $tl->id }}">{{ $tl->tentheloai }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Lời bài hát</label>
                <textarea class="form-control" name="loibaihat" id="editor1" rows="3">{{ $baihathot->loibaihat }}</textarea>
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