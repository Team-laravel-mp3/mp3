@extends('admin.master.layout')
@section('theloai','active')
@section('titlemenu','Thể loại nhạc')
@section('content')
<div class="table-user">
	@if(session('thongbao'))
		<div class="alert alert-primary">
			{{ session('thongbao') }}
		</div>
    @endif
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Tên thể loại</th>
            <th scope="col">Avata</th>
            <th style="text-align: center;" colspan="2" scope="col">Action</th>
          </tr>
        </thead>
        @foreach ($theloai as $tl)
        <tbody>
          <tr>
            <th scope="row">{{ $tl->id }}</th>
            <td>{{ $tl->tentheloai }}</td>
            <td><img src="../images/images_theloai/{{ $tl->image }}" width="50" height="50" alt=""></td>
            <td><a href="{{ route('deletetheloai',$tl->id) }}"><i class="fas fa-trash-alt"></i> Delete</a></td>
            <td><a href="{{ route('edittheloai',$tl->id) }}"><i class="fas fa-edit"></i> Edit</a></td>
          </tr>
        </tbody>
        @endforeach
      </table>
</div>
@endsection
@section('action')
    <a href="{{ route('addtheloai') }}" style="float:right;"><span>Thêm thể loại</span></a>
@endsection