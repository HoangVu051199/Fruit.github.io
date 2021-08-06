@extends('layouts.app_frontend')
@section('title','Chi tiết tin tức')
@section('content')
<!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                       <h3>Liên hệ</h3>
                        <ul>
                            <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                            <li>Liên hệ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--contact map start-->
    <div class="contact_map mt-70">
       <div class="map-area">
          <div id="googleMap">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119241.19068423127!2d106.25438727059948!3d20.94097819035524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31359b46ef2fba69%3A0x2c3c5975d0eceb2e!2zVHAuIEjhuqNpIETGsMahbmcsIEjhuqNpIETGsMahbmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1625042466806!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
       </div>
    </div>
    <!--contact map end-->
    
    <!--contact area start-->
    <div class="contact_area">
        <div class="container">   
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="contact_message content">
                        <h3>Liên hệ</h3>    
                        <ul>
                            <li><i class="fa fa-fax"></i>  Địa chỉ : Số nhà 24 Ngô Quyền, P.Thanh Bình, TP.Hải Dương</li>
                            <li><i class="fa fa-phone"></i> <a href="#">1900 2268 - 0988 444 123</a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="tel:0(1234)567890">hoangvu123@gmail.com</a>  </li>
                        </ul>             
                    </div> 
                </div>
            </div>
        </div>    
    </div>

    <!--contact area end-->
@endsection
