<!doctype html>
<html class="no-js" lang="en">
<!-- Mirrored from demo.hasthemes.com/safira-preview/safira/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Nov 2020 09:03:33 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Trang chủ')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="frontend/assets/img/favicon.ico">
    <base href="{{ asset('') }}">
    <!-- CSS
       ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="frontend/assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="frontend/assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="frontend/assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="frontend/assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="frontend/assets/css/font.awesome.css">
    <!--ionicons css-->
    <link rel="stylesheet" href="frontend/assets/css/ionicons.min.css">
    <!--linearicons css-->
    <link rel="stylesheet" href="frontend/assets/css/linearicons.css">
    <!--animate css-->
    <link rel="stylesheet" href="frontend/assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="frontend/assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="frontend/assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="frontend/assets/css/plugins.css">
    <!-- Sweet alert -->
    <link rel="stylesheet" href="frontend/assets/css/sweetalert.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="frontend/assets/css/style.css">
    <!--modernizr min js here-->
    <script src="frontend/assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script> -->


</head>
<body>
<!--header area start-->
<!--offcanvas menu area start-->
<div class="off_canvars_overlay">
</div>
<!--offcanvas menu area end-->
<header>
    <div class="main_header">
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="language_currency">
                            <ul>
                                <li class="language">
                                    <a href="#"> Ngôn ngữ <i class="icon-right ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Russian</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header_social text-right">
                            <ul>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_middle header_middle5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                        <div class="logo">
                            <a href="index.html"><img src="frontend/assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col_search5">
                        <div class="search_box search_five mobail_s_none">
                            <form action="#">
                                <input placeholder="Search here..." type="text">
                                <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-7 col-8">
                        <div class="header_account_area">
                            <div class="header_account_list register">
                            @if(Auth::user())
                            <div class="language_currency">
                                <ul>
                                @if(Auth::user()->hasRole(['admin','khach-hang']))
                                <li><a href="{{ URL::to('admin') }}">Dashboard</a></li>
                                @endif
                                <li class="language">
                                    <a> {{ Auth::user()->name }} <i class="icon-right ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#">Thông tin</a></li>
                                        <li><a href="{{URL::to('user-order')}}">Đơn Mua</a></li>
                                        <li>
                                        <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Đăng xuất</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </li>
                                    </ul>
                                </li>
                            </ul>
                                </div>    
                                    @else
                                    <ul>
                                    <li><a href="{{ route('register') }}">Đăng ký</a></li>
                                    <li><span>/</span></li>
                                    <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                    </ul>
                                    @endif
                                
                            </div>
                            <div class="header_account_list header_wishlist">
                                <a href="wishlist.html"><span class="lnr lnr-heart"></span> <span class="item_count">0</span> </a>
                            </div>
                            <div class="header_account_list  mini_cart_wrapper">
                                <a href="javascript:void(0)"><span class="lnr lnr-cart"></span><span class="item_count">
                                    @if(Session::get('cart'))
                                    @php
                                        $count = count(Session::get('cart'));
                                    @endphp
                                        {{$count}}
                                    @else
                                        0
                                    @endif
                                </span></a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    @if(Session::get('cart'))
                                    <div class="cart_gallery">  
                                        <div class="cart_close">
                                            <div class="cart_text">
                                                <h3>cart</h3>
                                            </div>
                                            <div class="mini_cart_close">
                                                <a href="javascript:void(0)"><i class="icon-x"></i></a>
                                            </div>
                                        </div>
                                        @php
                                            $total = 0;
                                        @endphp
                                    @foreach(Session::get('cart') as $key => $cart)
                                    @php
                                        $subtotal = $cart['product_price']*$cart['product_quantity'];
                                        $total+=$subtotal;
                                    @endphp
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img src="{{$cart['product_image']}}" alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">{{ $cart['product_name'] }}</a>
                                                <p>{{ $cart['product_quantity'] }} x <span> {{ number_format($cart['product_price'], 0, ',', '.') }}đ </span></p>
                                            </div>
                                            <div class="cart_remove">
                                                <a href="{{ URL::to('delete-product', $cart['session_id'])}}"><i class="icon-x"></i></a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="mini_cart_table">
                                        <div class="cart_table_border">
                                            <div class="cart_total">
                                                <span>Tạm tính:</span>
                                                <span class="price">{{ number_format($total, 0, ',', '.') }}đ</span>
                                            </div>
                                            <div class="cart_total mt-10">
                                                <span>Tổng tiền:</span>
                                                <span class="price">{{ number_format($total, 0, ',', '.') }}đ</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="{{ URL::to('gio-hang')}}"><i class="fa fa-shopping-cart"></i> View cart</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="{{ URL::to('checkout')}}"><i class="fa fa-sign-in"></i> Checkout</a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="cart_table_border">
                                            <div class="cart_total">
                                            <img width="299px" src="frontend/assets/img/service/empty-cart.png">
                                    </div>
                                </div>
                                    @endif
                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 col-sm-6 mobail_s_block">
                        <div class="search_box search_five">
                            <form action="#">
                                <input placeholder="Search here..." type="text">
                                <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="categories_menu">
                            <div class="categories_title">
                                <h2 class="categori_toggle">Danh mục Sản Phẩm</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    @foreach($cate_product as $item)
                                        @if($item->status == 1)
                                            <li ><a href="{{ URL::to('cate-product',$item->slug) }}">{{ $item->name }}</a></li>
                                        @else
                                            {{ NULL }}
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!--main menu start-->
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li class="{{ Request::is('/') ? 'active' : '' }}">
                                        <a  href="{{ URL::to('/') }}">Trang chủ</a>
                                    </li>
                                    <li class="{{ Request::is('products') ? 'active' : '' }}">
                                        <a href="{{ URL::to('/products') }}">Sản phẩm</a>
                                    </li>
                                    <li class="{{ Request::is('news') ? 'active' : '' }}">
                                        <a href="{{ URL::to('/news') }}">Tin tức<i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            @foreach($cate_new as $item)
                                                @if($item->status == 1)
                                                    <li><a href="{{ URL::to('cate-new-id', $item->slug) }}">{{ $item->name }}</a></li>
                                                @else
                                                    {{ NULL}}
                                                @endif        
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="{{ Request::is('introduce') ? 'active' : '' }}">
                                        <a href="{{ URL::to('/introduce') }}">Giới thiệu</a>
                                    </li>
                                    <li class="{{ Request::is('contact') ? 'active' : '' }}">
                                        <a href="{{ URL::to('/contact') }}"> Liên hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!--main menu end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="call-support">
                            <p><a href="tel:(+84)23456789">(+84) 23 456 789</a> Hỗ trợ khách hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header area end-->

