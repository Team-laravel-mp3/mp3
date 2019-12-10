@extends('pages.user')
@section('activeuser5','active')
@section('contentuser')
<div class="row">
    <h4 style="font-weight: bold;">Tải lên</h4>
</div>
<hr style="margin-left: -20px;">
<br>
<form action="{{ route('postuserupload') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="form-group" style="width: 100%;">
            <div class="input-group">
                <input type="text" class="form-control" readonly>
                <div class="input-group-btn">
                    <span class="fileUpload btn btn-success">
                        <span class="upl" id="upload">Upload single file</span>
                        <input type="file" name="mp3" class="upload up" id="up" accept=".mp3,audio/*"/>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7" style="margin-top: 2%;">
            <div class="form-group">
                <label for="">Tên bài hát</label>
                <input type="text" class="form-control" name="tenbaihat">
            </div>
            <div class="form-group">
                <label for="">Nghệ sĩ trình bày</label>
                <input type="text" class="form-control" name="tencasi">
            </div>
            <div class="form-group">
                <label >Thê loại</label>
                <select name="theloai" class="form-control">
                    @foreach (App\TheLoai::all() as $tl)
                        <option value="{{ $tl->id }}">{{ $tl->tentheloai }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <div class="file-upload">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                
                <div class="image-upload-wrap">
                    <input class="file-upload-input" type='file' name="image" onchange="readURL(this);" accept="image/*" />
                    <div class="drag-text">
                    <h3>Drag and drop a file or select add Image</h3>
                    </div>
                </div>
                <div class="file-upload-content">
                    <img class="file-upload-image" src="#" alt="your image" />
                    <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="row">
        <div class="form-group" style="width: 100%">
            <label>Lời bài hát</label>
            <textarea class="form-control" name="loibaihat" id="editor1" rows="3"></textarea>
        </div>
    </div>
    <input style="width: 200px;" type="submit" class="btn btn-primary" value="Tải lên">
</form>  
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
</script>
<script>
   function readURL(input) {
   if (input.files && input.files[0]) {

     var reader = new FileReader();

     reader.onload = function(e) {
       $('.image-upload-wrap').hide();

       $('.file-upload-image').attr('src', e.target.result);
       $('.file-upload-content').show();

       $('.image-title').html(input.files[0].name);
     };

     reader.readAsDataURL(input.files[0]);

   } else {
     removeUpload();
   }
 }

 function removeUpload() {
   $('.file-upload-input').replaceWith($('.file-upload-input').clone());
   $('.file-upload-content').hide();
   $('.image-upload-wrap').show();
 }
 $('.image-upload-wrap').bind('dragover', function () {
     $('.image-upload-wrap').addClass('image-dropping');
   });
   $('.image-upload-wrap').bind('dragleave', function () {
     $('.image-upload-wrap').removeClass('image-dropping');
 });

 </script>
@endsection