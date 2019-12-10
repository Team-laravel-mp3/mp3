@extends('pages.master.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div style="width: 100%;height: 250px;background: #cccccc;">
                    <img src="food.jpg" width="170" height="150px" style="border-radius: 50%;margin:5% 0 0 25% ;" alt=""><br>
                    <span style="margin:10% 0 0 37% ;">Tên bài hát</span>
                    <span style="margin:10% 0 0 37% ;">Tên Ca si</span>
                </div>
                <audio src="{{ asset('mp3/Avicii-WaitingForLove.mp3') }}" style="margin:-10% 0 0 10%; width: 80%;" autoplay="autoplay" controls="controls"></audio>
                <div>
                    
                </div>
            </div>
            <div class="col-md-5">
                <h5>Bài hát tiếp theo</h5>
                <a href="">
                    <img src="food.jpg" width="50" height="50" alt=""> <span>aaaaaaaaaa</span>
                </a>
            </div>
            <div class="col-md 3">
                <div class="row" style="height:400px;background: blue;">
                    Thế loại
                </div>
                <div class="row" style="height:400px;background: red;">
                    Hót
                </div>
            </div>
        </div>
        
    </div>
@endsection