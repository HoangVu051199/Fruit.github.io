@extends('layouts.app_frontend')
@section('content')
<!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                       <h3>Giỏ hàng</h3>
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li>Giỏ hàng</li>
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
        	@if(Session::get('cart') == true)
            <form action="{{ URL::to('update-cart') }}" method="POST">
            	@csrf
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page">
                            	@if(session()->has('message'))
                            		<div class="alert alert-success">
                            			[{session()->get('message')}]
                            		</div>
                            	@elseif(session()->has('error'))
                            		<div class="alert alert-success">
                            			[{session()->get('error')}]
                            		</div>
                            	@endif
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Thao tác</th>
                                    <th class="product_thumb">Ảnh</th>
                                    <th class="product_name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product_quantity">Số lượng</th>
                                    <th class="product_total">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$total = 0;
                            	@endphp
                            	@foreach(Session::get('cart') as $key => $value)
                            		@php
                            			$subtotal = $value['product_price']*$value['product_quantity'];
                            			$total+=$subtotal;
                            		@endphp
                            		<tr>
                                   		<td class="product_remove"><a href="{{ URL::to('delete-product', $value['session_id'])}}"><i class="fa fa-trash-o"></i></a></td>
                                    	<td class="product_thumb"><a href="#"><img src="{{ $value['product_image'] }}" alt=""></a></td>
                                    	<td class="product_name"><a href="#">{{ $value['product_name'] }}</a></td>
                                    	<td class="product-price">{{ number_format($value['product_price'], 0,',','.') }}đ</td>
                                    	<td class="product_quantity"><label>Số lượng</label> <input min="1"  name="product_quantity[{{$value['session_id']}}]" value="{{ $value['product_quantity'] }}" type="number"></td>
                                    	<td class="product_total">{{ number_format($subtotal, 0,',','.') }}đ</td>

                                </tr>
                            	@endforeach
                            </tbody>
                        </table>
                            </div>
                            <div class="cart_submit">
                            	<a class="cart_delete" href="{{ URL::to('delete-all-product') }}">Xoá tất cả</a>
                                <button type="submit">Cập nhật giỏ hàng</button>
                            </div>
                        </div>
                     </div>
                 </div>
                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">
                                    <p>Enter your coupon code if you have one.</p>
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Tổng giá trị đơn hàng</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal ">
                                       <p>Tạm tính :</p>
                                       <p class="cart_amount">{{ number_format($total,0,',','.') }}đ</p>
                                   </div>

                                   <div class="cart_subtotal">
                                       <p>Tổng tiền :</p>
                                       <p class="cart_amount">{{ number_format($total,0,',','.') }}đ</p>
                                   </div>
                                   <div class="checkout_btn">
                                       <a href="{{ route('home.checkout')}}">Thanh Toán</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
            @else
            <div class="error_section">
        		<div class="container">
            		<div class="row">
                		<div class="col-12">
                    		<div class="error_form">
                        		<h1><span class="lnr lnr-cart"></span></h1>
                        		<h2>không có sản phẩm nào trong giỏ hàng</h2>
                        <a href="{{ URL::to('') }}">Mua Hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            @endif
        </div>
    </div>
     <!--shopping cart area end -->
@endsection
