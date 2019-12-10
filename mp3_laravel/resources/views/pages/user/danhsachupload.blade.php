@extends('pages.user')
@section('activeuser4','active')
@section('contentuser')
<div class="row">
    <h4 style="font-weight: bold;">Danh sách Upload</h4>
    @if(session('thongbao'))
        <div style="float: right;" class="alert alert-primary">
            {{ session('thongbao') }}
        </div>
    @endif 
</div>
<hr style="margin-left: -20px;">  
 

    
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="abcd-tab" data-toggle="tab" href="#abcd" role="tab" aria-controls="abcd" aria-selected="true">Tất cả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Chưa duyệt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Không duyệt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Đã duyệt</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="abcd" role="tabpanel" aria-labelledby="abcd-tab">
                        <table class="table" style="border-top: none !important;">
                            @if (Auth::check())
                                @foreach ($baihatmoi as $value)
                                    @if (Auth::user()->id == $value->iduser)
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;text-align: right" scope="col">
                                                    <img width="60" height="60" src="{{ asset('/images/images_baihatmoi/'.$value->image) }}"  alt="...">
                                                </th>
                                                <th style="width: 60%;text-align: center"  scope="col">
                                                    <h6 class="card-title" style="margin-left:5%;">{{ $value->tenbaihat }}</h6>
                                                    <audio style="max-width: 100%;" src="{{ asset('/mp3/mp3_moi/'.$value->file) }}" controls="controls"></audio>
                                                </th>
                                                <th style="width: 20%;text-align: center" scope="col">
                                                    <a href="{{ route('deletebaihatmoi',$value->id) }}" style="margin-bottom: 2%;"  class="btn btn-warning"><i class="fas fa-trash-alt"></i> Delete</a><br>
                                                    <a href="{{ route('getedit',$value->id) }}" style="width: 90px"  class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                </th>
                                                <th style="width: 10%;text-align: center;" scope="col">
                                                    @if ($value->status == '1')
                                                        <span style="margin-top: -70px" class="btn btn-primary">Chưa duyệt</span>
                                                    @elseif($value->status == '2')
                                                        <span style="margin-top: -70px" class="btn btn-danger">Không duyệt</span>
                                                    @elseif($value->status == '3')
                                                        <span style="margin-top: -70px" class="btn btn-success">Đã duyệt</span>
                                                    @endif
                                                </th>
                                            </tr>
                                        </thead>
                                    @endif
                                @endforeach
                            @endif
                        </table>    
                    </div>
                    <div class="tab-pane fade show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table" style="border-top: none !important;">
                            @if (Auth::check())
                                @foreach ($baihatmoi as $value)
                                    @if (Auth::user()->id == $value->iduser)
                                        @if ($value->status == '1')
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%;text-align: right" scope="col">
                                                        <img width="60" height="60" src="{{ asset('/images/images_baihatmoi/'.$value->image) }}"  alt="...">
                                                    </th>
                                                    <th style="width: 60%;text-align: center"  scope="col">
                                                        <h6 class="card-title" style="margin-left:5%;">{{ $value->tenbaihat }}</h6>
                                                        <audio style="max-width: 100%;" src="{{ asset('/mp3/mp3_moi/'.$value->file) }}" controls="controls"></audio>
                                                    </th>
                                                    <th style="width: 20%;text-align: center" scope="col">
                                                        <a href="{{ route('deletebaihatmoi',$value->id) }}" style="margin-bottom: 2%;"  class="btn btn-warning"><i class="fas fa-trash-alt"></i> Delete</a><br>
                                                        <a href="{{ route('getedit',$value->id) }}" style="width: 90px"  class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    </th>
                                                    <th style="width: 10%;text-align: center;" scope="col">
                                                        <span style="margin-top: -70px" class="btn btn-primary">Chưa duyệt</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                        @endif    
                                    @endif
                                @endforeach
                            @endif
                        </table>    
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table" style="border-top: none !important;">    
                            @if (Auth::check())
                                @foreach ($baihatmoi as $value)
                                    @if (Auth::user()->id == $value->iduser)
                                        @if($value->status == '2')
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%;text-align: right" scope="col">
                                                        <img width="60" height="60" src="{{ asset('/images/images_baihatmoi/'.$value->image) }}"  alt="...">
                                                    </th>
                                                    <th style="width: 60%;text-align: center"  scope="col">
                                                        <h6 class="card-title" style="margin-left:5%;">{{ $value->tenbaihat }}</h6>
                                                        <audio style="max-width: 100%;" src="{{ asset('/mp3/mp3_moi/'.$value->file) }}" controls="controls"></audio>
                                                    </th>
                                                    <th style="width: 20%;text-align: center" scope="col">
                                                        <a href="{{ route('deletebaihatmoi',$value->id) }}" style="margin-bottom: 2%;"  class="btn btn-warning"><i class="fas fa-trash-alt"></i> Delete</a><br>
                                                        <a href="{{ route('getedit',$value->id) }}" style="width: 90px"  class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    </th>
                                                    <th style="width: 10%;text-align: center;" scope="col">
                                                        <span style="margin-top: -70px" class="btn btn-danger">Không duyệt</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </table>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <table class="table" style="border-top: none !important;">
                            @if (Auth::check())
                                @foreach ($baihatmoi as $value)
                                    @if (Auth::user()->id == $value->iduser)
                                        @if($value->status == '3')
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%;text-align: right" scope="col">
                                                        <img width="60" height="60" src="{{ asset('/images/images_baihatmoi/'.$value->image) }}"  alt="...">
                                                    </th>
                                                    <th style="width: 60%;text-align: center"  scope="col">
                                                        <h6 class="card-title" style="margin-left:5%;">{{ $value->tenbaihat }}</h6>
                                                        <audio style="max-width: 100%;" src="{{ asset('/mp3/mp3_moi/'.$value->file) }}" controls="controls"></audio>
                                                    </th>
                                                    <th style="width: 20%;text-align: center" scope="col">
                                                        <a href="{{ route('deletebaihatmoi',$value->id) }}" style="margin-bottom: 2%;"  class="btn btn-warning"><i class="fas fa-trash-alt"></i> Delete</a><br>
                                                        <a href="{{ route('getedit',$value->id) }}" style="width: 90px"  class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    </th>
                                                    <th style="width: 10%;text-align: center;" scope="col">
                                                        <span style="margin-top: -70px" class="btn btn-success">Đã duyệt</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
@endsection