@yield('content')

<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-7">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="index.html"><img src="frontend/assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <p><span>Trụ sở:</span> Số nhà 24 Ngô Quyền, P.Thanh Bình, TP.Hải Dương</p>
                        <p><span>Website:</span> www.hoaquafuji.com</p>
                        <p><span>Email:</span> <a href="#">demo@hasthemes.com</a></p>
                        <p><span>Hotline:</span> <a href="tel:(08)23456789">1900 2268 - 0988 444 123</a> </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="widgets_container widget_menu">
                        <h3>CHÍNH SÁCH</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="about.html">Chính sách bảo mật thông tin</a></li>
                                <li><a href="#">Chính sách đổi trả</a></li>
                                <li><a href="#">Chính sách vận chuyển</a></li>
                                <li><a href="#"> Câu hỏi thường gặp</a></li>
                                <li><a href="contact.html">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="widgets_container widget_menu">
                        <h3>HỖ TRỢ MUA HÀNG</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Hướng dẫn mua hàng</a></li>
                                <li><a href="#">Hệ thống cửa hàng</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="widgets_container widget_newsletter">
                        <h3>Đăng Ký</h3>
                        <p class="footer_desc">Đăng ký để nhận những thông tin mới nhất</p>
                        <div class="subscribe_form">
                            <form id="mc-form" class="mc-form footer-newsletter" >
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Nhập email của bạn" />
                                <button id="mc-submit">Đăng ký</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div>
                                <!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div>
                                <!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div>
                                <!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <div class="copyright_area">
                        <p>Copyright  © 2020  <a href="#">Hoàng Vũ</a>  . Mọi quyền được bảo lưu thiết kế bởi  <a href="#">Hoàng Vũ</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="footer_payment">
                        <ul>
                            <li><a href="#"><img src="frontend/assets/img/icon/paypal1.jpg" alt=""></a></li>
                            <li><a href="#"><img src="frontend/assets/img/icon/paypal2.jpg" alt=""></a></li>
                            <li><a href="#"><img src="frontend/assets/img/icon/paypal3.jpg" alt=""></a></li>
                            <li><a href="#"><img src="frontend/assets/img/icon/paypal4.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->
