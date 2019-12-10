@extends('pages.master.layout')
@section('content')
    <div class="container">
        <hr style="margin-top: 2%;margin-bottom: 2%;width: 70%;">
        <div class="row">
            <div class="col-md-8">
                {{-- slider --}}
                <div   class="carousel slide" data-ride="carousel">
                  <div id="slider" class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="https://www.dulichvietnam.com.vn/cam-nang-nhat-ban/images/bien-hoa-cv-hitachi.jpg" alt="" />
                    </div>
                    <div class="carousel-item">
                      <img src="http://www.phunungaynay.vn/wp-content/uploads/2016/05/canh-dep-vuon-hoa-nhat-ban-1.jpg" alt="" title="Ironman Screenshot" />

                    </div>
                    <div class="carousel-item">
                      <a href=""><img src="https://innotour.vn/wp-content/uploads/2017/11/phong-canh-dep-5-814x518.jpg" alt="" /></a>
                    </div>
                  </div>
                </div>
                
                {{-- slider --}}
            </div>
            <div class="col-md-4">
                    <div class="mySlides">
                          <div class="numbertext"></div>
                              <img src="https://avatar-nct.nixcdn.com/singer/avatar/2017/04/05/6/c/a/1/1491357370894_600.jpg" style="width:100%;height: 290px;">
                          </div>
                        
                          <div class="mySlides">
                            <div class="numbertext"></div>
                              <img src="https://avatar-nct.nixcdn.com/singer/avatar/2019/03/21/0/e/3/d/1553153837657_600.jpg" style="width:100%;height: 290px;">
                          </div>
                        
                          <div class="mySlides">
                            <div class="numbertext"></div>
                              <img src="https://avatar-nct.nixcdn.com/singer/avatar/2019/09/26/1/d/b/5/1569474237302_600.jpg" style="width:100%;height: 290px;">
                          </div>
                        
                          <div class="mySlides">
                            <div class="numbertext"></div>
                              <img src="https://avatar-nct.nixcdn.com/singer/avatar/2018/05/07/7/c/e/5/1525673879571_600.jpg" style="width:100%;height: 290px;">
                          </div>
                        
                          <div class="mySlides">
                            <div class="numbertext"></div>
                              <img src="https://avatar-nct.nixcdn.com/singer/avatar/2019/08/30/d/5/9/d/1567133656446_600.jpg" style="width:100%;height: 290px;">
                          </div>
                          <!-- Next and previous buttons -->
                        
                          <!-- Image text -->
                          <div class="caption-container">
                            <p id="caption"></p>
                          </div>
                          <!-- Thumbnail images -->
                          <div class="row">
                            <div class="column">
                              <img class="demo cursor" src="https://avatar-nct.nixcdn.com/singer/avatar/2017/04/05/6/c/a/1/1491357370894_600.jpg" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
                            </div>
                            <div class="column">
                              <img class="demo cursor" src="https://avatar-nct.nixcdn.com/singer/avatar/2019/03/21/0/e/3/d/1553153837657_600.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
                            </div>
                            <div class="column">
                              <img class="demo cursor" src="https://avatar-nct.nixcdn.com/singer/avatar/2019/09/26/1/d/b/5/1569474237302_600.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
                            </div>
                            <div class="column">
                              <img class="demo cursor" src="https://avatar-nct.nixcdn.com/singer/avatar/2018/05/07/7/c/e/5/1525673879571_600.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
                            </div>
                            <div class="column">
                              <img class="demo cursor" src="https://avatar-nct.nixcdn.com/singer/avatar/2019/08/30/d/5/9/d/1567133656446_600.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
                            </div>
                          </div>
            </div>
        </div>
        <div class="allslide">
            <h5>Bài hát mới</h5>
            <div class="owl-carousel owl-theme">
                    <div class="item"><h4>1</h4></div>
                    <div class="item"><h4>2</h4></div>
                    <div class="item"><h4>3</h4></div>
                    <div class="item"><h4>4</h4></div>
                    <div class="item"><h4>5</h4></div>
                    <div class="item"><h4>6</h4></div>
                    <div class="item"><h4>7</h4></div>
                    <div class="item"><h4>8</h4></div>
                    <div class="item"><h4>9</h4></div>
                    <div class="item"><h4>10</h4></div>
                    <div class="item"><h4>11</h4></div>
                    <div class="item"><h4>12</h4></div>
                </div>
        </div>
    </div>
@endsection