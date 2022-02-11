@extends('welcome')
@section('content')
<!--
  Start Blog Section
  =========================================== -->

  <section class="blog" id="blog">
<div class="container">
  <div class="row">

      <!-- section title -->
      <div class="col-12">
          <div class="title text-center ">
              <h2> Sự kiện mới<span class="color"> nhất</span></h2>
              <div class="border"></div>
          </div>
      </div>
      <!-- /section title -->
      <!-- single blog post -->
      
      @foreach($all_baiviet as $key => $baiviet)
      <a href="{{URL::to('/chi-tiet/'.$baiviet->baiviet_id)}}">
      <article class="col-md-4 col-sm-6 col-xs-12 clearfix">
        @php
          $img = DB::table('tbl_hinhanh')->where('id_baiviet',$baiviet->baiviet_id)->first();
        @endphp
          <div class="post-item">
              <div class="media-wrapper">
                @if($img)

                  <img width="300px" height="300px" src="{{URL::to('public/upload/baiviet/'.$img->hinh)}}" alt="" class="img-fluid">
                  @else
                  <img width="300px" height="300px" src="{{URL::to('public/frontend/images/not-available.jpg')}}" alt="" class="img-fluid">
                  @endif
              </div>

              <div class="content">
                  <h4>{{$baiviet->baiviet_name}}</h4>
                  <a class="btn btn-main" href="{{URL::to('/chi-tiet/'.$baiviet->baiviet_id)}}">Xem</a>
              </div>
  
          </div>
      </article>
  </a>

      @endforeach
    
  </div> 
  <div class="col-sm-7 text-right text-center-xs" >    
    {!!$all_baiviet->links()!!}
</div>

  <!-- Start Testimonial
=========================================== -->
  
<section class="testimonial section" id="testimonial">
  <div class="container">
      <div class="row">				
          <div class="col-lg-12">
              <!-- testimonial wrapper -->
              <div class="testimonial-slider">
                  <!-- testimonial single -->
                  <div class="item text-center">
                      <i class="tf-ion-chatbubbles"></i>
                      <!-- client info -->
                      <div class="client-details">
                          <p>An Bình An với nhiều năm kinh nghiệm trong ngành cùng đội ngũ kỹ sư giỏi chúng tôi cam kết mang lại giá trị tốt và bền vững nhất cho khách hàng.</p>
                      </div>
                      <!-- /client info -->
                      <!-- client photo -->
                      <div class="client-thumb">
                          <img src="{{('public/frontend/images/client-logo/clients-1.jpg')}}" class="img-fluid" alt="">
                      </div>
                      <div class="client-meta">
                          <h3>Ngo Thien Quoc</h3>
                          <span>CEO , Company ABA</span>
                      </div>
                      <!-- /client photo -->
                  </div>
                  <!-- /testimonial single -->
          
                  <!-- testimonial single -->
                  <div class="item text-center">
                      <i class="tf-ion-chatbubbles"></i>
                      <!-- client info -->
                      <div class="client-details">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, soluta dolorum. Eos earum, magni asperiores, unde corporis labore, enim, voluptatum officiis voluptates alias natus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quia?</p>
                      </div>
                      <!-- /client info -->
                      <!-- client photo -->
                      <div class="client-thumb">
                          <img src="{{('public/frontend/images/client-logo/clients-2.jpg')}}" class="img-fluid" alt="">
                      </div>
                      <div class="client-meta">
                          <h3>Ngo Thien Quoc</h3>
                          <span>CEO , Company ABA</span>
                      </div>
                      <!-- /client photo -->
                  </div>
                  <!-- /testimonial single -->
              
                  <!-- testimonial single -->
                  <div class="item text-center">
                      <i class="tf-ion-chatbubbles"></i>
                      <!-- client info -->
                      <div class="client-details">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, soluta dolorum. Eos earum, magni asperiores, unde corporis labore, enim, voluptatum officiis voluptates alias natus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quia?</p>
                      </div>
                      <!-- /client info -->
                      <!-- client photo -->
                      <div class="client-thumb">
                          <img src="{{('public/frontend/images/client-logo/clients-3.jpg')}}" class="img-fluid" alt="">
                      </div>
                      <div class="client-meta">
                          <h3>Ngo Thien Quoc</h3>
                          <span>CEO , Company ABA</span>
                      </div>
                      <!-- /client photo -->
                  </div>
                  <!-- /testimonial single -->
              </div>
          </div> 		<!-- end col lg 12 -->
      </div>	    <!-- End row -->
  </div>       <!-- End container -->
</section>    <!-- End Section -->


<div class="row">

<div class="col-12">
  <!-- section title -->
  <div class="title text-center">
    <h2>Thông tin liên hệ</h2>
    <div class="border"></div>
  </div>
  <!-- /section title -->
</div>
<div class="col-md-4 text-center">
  <img src="{{('public/frontend/images/about/member.jpg')}}" class="inline-block" alt="">
</div>
<div class="col-md-12">
  <div class="row text-center">
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="service-item">
        <i class="tf-ion-ios-briefcase-outline"></i>
        <h4>Marketing Ideas</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
      </div>
    </div><!-- END COL -->
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="service-item">
        <i class="tf-ion-ios-email-outline"></i>
        <h4>Mail Support</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
      </div>
    </div><!-- END COL -->
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="service-item">
        <i class="tf-ion-ios-locked-outline"></i>
        <h4>Secure System</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
      </div>
    </div><!-- END COL -->
  </div>
</div>
</div> <!-- End row -->
</div> <!-- End container -->
</section> <!-- End section -->
@endsection