<!-- modal area start-->

<div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="icon-x"></i></span>
                </button>
                <div class="modal_body">
                    
                </div>    
            </div>
        </div>
    </div>

    
<!-- modal area end-->
<!-- JS
   ============================================ -->
<!--jquery min js-->
<script src="frontend/assets/js/vendor/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
 <!--popper min js-->
<script src="frontend/assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="frontend/assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="frontend/assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="frontend/assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="frontend/assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="frontend/assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="frontend/assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="frontend/assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="frontend/assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="frontend/assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="frontend/assets/js/slinky.menu.js"></script>
<!--instagramfeed menu js-->
<script src="frontend/assets/js/jquery.instagramFeed.min.js"></script>
<!-- Plugins JS -->
<script src="frontend/assets/js/plugins.js"></script>
<!-- Sweet Alert -->
<script src="frontend/assets/js/sweetalert.js"></script>
<!-- Main JS -->
<script src="frontend/assets/js/main.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.add_to_cart').click(function(){
            var id = $(this).data('id');
            var cart_id = $('.cart_id_' + id).val();
            var cart_name = $('.cart_name_' + id).val();
            var cart_image = $('.cart_image_' + id).val();
            var cart_price = $('.cart_price_' + id).val();
            var cart_quantity = $('.cart_quantity_' + id).val();
            var _token = $('input[name="_token"]').val();
            
            $.ajax({
                url: '{{ url('/add-cart-ajax') }}',
                method:'POST',
                data:{
                    cart_id:cart_id,
                    cart_name:cart_name,
                    cart_image:cart_image,
                    cart_price:cart_price,
                    cart_quantity:cart_quantity,
                    _token:_token,
                },
                success:function(data){
                    swal({
                      title: "Thêm thành công",
                      text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng thanh toán",
                      type: "success",
                      showCancelButton: true,
                      cancelButtonText: "Xem tiếp",
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "Xem giỏ hàng",
                      closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location.href = "{{ url('/gio-hang') }}";
                    }else{
                        location.reload();
                    }
                    });
                }
            });
        });
        
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            // alert(ma_id);
            // alert(_token);

            if(action=='provinces'){
                result = 'districts';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/home-select-delivery')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

        // fetch_delivery();
        // fetch_total();

        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url : '{{url('/home-select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);
                }
            });
        }

        function fetch_total(){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url : '{{url('/home-total-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#order_total').html(data);
                }
            });
        }

        $('.calculate_delivery').on('change', function(){
            var matp = $('.provinces').val();
            var maqh = $('.districts').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url : '{{url('/calculate-delivery')}}',
                method: 'POST',
                data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                success:function(data){
                    fetch_delivery(); 
                    fetch_total();
                }
            });
        });
    });
</script>

