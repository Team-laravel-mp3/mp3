@extends('pages.master.layout')
@section('content')
<style>
    nav .menu-tab-user ul li .nav-link:hover,nav .menu-tab-user ul .active{
        border-left: 2px solid red;
    }
</style>
    <div class="container">
        <hr style="text-align: center;width:70%;">
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse menu-tab-user" id="navbarSupportedContent">
                        <ul class="navbar-nav navbar-text">
                            <li class="nav-item " style="padding:5% 0 10% 0">
                                <a class="nav-link @yield('activeuser1')" href="{{ route('userbaihat') }}">Bài hát</a>
                            </li>
                            <li class="nav-item "  style="padding:5% 0 10% 0">
                                <a class="nav-link @yield('activeuser2')" href="{{ route('usercasi') }}">Ca sĩ</a>
                            </li>
                            <li class="nav-item"  style="padding:5% 0 10% 0">
                                <a class="nav-link @yield('activeuser3')" href="{{ route('playlistuser') }}">Playlist</a>
                            </li>
                            <li class="nav-item"  style="padding:5% 0 10% 0">
                                <a class="nav-link @yield('activeuser4')" href="{{ route('danhsachupload') }}">Danh sách Upload</a>
                            </li>
                            <li class="nav-item"  style="padding:5% 0 10% 0">
                                <a class="nav-link @yield('activeuser5')" href="{{ route('userupload') }}">Tải nhạc lên</a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-9">
               
                @yield('contentuser')
            </div>    
        </div>
    </div>
@endsection