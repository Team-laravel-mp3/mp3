@extends('pages.master.layout')
@section('title','Login')   
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
    <div class="container">
        <div class="row login">
            <div class="col-md-4"></div>
            <div class="col-md-4 form-login">
                    <h3>Login</h3>
                    <form action="login" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control"  placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control"  placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
        
    
@endsection
