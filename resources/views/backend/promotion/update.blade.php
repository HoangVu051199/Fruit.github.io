@extends('layouts.app_backend')
@section('title','Sửa khuyến mãi')
@section('content')
<div class="content-body" style="min-height: 788px;">
   <div class="row page-titles mx-0">
      <div class="col p-md-0">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Sửa khuyến mãi</a></li>
         </ol>
      </div>
   </div>
   {!! Toastr::message() !!}
   <!-- row -->
   <div class="container-fluid">
      <div class="row justify-content-center">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <div class="form-validation">
                     <form class="form-valide" action="{{ route('promotion.update', $promotion->id)}}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Tên khuyến mãi <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input name="name" class="form-control" placeholder="Tên khuyến mãi" value="{{ $promotion->name }}">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('name'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Mức giảm <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-3">
                              <select class="form-control" name="type_sale">
                                 @if($promotion->type_sale == 0)
                                 <option value="0" selected>Giảm theo %</option>
                                 <option value="1">Giảm theo số tiền</option>
                                 @else
                                 <option value="0">Giảm theo %</option>
                                 <option value="1" selected>Giảm theo số tiền</option>
                                 @endif
                              </select>
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('type_sale'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('type_sale') }}</small>
                                 @endif
                              </div>
                           </div>
                           <div class="col-lg-3">
                              @if($promotion->type_sale == 0)
                              <input name="sale" value="{{ $promotion->sale }}" class="form-control" placeholder="( % or vnd )">
                              @else
                                 <input name="sale" value="{{ $promotion->sale }} vnd" class="form-control" placeholder="( % or vnd )">
                              @endif
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('sale'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('sale') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Thời gian bắt đầu <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input class="form-control" value="{{ date( 'Y-m-d\TH:i:s', strtotime($promotion->start)) }}" name="start" type="datetime-local" id="example-datetime-local-input">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('start'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('start') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Thời gian kết thúc <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input class="form-control"  value="{{ date( 'Y-m-d\TH:i:s', strtotime($promotion->finish)) }}" name="finish" type="datetime-local" id="example-datetime-local-input">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('finish'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('finish') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>

                        @foreach($category as $cate)
                        <div class="cards list-group" style="margin-top: -20px;">
                           <h4 class="card-title list-group-item active">
                              <label>
                              <input type="checkbox" value="" class="checkbox_wrapper ml-1 mr-2">
                              </label>
                              {{ $cate->name }}
                           </h4>
                           <div class="basic-form list-group-item">
                              <div class="form-group">
                                 @foreach($cate->product as $item)
                                 <div class="form-check form-check-inline col-lg-3">
                                    <label class="form-check-label mt-3">
                                    <input type="checkbox" class="form-check-input checkbox_childrent" value="{{ $item->id }}" name="product_id[]" 
                        <?php foreach ($promotion_detail as $key => $value) { 
                                    ?>
                                    {{ $value->product_id == $item->id ? 'checked' : '' }}
                                   <?php } ?>> 
                                   {{ $item->name }}
                                    </label>
                                 </div>
                                 @endforeach
                                 <br/>
                              </div>
                           </div>
                        </div>
                        @endforeach
                  
                        <div class="form-group row">
                           <div class="col-lg-8 ml-auto">
                              <input type="button" class="btn btn-primary mt-3" id="btn1" value="Chọn tất cả"/>
                        <input type="button" class="btn btn-danger mt-3 ml-2" id="btn2" value="Huỷ tất cả"/>
                              <button type="submit" class="btn btn-primary mt-3 ml-2"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu dữ liệu</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- #/ container -->
</div>
@endsection