<!-- <script type="text/javascript">
    $(document).ready(function(){

        $('#frmError').validate({
            rules:{
                customer_name: "required",
                customer_phone:{
                    required: true,
                    number:true,
                    minlength:10,
                    maxlength:10,
                }, 
                customer_email:{
                    required: true,
                    email:true,
                },
                provinces: "required",
                districts: "required",
                wards: "required",
                customer_address: "required",
            },
            messages: {
                customer_name: "Vui lòng nhập họ và tên",
                customer_phone: {
                    required: "Vui lòng nhập số điện thoại",
                    number:"Số điện thoại không hợp lệ",
                    minlength:"Số điện thoại không hợp lệ",
                    maxlength:"Số điện thoại không hợp lệ"
                },
                customer_email:{
                    required: "Vui lòng nhập email",
                    email: "Vui lòng nhập địa một chỉ email hợp lệ"
                },
                provinces: "Vui lòng chọn tỉnh",
                districts: "Vui lòng chọn huyện",
                wards: "Vui lòng chọn xã",
                customer_address: "Vui lòng nhập địa chỉ",
            }
        });

        $('.order_confirm').click(function(){
            var customer_name = $('.customer_name').val();
            var customer_phone = $('.customer_phone').val();
            var customer_email = $('.customer_email').val();
            var customer_address = $('.customer_address').val();
            var customer_note = $('.customer_note').val();
            var provinces_id = $('.provinces').val();
            var districts_id = $('.districts').val();
            var wards_id = $('.wards').val();
            var payment_method = $('#payment').val();
            var feeship = $('.feeship').text();
            var _token = $('input[name="_token"]').val();

            alert(payment_method);

           if ($('#frmError').valid()) {
            $.ajax({
                url : '{{url('/order-confirm')}}',
                method: 'POST',
                data:{customer_name:customer_name,customer_phone:customer_phone,customer_email:customer_email,customer_address:customer_address,customer_note:customer_note,provinces_id:provinces_id,districts_id:districts_id,wards_id:wards_id,payment_method:payment_method,feeship:feeship,_token:_token},
                success:function(data){
                    swal("Đơn hàng!", "Cảm ơn bạn! Đơn hàng của bạn đã được nhận.", "success")
                    },
            });
            
            window.setTimeout(function(){
                window.location.href = "{{ url('/') }}";
            }, 3000);
            }
        });

        $('.payment_online').click(function(){
            var customer_name = $('.customer_name').val();
            var customer_phone = $('.customer_phone').val();
            var customer_email = $('.customer_email').val();
            var customer_address = $('.customer_address').val();
            var customer_note = $('.customer_note').val();
            var provinces_id = $('.provinces').val();
            var districts_id = $('.districts').val();
            var wards_id = $('.wards').val();
            var payment_method = $('#payment_online').val();
            var feeship = $('.feeship').text();
            var total = $('.total').text();
            var _token = $('input[name="_token"]').val();

           if ($('#frmError').valid()) {
            $.ajax({
                url : '{{url('/order-confirm')}}',
                method: 'POST',
                data:{customer_name:customer_name,customer_phone:customer_phone,customer_email:customer_email,customer_address:customer_address,customer_note:customer_note,provinces_id:provinces_id,districts_id:districts_id,wards_id:wards_id,payment_method:payment_method,feeship:feeship,total:total,_token:_token},
                success:function(data){
                    // swal("Đơn hàng!", "Cảm ơn bạn! Đơn hàng của bạn đã được nhận.", "success")
                    },
            });
            
            // window.setTimeout(function(){
            //     window.location.href = "{{ url('/') }}";
            // }, 3000);
            }
        });

    });    
</script> -->

<script type="text/javascript">
    $('document').ready(function(){ 

        $('.quick_button').click(function(){
            var id = $(this).data('id');
            var cart_id = $('.cart_id_' + id).val();
            var cart_name = $('.cart_name_' + id).val();
            var cart_image = $('.cart_image_' + id).val();
            var cart_price = $('.cart_price_' + id).val();
            var cart_quantity = $('.cart_quantity_' + id).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{ url('/home-select-modal') }}',
                method:'POST',
                data:{
                    cart_id:cart_id,
                    cart_name:cart_name,
                    cart_image:cart_image,
                    cart_price:cart_price,
                    cart_quantity:cart_quantity,
                    _token:_token,
                },
                success:function(data){
                    $('.modal_body').html(data);
                }
        });
        });

    });
</script>

<script type="text/javascript">

    $('.main_menu li').click(function() {
        $(this).siblings('li').removeClass('active');
        $(this).addClass('active');
    });

</script>

</body>
<!-- Mirrored from demo.hasthemes.com/safira-preview/safira/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Nov 2020 09:03:33 GMT -->
</html>
