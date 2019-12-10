<div class="header">
    <div class="logo">
        <i class="fas fa-tachometer-alt"></i>
        <span>Brand</span>
    </div>
    <a href="#" class="nav-trigger"><span></span></a>
</div>
<div class="side-nav">
    <div class="logo">
        <i class="fas fa-tachometer-alt"></i>
        <span>Brand</span>
    </div>
    <nav>
        <ul>
            <li class="@yield('user')">
                <a href="{{ route('userlist') }}">
                    <span><i class="fas fa-user"></i></span>
                    <span>Người dùng</span>
                </a>
            </li>
            <li class="@yield('baihatmoi')">
                <a href="{{ route('baihatmoi') }}">
                    <span><i class="fas fa-file-alt"></i></span>
                    <span>Bài hát mới</span>
                </a>
            </li>
            <li class="@yield('baihatduyet')">
                <a href="#">
                    <span><i class="fas fa-music"></i></span>
                    <span>Bài hát duyệt</span>
                </a>
            </li>
            <li class="@yield('baihathot')">
                <a href="{{ route('baihathotlist') }}">
                    <span><i class="fas fa-fire"></i></span>
                    <span>Bài hát hot</span>
                </a>
            </li>
            <li class="@yield('casi')">
                <a href="{{ route('casilist') }}">
                    <span><i class="fas fa-male"></i></span>
                    <span>Ca sĩ</span>
                </a>
            </li>
            <li class="@yield('theloai')">
                <a href="{{ route('theloailist') }}">
                    <span><i class="fas fa-bars"></i></i></span>
                    <span>Thể loại</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<div class="main-content">
    <div class="title">
        @yield('titlemenu')
        @yield('action')
    </div>
    <div style="margin-left: 1%;">
        @yield('content')   
    </div>
</div>