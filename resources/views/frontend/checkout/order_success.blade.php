@extends('layouts.app_frontend')
@section('content')
<!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                       <h3>Thanh toán</h3>
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li>Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

     <!--shopping cart area start -->
    <div class="shopping_cart_area mt-70">
        <div class="container">
        	
            <div class="error_section">
        		<div class="container">
            		<div class="row">
                		<div class="col-12">
                    		<div class="error_form">
                        		<h1><span class="lnr lnr-cart"></span></h1>
                        		<h2>Cảm ơn bạn! Đơn hàng của bạn đã được nhận.</h2>
                        <a href="{{ URL::to('') }}">Mua Hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
        </div>
    </div>
     <!--shopping cart area end -->
@endsection
