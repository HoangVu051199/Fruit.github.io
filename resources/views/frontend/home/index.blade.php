@extends('layouts.app_frontend')
@section('content')
    <!--slider area start-->
    <section class="slider_section slider_s_five mb-70">
        <div class="slider_area owl-carousel">
            @foreach($slider as $item)
            <div class="single_slider d-flex align-items-center" data-bgimg="{{ $item->image }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider_content">
                                <h1>Quả Tươi Thanh Mát</h1>
                                <h2>Mịn Màng Làn Da</h2>
                                <p>
                                    Bạn có muốn có một làn da sáng? Vậy thì bạn nên ăn trái cây mỗi ngày! Hầu hết các loại trái cây, đặc biệt là bơ, có một lượng lớn các vitamin E làm lão hóa chậm.
                                </p>
                                <a href="shop.html">Đọc Thêm </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!--slider area end-->
    <!--shipping area start-->
    <div class="shipping_area">
        <div class="container">
            <div class="row">
                <div class="section_title">
                    <h2>3 LÝ DO MUA HOA QUẢ TẠI FRUIT</h2>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="shipping_icone pb-3">
                        <img src="frontend/assets/img/about/shipping1.png" alt="">
                    </div>
                    <div class="single_shipping">
                        <div class="shipping_content">
                            <h3>HOA QUẢ TƯƠI SẠCH</h3>
                            <p>Quy trình nhập hàng, vận chuyển, bảo quản chuyên nghiệp</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="shipping_icone pb-3">
                            <img src="frontend/assets/img/about/shipping2.png" alt="">
                        </div>
                    <div class="single_shipping col_3">
                        <div class="shipping_content">
                            <h3>ĐỔI TRẢ MIỄN PHÍ</h3>
                            <p>Đổi trả miễn phí trong 24h khi khách hàng không hài lòng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="shipping_icone pb-3">
                            <img src="frontend/assets/img/about/shipping3.png" alt="">
                        </div>
                    <div class="single_shipping col_3">
                        <div class="shipping_content">
                            <h3>GIÁ CẢ CẠNH TRANH</h3>
                            <p>Fruit luôn đặt lợi ích cho người tiêu dùng lên hàng đầu</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shipping area end-->

    <!--product area start-->
    <div class="product_area mb-65">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                       <h2>Sản Phẩm</h2>
                    </div>
                </div>
            </div>
             <div class="product_container">
               <div class="row">
                   <div class="col-12">
                        <div class="product_carousel product_column5 owl-carousel">
                            @foreach($product as $item)
                                @if($item->hot == 1 && $item->status == 1)
                            <article class="single_product">
                                <form>
                                    @csrf
                                <figure>
                                    <input type="hidden" value="{{ $item->id }}" class="cart_id_{{ $item->id }}">
                                    <input type="hidden" value="{{ $item->name }}" class="cart_name_{{ $item->id }}">
                                    <input type="hidden" value="{{ $item->image }}" class="cart_image_{{ $item->id }}">
                                    <input type="hidden" value="{{ $item->price }}" class="cart_price_{{ $item->id }}">
                                    <input type="hidden" value="1" class="cart_quantity_{{ $item->id }}">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ URL::to('product-detail', $item->slug) }}"><img src="{{ $item->image }}" alt=""></a>
                                        <!-- <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                            <span class="label_new">New</span>
                                        </div> -->
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart" name="add_to_cart" data-id ="{{ $item->id }}"><a><span class="lnr lnr-cart"></span></a></li>
                                                <li class="quick_button" data-id ="{{ $item->id }}"><a id="quick_modal" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                 <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="{{ URL::to('product-detail', $item->slug) }}">{{ $item->name }}</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">{{ number_format($item->price, 0, ',', '.') }}
                                                <sup>đ</sup></span>
                                            <!-- <span class="old_price">20.000đ</span> -->
                                        </div>
                                    </figcaption>
                                </figure>
                                </form>
                            </article>
                                @else
                                    {{ NULL }}
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product area end-->

    <!--banner area start-->
    <div class="banner_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="frontend/assets/img/bg/banner1.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="frontend/assets/img/bg/banner2.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product area start-->
    <div class="product_area product_deals mb-65">

        @foreach($promotion as $pro)
        @if($pro->status == 1 && $pro->start <= now('Asia/Ho_Chi_Minh'))
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>{{ $pro->name }}</h2>
                    </div>
                </div>
            </div>
             <div class="product_container">
               <div class="row">
                   <div class="col-12">
                        <div class="product_carousel product_column5 owl-carousel">
                            @foreach($pro->detail_promotion as $item)
                            <article class="single_product">
                                <form>
                                    @csrf
                                <figure>
                                    <input type="hidden" value="{{ $item->product_id }}" class="cart_id_{{ $item->product_id }}">
                                    <input type="hidden" value="{{ $item->product->name }}" class="cart_name_{{ $item->product_id }}">
                                    <input type="hidden" value="{{ $item->product->image }}" class="cart_image_{{ $item->product_id }}">
                                    <input type="hidden" value="{{ $item->product->price }}" class="cart_price_{{ $item->product_id }}">
                                    <input type="hidden" value="1" class="cart_quantity_{{ $item->product_id }}">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="{{ $item->product->image }}" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">
                                                {{ $item->promotion->sale }}%
                                            </span>
                                        </div>
                                        
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart" name="add_to_cart" data-id ="{{ $item->product_id }}"><a><span class="lnr lnr-cart"></span></a></li>
                                                <li class="quick_button" data-id ="{{ $item->product_id }}"><a id="quick_modal" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                 <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="{{ URL::to('product-detail', $item->slug) }}">
                                            {{ $item->product->name }}
                                        </a></h4>
                                        <div class="price_box">
                                            <span class="current_price">
                                                <?php 
                $sale = $item->product->price*((100 - $item->promotion->sale)/100);
                            echo number_format($sale, 0, ',', '.');  
                                                ?>đ
                                            </span>
                                            <span class="old_price">
                                                {{ number_format($item->product->price, 0, ',', '.') }}đ
                                            </span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </form>
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <!--product area end-->

    

    <!--blog area start-->
    <section class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                       <h2>Tin Tức</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog_carousel blog_column3 owl-carousel">
                    @foreach($recent_posts as $item)
                    <div class="col-lg-3">
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    <a href="{{ URL::to('new-detail',$item->id) }}"><img src="{{ $item->image }}" style="height: 268px;" alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                   <div class="articles_date">
                                         <p>{{ $item->created_at }} | <a href="#">Hoàng vũ</a> </p>
                                    </div>
                                    <h4 class="post_title"><a href="{{ URL::to('new-detail',$item->id) }}">{{ $item->title }}</a></h4>
                                    <footer class="blog_footer">
                                        <a href="{{ URL::to('new-detail',$item->id) }}">Chi tiết</a>
                                    </footer>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--blog area end-->
@endsection
