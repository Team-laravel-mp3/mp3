@extends('admin.master.layout')
@section('baihathot','active')
@section('titlemenu','Bài hát hot')
@section('content')
<style>
.loibaihat{
  white-space:nowrap;
  overflow:hidden;
  max-width:100px;
  text-overflow:ellipsis;
  color: red;
}
</style>
<div class="table-user">
	@if(session('thongbao'))
		<div class="alert alert-primary">
			{{ session('thongbao') }}
		</div>
    @endif
    <table class="table table-striped">
        <thead>
          <tr style="text-align: center;">
            <th scope="col">id</th>
            <th scope="col">Tên bài hát</th>
            <th scope="col">file</th>
            <th scope="col">Lời bài hát</th>
            <th scope="col">image</th>
            <th scope="col">Ca sĩ</th>
            <th scope="col">Thể loại</th>
            <th style="text-align: center;" colspan="2" scope="col">Action</th>
          </tr>
        </thead>
        @foreach ($baihathot as $bhh)
        <tbody>
          <tr>
            <th scope="row">{{ $bhh->id }}</th>
            <td class="loibaihat">{{ $bhh->tenbaihathot }}</td>
            <td class="" >
                <audio src="../mp3/mp3_hot/{{ $bhh->file }}"  controls="controls"></audio>
            </td>
            <td class="loibaihat"><span   width="50" height="50">{!! $bhh->loibaihat !!}</span></td>
            <td><img src="../images/images_baihathot/{{ $bhh->image }}" width="50" height="50" alt=""></td>
            <td>
                @foreach($casi = App\BaiHatHot::find($bhh->id)->casi()->get() as $c) {{ $c->tencasi }} <br>
                @endforeach
            </td>
            <td> @foreach($theloai = App\BaiHatHot::find($bhh->id)->theloai()->get() as $tl)
               {{  $tl->tentheloai }}
               @endforeach
            </td>
           
            <td><a href="{{ route('deletebaihathot',$bhh->id) }}"><i class="fas fa-trash-alt"></i> Delete</a></td>
            <td><a href="{{ route('editbaihathot',$bhh->id) }}"><i class="fas fa-edit"></i> Edit</a></td>
          </tr>
        </tbody>
        @endforeach
      </table>
      <div style="float:right;">{!! $baihathot->links() !!}</div> 
</div>
@endsection
@section('action')
    <a href="{{ route('addbaihathot') }}" style="float:right;"><span>Thêm bài hát</span></a>
@endsection