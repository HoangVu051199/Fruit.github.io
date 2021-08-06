@extends('layouts.app_backend')
@section('title','Dashboard')
@section('content')

<div class="row page-titles mx-0">
   <div class="col p-md-0">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
         <li class="breadcrumb-item active"><a href="javascript:void(0)">Quyền</a></li>
      </ol>
   </div>
</div>
<div class="content-body">
   <div class="container-fluid mt-3">
      <div class="row">
         
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div>
                     <h4 class="card-title">
                        <span class="mr-1">Chi tiết sản phẩm</span>
                        <!-- <a href="{{ route('permissions.create') }}" class="btn mb-1 btn-primary">Thêm<span class="btn-icon ml-2"><i class="fa fa-plus"></i></span>
                        </a> -->
                        <div class="col-lg-3 float-right">
                           <input type="search" class="form-control rounded" placeholder="Tìm kiếm theo vị trí..." wire:model="searchTerm"
                              aria-label="Search Dashboard">
                        </div>
                     </h4>
                     <div class="table-responsive">
                        <table class="table header-border table-hover verticle-middle">
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
                                @foreach($order_detail as $item)
                                    @php
                                        $subtotal = $item->product_price*$item->product_quantity;
                        $feeship = str_replace("đ","",$item->product_feeship);
                        $feeship = str_replace(".","",$feeship);
                        
                        $total +=$subtotal;
                                        

                                    @endphp
                                    <tr>
                                        <td class="product_code">
                                         {{ $item->order_code }}   
                                        </td>
                                        <td class="product_thumb">
                                        <img class="img-thumbnail" width="70px" src="{{ $item->product->image }}" alt=""></td>
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
                        <div class="cart_submit" style="margin-left: 750px;">
                                <p>Phí vận chuyển : {{number_format($feeship, 0,',','.')}}đ</p>
                                <p>Tổng tiền: {{number_format($total+=$feeship, 0,',','.')}}đ</p>
                            </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </div>
</div>


@endsection
