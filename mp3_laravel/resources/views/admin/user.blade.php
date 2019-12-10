@extends('admin.master.layout')
@section('user','active')
@section('titlemenu','Userlist')
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
            <th scope="col">Name</th>
            <th scope="col">Avata</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        @foreach ($user as $us)
        <tbody>
          <tr>
            <th scope="row">{{ $us->id }}</th>
            <td>{{ $us->name }}</td>
            <td><img src="../images/{{ $us->avatar }}" width="50" height="50" alt=""></td>
            <td>{{ $us->email }}</td>
            <td><a href="{{ route('deleteuser',$us->id) }}"><em class="fa fa-trash"></em> Delete</a></td>
          </tr>
        </tbody>
        @endforeach
      </table>
</div>
@endsection