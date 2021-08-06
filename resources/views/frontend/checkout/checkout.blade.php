@extends('layouts.app_frontend')
@section('title', 'Thanh toán')
@section('content')
	<!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                       <h3>Thanh Toán</h3>
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li>Thanh Toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--Checkout page section-->
    <div class="Checkout_section mt-70">
       <div class="container">
            <div class="checkout_form">
                <form  action="{{ URL::to('order-confirm') }}" method="POST">
                        @csrf
                <div class="row">
                    
                    <div class="col-lg-6 col-md-6">
                            
                            <h3>Thông tin nhận hàng</h3>
                            <div class="row">

                                <div class="col-lg-6 mb-20">
                                    <label>Họ và tên <span>*</span></label>
                                    <input type="text" class="form-control customer_name" name="customer_name"  placeholder="Họ và tên">
                                    <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('customer_name'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('customer_name') }}</small>
                                 @endif
                              </div>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Số điện thoại  <span>*</span></label>
                                    <input type="text" class="form-control customer_phone" name="customer_phone" placeholder="Số điện thoại" > 
                                    <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('customer_phone'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('customer_phone') }}</small>
                                 @endif
                              </div>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Email <span>*</span></label>
                                    <input type="text" class="form-control customer_email" name="customer_email" placeholder="Email" >  
                                    <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('customer_email'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('customer_email') }}</small>
                                 @endif
                              </div>   
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="country">Tỉnh / Thành Phố <span>*</span></label>
                                    <select class="form-select choose provinces" name="provinces" id="provinces" >
                                        <option value="">__Chọn Tỉnh / Thành phố__</option>
                                        @foreach($provinces as $item)
                                       <option value="{{ $item->matp }}">{{ $item->name }}</option> 
                                       @endforeach     
                                    </select>
                                    <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('provinces'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('provinces') }}</small>
                                 @endif
                              </div>
                                </div>                          
                                <div class="col-12 mb-20">
                                    <label for="country">Quận / Huyện <span>*</span></label>

                                    <select class="form-select districts choose" name="districts" id="districts" > 
                                          <option value="">__Chọn Quận / Huyện__</option>
                                    </select> 
                                    <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('districts'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('districts') }}</small>
                                 @endif
                              </div>  
                                </div> 
                                 <div class="col-12 mb-20">
                                    <label for="country">Phường / Xã <span>*</span></label>
                                    <select class="form-select wards calculate_delivery" name="wards" id="wards" > 
                                            <option value="">__Chọn Phường / Xã__</option>
                                    </select> 
                                    <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('wards'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('wards') }}</small>
                                 @endif
                              </div>  
                                </div>   
                                <div class="col-12 mb-20">
                                    <label>Địa chỉ giao hàng  <span>*</span></label>
                                    <input class="form-control customer_address" placeholder="Số nhà, Tên đường" name="customer_address" type="text" >
                                    <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('customer_address'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('customer_address') }}</small>
                                 @endif
                              </div>     
                                </div>
                                
                                <div class="col-12">
                                    <div class="order-notes">
                                         <label for="order_note">Ghi chú</label>
                                        <textarea name="customer_note" class="customer_note" id="textarea" placeholder="Ghi chú khác của quý khách"></textarea>
                                    </div>   
                                </div>     	    	    	    	    	    	  
                            </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                            <h3>Đơn hàng của bạn</h3> 
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="padding-left: 50px; width: 60%;">Sản phẩm</th>
                                            <th style="padding-left: 100px;width: 40%;">Tạm tính</th>
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
                                            <td><span>{{ $value['product_name']}} <strong > × {{ $value['product_quantity'] }}</strong></span> </td>
                                            <td style="padding-left: 100px;">
                                        {{ number_format($subtotal,0,',','.') }}đ
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><span><strong>Thành tiền :</strong></span></th>
                                            <td style="padding-left: 100px;">{{ number_format($total, 0,',','.') }}đ</td>
                                        </tr>
                                        <tr id="load_delivery">
                                           
                                        </tr>
                                        <tr id="order_total">
                                            <!-- <th><span><strong>Tổng tiền :</strong></span></th>
                                            <td><strong style="color: #ff9600;padding-left: 100px;">
                                                
                                                @if(Session::get('fee'))
                                                {{number_format($total += Session::get('fee'),0,',','.')}}đ
                                                @else
                                                    {{number_format($total += Session::get('fee'),0,',','.')}}đ
                                                @endif
                                                
                                            </strong></td> -->
                                        </tr>
                                    </tfoot>
                                </table>     
                            </div>
                            <div class="payment_method">
                               <!-- <div class="panel-default">
                               		<label>
                               		Phương thức thanh toán:
                               		</label>
                                    <input id="payment" value="0" name="check_method" type="radio" data-target="createp_account" checked />
                                    <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">COD</label>
                                    <input id="payment" value="1" name="check_method" type="radio" data-target="createp_account" />
                                    <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">PAYPAL</label>
                                    <div>
                                        @php
                                            $vnd_to_usd = $total/23023;
                                        @endphp
                                        <div id="paypal-button"></div>
                                        <input type="hidden" id="vnd_to_usd" value="{{ round($vnd_to_usd, 2) }}">
                                    </div>
                                </div>  -->
                                <div class="order_button">
                                    <button  type="submit" name="payment_method" class="order_confirm" id="payment" value="0">Thanh toán khi nhận hàng</button>
                                    <button  type="submit" name="payment_method" value="1" class="payment_online">Thanh toán online</button> 
                                </div>    
                            </div>  
                    </div>
                    
                </div> 
                </form>
            </div> 
        </div>       
    </div>
    <!--Checkout page section end-->
@endsection