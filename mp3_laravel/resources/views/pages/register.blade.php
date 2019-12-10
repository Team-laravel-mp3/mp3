@extends('pages.master.layout')
@section('title','Register')   
@section('content')
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
    <div class="row register">
        <div class="col-md-3"></div>
        <div class="col-md-6 form-register">
            <form action="register" method="post">
                <h3>Register</h3>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name="password" class="form-control"  placeholder="Password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputREPassword4">Re-Enter Password</label>
                        <input type="password" name="repassword" class="form-control"  placeholder="Re-Enter Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
@endsection