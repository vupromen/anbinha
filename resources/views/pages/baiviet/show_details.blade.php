@extends('welcome')
@section('content')
<!-- blog details part start -->
<section class="blog-details section">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <article class="post">
          <div class="post-image">
							<ul id="imageGallery">
								@foreach($hinh as $key=>$pic)
								<li data-thumb="{{URL::to('public/upload/baiviet/'.$pic->hinh)}}" data-src="{{URL::to('public/upload/baiviet/'.$pic->hinh)}}" >
								  <img width="600px" height="500px" src="{{URL::to('public/upload/baiviet/'.$pic->hinh)}}"/>
								</li>
								@endforeach
							  </ul>
          </div>
          <!-- Post Content -->
          <div class="post-content">
          <h3>{{$baiviet_details->baiviet_name}}</h3>
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Admin</a>&nbsp;/
              </li>
              <li class="list-inline-item">
                <a href="#">30 comments</a>&nbsp;/
              </li>
              <li class="list-inline-item">
                <a href="#">30 likes</a>
              </li>
            </ul>
           
            <!-- blockquote -->
            <blockquote data-aos="fade-left" data-aos-duration="1000">{{$baiviet_details->baiviet_noidung}}</blockquote>
            <!-- <p></p> -->
            <!-- post share -->
            <ul class="post-content-share list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="tf-ion-social-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="tf-ion-social-linkedin"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="tf-ion-social-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="tf-ion-social-skype"></i>
                </a>
              </li>
            </ul>
           
          </div>
        </article>
      </div>

      <div class="col-lg-3">
        <!-- sidebar -->
        <aside class="sidebar">
          <div class="widget-post widget">
            <h2>Bài viết mới nhất</h2>
            <!-- latest post -->
           
            <ul class="widget-post-list">
              @foreach($baiviet_moi as $bv)
              @php
              $img = DB::table('tbl_hinhanh')->where('id_baiviet',$bv->baiviet_id)->first();

             @endphp
              <li class="widget-post-list-item">
               
                <div class="widget-post-image">
                  <a href="{{URL::to('/chi-tiet/'.$bv->baiviet_id)}}">
                    @if($img)
                    <img  src="{{URL::to('public/upload/baiviet/'.$img->hinh)}}" class="img-fluid" >
                    @else
                    <img src="{{URL::to('public/frontend/images/not-available.jpg')}}" alt="" class="img-fluid">
                    @endif
                  </a>
                </div>
                <div class="widget-post-content">
                  <a href="{{URL::to('/chi-tiet/'.$bv->baiviet_id)}}">
                    <h5>{{ $bv->baiviet_name }}</h5>
                  </a>
                  <h6>{{ $bv->created_at }}</h6>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </div>
</section>
<!-- blog details part end -->
  @endsection