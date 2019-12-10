@extends('admin.master.layout')
@section('casi','active')
@section('titlemenu','Ca Sĩ')
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
            <th width="10%" scope="col">id</th>
            <th width="30%" scope="col">Name</th>
            <th width="30%" scope="col">Avata</th>
            <th width="20%" scope="col">Introduce</th>
            <th width="10%" style="text-align: center;" colspan="2" scope="col">Action</th>
          </tr>
        </thead>
        @foreach ($casi as $cs)
        <tbody>
          <tr>
            <th scope="row">{{ $cs->id }}</th>
            <td>{{ $cs->tencasi }}</td>
            <td><img src="../images/images_casi/{{ $cs->anhdaidien }}" width="50" height="50" alt=""></td>
            <td>{{ $cs->introduce }}</td>
            <td><a class="btn btn-warning" href="{{ route('deletecasi',$cs->id) }}"><i class="fas fa-trash-alt"></i></a></td>
            <td><a class="btn btn-dark" href="{{ route('editcasi',$cs->id) }}"><i class="fas fa-edit"></i></a></td>
          </tr>
        </tbody>
        @endforeach
      </table>
</div>
@endsection
@section('action')
    <a href="{{ route('addcasi') }}" style="float:right;"><span>Thêm ca sĩ</span></a>
@endsection