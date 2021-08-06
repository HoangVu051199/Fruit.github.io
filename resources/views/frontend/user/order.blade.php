@extends('layouts.app_frontend')
@section('title', 'Đơn hàng')
@section('content')
<!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                       <h3>Đơn hàng</h3>
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li>Đơn hàng</li>
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
            @if($orders == NULL)

            <form>
                <div class="row">
                    @foreach($orders as $order)
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page">
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Mã đơn hàng</th>
                                    <th class="product_thumb">Ảnh</th>
                                    <th class="product_name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-price">Trạng thái</th>
                                    <th class="product_total">Tạm tính</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                            	@foreach($order->order_detail as $item)
                                    @php
                                        $subtotal = $item->product_price*$item->product_quantity;
                        $feeship = str_replace("đ","",$item->product_feeship);
                        $feeship = str_replace(".","",$feeship);
                        
                        $total+=$subtotal + $feeship ;
                                        

                                    @endphp
                            		<tr>
                                   		<td class="product_code">
                                         {{ $item->order_code }}   
                                        </td>
                                    	<td class="product_thumb">
                                        <img src="{{ $item->product->image }}" alt=""></td>
                                    	<td class="product_name">
                                         {{ $item->product_name }} x
                                         {{ $item->product_quantity }}   
                                        </td>
                                    	<td class="product_price">
                                         {{ number_format($item->product_price, 0, ',','.') }}đ  
                                        </td>
                                    	<td>
                                        @if($order->status == 0)
                                            Chờ xử lý
                                        @elseif($order->status == 1)
                                            Đang giao
                                        @else
                                            Đã giao
                                        @endif
                                        </td>
                                    	<td class="product_total">
                                            {{ number_format($subtotal, 0, ',', '.') }}đ
                                        </td>
                                </tr>
                            	@endforeach
                            </tbody>
                        </table>
                            </div>
                            <div class="cart_submit">
                                <p>Phí vận chuyển : {{number_format($feeship, 0,',','.')}}đ</p>
                            	<p>Tổng tiền: {{number_format($total, 0,',','.')}}đ</p>
                            </div>
                        </div>
                     </div>
                     @endforeach
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
                                <h2>Bạn chưa có đơn hàng nào</h2>
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
