@extends('layouts.app_frontend')
@section('title', 'Sản phẩm')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Sản Phẩm</h3>
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li>Sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shop  area start-->
<div class="shop_area shop_reverse mt-70 mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!--sidebar widget start-->
                <aside class="sidebar_widget">
                    <div class="widget_inner">
                        <div class="widget_list widget_categories">
                            <h3>Danh Mục Sản Phẩm</h3>
                            <ul>
                                @foreach($cate_product as $item)
                                @if($item->status == 1)
                                <li class="widget_sub_categories sub_categories1">
                                    <a href="{{ URL::to('cate-product', $item->slug) }}">{{ $item->name }}</a>
                                </li>
                                @else
                                {{ NULL }}
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget_list widget_color">
                            <h3>HỖ TRỢ TRỰC TUYẾN</h3>
                            <div class="hotro">
                                <div class="hotro_img">
                                    <img src="frontend/assets/img/s-product/hotro1.jpg">
                                </div>
                                <div class="hotro_content">
                                    <p>Hỗ trợ viên: <span>Thu Ngân</span></p>
                                    <p>Phone: <span>024709999</span></p>
                                    <p>Zalo: <span>Thu Ngân</span></p>
                                </div>
                            </div>
                            <div class="hotro">
                                <div class="hotro_img">
                                    <img src="frontend/assets/img/s-product/hotro2.jpg">
                                </div>
                                <div class="hotro_content">
                                    <p>Hỗ trợ viên: <span>Thanh Tú</span></p>
                                    <p>Phone: <span>024708888</span></p>
                                    <p>Zalo: <span>Thanh Tú</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="widget_list widget_post">
                            <div class="widget_title">
                                <h3>Bài đăng gần đây</h3>
                            </div>
                            @foreach($recent_posts as $item)
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="{{ URL::to('new-detail', $item->slug) }}"><img style="width: 60px; height: 52px" src="{{ $item->image }}" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h4><a href="{{ URL::to('new-detail', $item->slug) }}">{{ $item->title }}</a></h4>
                                    <span>{{ $item->created_at }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </aside>
                <!--sidebar widget end-->
            </div>
            <div class="col-lg-9 col-md-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">

                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                        <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                        <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button>
                    </div>
                </div>
                <!--shop toolbar end-->
                <div class="row shop_wrapper">
                    @foreach($product as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <form>
                        @csrf
                        <div class="single_product">
                            
                        <input type="hidden" value="{{ $item->id }}" class="cart_id_{{ $item->id }}">
                        <input type="hidden" value="{{ $item->name }}" class="cart_name_{{ $item->id }}">
                        <input type="hidden" value="{{ $item->image }}" class="cart_image_{{ $item->id }}">
                        <input type="hidden" value="{{ $item->price }}" class="cart_price_{{ $item->id }}">
                            <div class="product_thumb">
                                <a class="primary_img" href="{{ URL::to('product-detail', $item->slug) }}"><img src="{{ $item->image }}" alt=""></a>
                                <!-- <div class="label_product">
                                    <span class="label_sale">Sale</span>
                                    <span class="label_new">New</span>
                                </div> -->
                                <div class="action_links">
                                    <ul>
                                        <li class="add_to_cart"><a href="cart.html" title="Thêm giỏ hàng"><span class="lnr lnr-cart"></span></a></li>
                                        <!-- <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="#" title="Add to Compare"><span class="lnr lnr-sync"></span></a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content grid_content">
                                <h4 class="product_name"><a href="{{ URL::to('product-detail', $item->slug) }}">{{ $item->name }}</a></h4>
                                <div class="price_box">
                                    <span class="current_price">{{ number_format($item->price)}}<sup>đ</sup></span>
                                    <!-- <span class="old_price">$362.00</span> -->
                                </div>
                            </div>
                            <div class="product_content list_content">
                                <h4 class="product_name"><a href="{{ URL::to('product-detail', $item->slug) }}">{{$item->name}}</a></h4>
                                <div class="price_box">
                                    <span class="current_price">{{ number_format($item->price) }}<sup>đ</sup></span>
                                    <!-- <span class="old_price">$362.00</span> -->

                                </div>
                                <div class="quantity mt-2 mb-2">
                                    <label>Số lượng</label>
                            <input type="number" min="1" value="1" class="cart_quantity_{{ $item->id }}">
                                </div>
                                <div class="product_desc">
                                    <p>{{ $item->description}}</p>
                                </div>
                                <div class="action_links list_action_right">
                                    <ul>
                                        <li class="add_to_cart" name="add_to_cart" data-id ="{{ $item->id }}"><a >Thêm giỏ hàng</a></li>
                                        <!-- <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="#" title="Add to Compare"><span class="lnr lnr-sync"></span></a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    @endforeach
                </div>
                
                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                            {{ $product->links() }}
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->

    @endsection
