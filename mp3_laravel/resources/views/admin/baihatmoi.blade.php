@extends('admin.master.layout')
@section('baihatmoi','active')
@section('titlemenu','Bài hát mới')
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
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-tatca-tab" data-toggle="tab" href="#nav-tatca" role="tab" aria-controls="nav-tatca" aria-selected="true">Tổng quang</a>
        <a class="nav-item nav-link" id="nav-kiemduyet-tab" data-toggle="tab" href="#nav-kiemduyet" role="tab" aria-controls="nav-kiemduyet" aria-selected="false">Chưa duyệt</a>
        <a class="nav-item nav-link" id="nav-khongduyet-tab" data-toggle="tab" href="#nav-khongduyet" role="tab" aria-controls="nav-khongduyet" aria-selected="false">Không duyệt</a>
        <a class="nav-item nav-link" id="nav-daduyet-tab" data-toggle="tab" href="#nav-daduyet" role="tab" aria-controls="nav-daduyet" aria-selected="false">Đã duyệt</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-tatca" role="tabpanel" aria-labelledby="nav-tatca-tab">

    </div>
    <div class="tab-pane fade" id="nav-kiemduyet" role="tabpanel" aria-labelledby="nav-kiemduyet-tab">
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th width="10%" scope="col">User</th>
                      <th width="20%" scope="col">Tên bai hát</th>
                      <th width="20%" scope="col">Nghệ sĩ</th>
                      <th width="30%" scope="col">Image</th>
                      <th width="10%" scope="col">Thể loại</th>
                      <th width="10%" style="text-align: center;" colspan="2" scope="col">Action</th>
                  </tr>
              </thead>
              @foreach ($baihatmoi as $bhm)
                @if($bhm->status == '1') 
                  <tbody>
                      <tr>
                          <th scope="row">{{ $bhm->user->name }}</th>
                          <td>{{ $bhm->tenbaihat }}</td>
                          <td>{{ $bhm->nghesi }}</td>
                          <td><img src="../images/images_baihatmoi/{{ $bhm->image }}" width="50" height="50" alt=""></td>
                          <td>{{ $bhm->theloai->tentheloai }}</td>
                          <td><a class="btn btn-warning" href="{{ route('getkiemduyet',$bhm->id) }}"><i class="fas fa-headphones"></i></a></td>
                      </tr>
                  </tbody>
                @endif
              @endforeach
          </table>
    </div>
    <div class="tab-pane fade" id="nav-khongduyet" role="tabpanel" aria-labelledby="nav-khongduyet-tab">
        <table class="table table-striped">
          <thead>
              <tr>
                  <th width="10%" scope="col">User</th>
                  <th width="20%" scope="col">Tên bai hát</th>
                  <th width="20%" scope="col">Nghệ sĩ</th>
                  <th width="30%" scope="col">Image</th>
                  <th width="10%" scope="col">Thể loại</th>
                  <th width="10%" style="text-align: center;" colspan="2" scope="col">Action</th>
              </tr>
          </thead>
          @foreach ($baihatmoi as $bhm)
            @if($bhm->status == '2')   
              <tbody>
                  <tr>
                      <th scope="row">{{ $bhm->user->name }}</th>
                      <td>{{ $bhm->tenbaihat }}</td>
                      <td>{{ $bhm->nghesi }}</td>
                      <td><img src="../images/images_baihatmoi/{{ $bhm->image }}" width="50" height="50" alt=""></td>
                      <td>{{ $bhm->theloai->tentheloai }}</td>
                      <td><a class="btn btn-warning" href="{{ route('editcasi',$bhm->id) }}"><i class="fas fa-headphones"></i></a></td>
                  </tr>
              </tbody>
            @endif  
          @endforeach
        </table>
    </div>
    <div class="tab-pane fade" id="nav-daduyet" role="tabpanel" aria-labelledby="nav-daduyet-tab">
      <table class="table table-striped">
          <thead>
              <tr>
                  <th width="10%" scope="col">User</th>
                  <th width="20%" scope="col">Tên bai hát</th>
                  <th width="20%" scope="col">Nghệ sĩ</th>
                  <th width="30%" scope="col">Image</th>
                  <th width="10%" scope="col">Thể loại</th>
                  <th width="10%" style="text-align: center;" colspan="2" scope="col">Action</th>
              </tr>
          </thead>
          @foreach ($baihatmoi as $bhm)
            @if($bhm->status == '3') 
              <tbody>
                  <tr>
                      <th scope="row">{{ $bhm->user->name }}</th>
                      <td>{{ $bhm->tenbaihat }}</td>
                      <td>{{ $bhm->nghesi }}</td>
                      <td><img src="../images/images_baihatmoi/{{ $bhm->image }}" width="50" height="50" alt=""></td>
                      <td>{{ $bhm->theloai->tentheloai }}</td>
                      <td><a class="btn btn-warning" href="{{ route('editcasi',$bhm->id) }}"><i class="fas fa-headphones"></i></a></td>
                  </tr>
              </tbody>
            @endif  
          @endforeach
        </table>
    </div>
</div>





























<div class="table-user">

</div>
@endsection