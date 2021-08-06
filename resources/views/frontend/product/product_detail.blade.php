@extends('layouts.app_frontend')
@section('Chi tiết sản phẩm')
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
						<li>Chi tiết sản phẩm</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<!--product details start-->
<div class="product_details mt-70 mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="product-details-tab">
					<div id="img-1" class="zoomWrapper single-zoom">
						<a href="#">
							<img id="zoom1" src="{{ $product_detail->image }}" data-zoom-image="{{ $product_detail->image }}" alt="big-1">
						</a>
					</div>
					<div class="single-zoom-thumb">
						<ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
							@foreach($image_product as $item)
							<li>
								<a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ $item->image }}" data-zoom-image="{{ $item->image }}">
									<img src="{{ $item->image }}" alt="zo-th-1"/>
								</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="product_d_right ml-5">
					<form>
						@csrf
						<input type="hidden" value="{{ $product_detail->id }}" class="cart_id_{{ $product_detail->id }}">
                        <input type="hidden" value="{{ $product_detail->name }}" class="cart_name_{{ $product_detail->id }}">
                        <input type="hidden" value="{{ $product_detail->image }}" class="cart_image_{{ $product_detail->id }}">
                        <input type="hidden" value="{{ $product_detail->price }}" class="cart_price_{{ $product_detail->id }}">
                        <!-- <input type="hidden" value="1" class="cart_quantity_{{ $product_detail->id }}"> -->
						<h1 style="color: green;">{{ $product_detail->name }}</h1>
						
						<div class="price_box">
							<p><span>Giá</span>:
							<span class="current_price">{{ number_format($product_detail->price) }}<sup>đ</sup></span>
							<!-- <span class="old_price"><sub>80.000<sup>đ</sup></sub></span> -->
							</p>
						</div>
						<div class="price_box">
							<?php $unit_product = DB::table('unit')->where('id',$product_detail->unit_id)->first(); ?>
							<p><span>Đơn vị tính</span>: {{ $unit_product->name }}</p>
						</div>
						<div class="price_box">
							@if($product_detail->status == 1)
							<p><span>Tình Trạng</span>: Còn hàng</p>
							@else
							<p><span>Tình Trạng</span>: Hết Hàng</p>
							@endif
						</div>
						<div class="product_desc">
							<p><span>Xuất xứ</span>: {{ $product_detail->origin }}</p>
						</div>
						<!-- <div class="product_variant color">
							<h3>Available Options</h3>
							<label>color</label>
							<ul>
								<li class="color1"><a href="#"></a></li>
								<li class="color2"><a href="#"></a></li>
								<li class="color3"><a href="#"></a></li>
								<li class="color4"><a href="#"></a></li>
							</ul>
						</div> -->
						<div class="product_variant quantity">
							<label>Số lượng</label>
							<input type="number" min="1" value="1" class="cart_quantity_{{ $product_detail->id }}">
							<br><br>
							<button class="button add_to_cart" name="add_to_cart" data-id ="{{ $product_detail->id }}" type="button">Thêm giỏ hàng</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>    
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info mb-65">
	<div class="container">   
		<div class="row">
			<div class="col-12">
				<div class="product_d_inner">   
					<div class="product_info_button">    
						<ul class="nav" role="tablist">
							<li >
								<a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Mô tả</a>
							</li>
							<!-- <li>
								<a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Bình luận</a>
							</li> -->
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="info" role="tabpanel" >
							<div class="product_info_content">
								<p>{{ $product_detail->description}}</p>
							</div>    
						</div>
						<div class="tab-pane fade" id="sheet" role="tabpanel" >
							<div class="product_d_table">
								<form action="#">
									<table>
										<tbody>
											<tr>
												<td class="first_child">Compositions</td>
												<td>Polyester</td>
											</tr>
											<tr>
												<td class="first_child">Styles</td>
												<td>Girly</td>
											</tr>
											<tr>
												<td class="first_child">Properties</td>
												<td>Short Dress</td>
											</tr>
										</tbody>
									</table>
								</form>
							</div>   
						</div>

						<div class="tab-pane fade" id="reviews" role="tabpanel" >
							<div class="reviews_wrapper">
								<h2>1 review for Donec eu furniture</h2>
								<div class="reviews_comment_box">
									<div class="comment_thmb">
										<img src="assets/img/blog/comment2.jpg" alt="">
									</div>
									<div class="comment_text">
										<div class="reviews_meta">
											<div class="star_rating">
												<ul>
													<li><a href="#"><i class="icon-star"></i></a></li>
													<li><a href="#"><i class="icon-star"></i></a></li>
													<li><a href="#"><i class="icon-star"></i></a></li>
													<li><a href="#"><i class="icon-star"></i></a></li>
													<li><a href="#"><i class="icon-star"></i></a></li>
												</ul>   
											</div>
											<p><strong>admin </strong>- September 12, 2018</p>
											<span>roadthemes</span>
										</div>
									</div>

								</div>
								<div class="comment_title">
									<h2>Add a review </h2>
									<p>Your email address will not be published.  Required fields are marked </p>
								</div>
								<div class="product_ratting mb-10">
									<h3>Your rating</h3>
									<ul>
										<li><a href="#"><i class="icon-star"></i></a></li>
										<li><a href="#"><i class="icon-star"></i></a></li>
										<li><a href="#"><i class="icon-star"></i></a></li>
										<li><a href="#"><i class="icon-star"></i></a></li>
										<li><a href="#"><i class="icon-star"></i></a></li>
									</ul>
								</div>
								<div class="product_review_form">
									<form action="#">
										<div class="row">
											<div class="col-12">
												<label for="review_comment">Your review </label>
												<textarea name="comment" id="review_comment" ></textarea>
											</div> 
											<div class="col-lg-6 col-md-6">
												<label for="author">Name</label>
												<input id="author"  type="text">

											</div> 
											<div class="col-lg-6 col-md-6">
												<label for="email">Email </label>
												<input id="email"  type="text">
											</div>  
										</div>
										<button type="submit">Submit</button>
									</form>   
								</div> 
							</div>     
						</div>
					</div>
				</div>     
			</div>
		</div>
	</div>    
</div>  
<!--product info end-->

<!--product area start-->
<section class="product_area related_products">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section_title">
					<h2>Sản Phẩm Liên Quan</h2>
				</div>
			</div>
		</div> 
		<div class="row">
			<div class="col-12">
				<div class="product_carousel product_column5 owl-carousel">
					@foreach($related_product as $item)
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
                                                <!-- <li class="quick_button" data-id ="{{ $item->id }}"><a id="quick_modal" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                 <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><span class="lnr lnr-sync"></span></a></li> -->
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
					@endforeach
				</div>
			</div>
		</div>  
	</div>
</section>
<!--product area end-->


@endsection