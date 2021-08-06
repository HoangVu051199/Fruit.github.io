@extends('layouts.app_backend')
@section('title','Thêm sản phẩm')
@section('content')
<div class="content-body" style="min-height: 788px;">
   <div class="row page-titles mx-0">
      <div class="col p-md-0">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Thêm sản phẩm</a></li>
         </ol>
      </div>
   </div>
   <!-- row -->
   <div class="container-fluid">
      <div class="row justify-content-center">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <div class="form-validation">
                     <form class="form-valide" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-skill">Danh mục sản phẩm <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <select class="form-control" id="val-skill" name="category_id" aria-required="true" aria-describedby="val-skill-error">
                                 <option value="">__Chọn danh mục__</option>
                                 @foreach($category as $item)
                                 @if($item->status == 1)
                                 <option value="{{ $item->id }}" style="text-transform: capitalize">{{ $item->name }}</option>
                                 @else
                                 {{ NULL }}
                                 @endif
                                 @endforeach
                              </select>
                              <div id="val-skill-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('category_id'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('category_id') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-username">Tên sản phẩm <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm..." aria-required="true" aria-describedby="val-username-error" aria-invalid="true">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('name'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-username">Ảnh <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input type="file" class="form-control" accept="image/*" id="customFile" name="image" aria-required="true" aria-describedby="val-username-error" aria-invalid="true">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('image'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('image') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-username">Giá <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input type="text" class="form-control" id="price" name="price" placeholder="Giá..." aria-required="true" aria-describedby="val-username-error" aria-invalid="true">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('price'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('price') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-skill">Đơn vị tính <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <select class="form-control" id="val-skill" name="unit_id" aria-required="true" aria-describedby="val-skill-error">
                                 <option value="">__Chọn đơn vị tính__</option>
                                 @foreach($unit as $item)
                                 <option value="{{ $item->id }}" style="text-transform: capitalize">{{ $item->name }}</option>
                                 @endforeach
                              </select>
                              <div id="val-skill-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('unit_id'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('unit_id') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-username">Xuất xứ <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input type="text" class="form-control" id="name" name="origin" placeholder="Xuất xứ..." aria-required="true" aria-describedby="val-username-error" aria-invalid="true">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('origin'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('origin') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Mô tả <span class="text-danger"></span>
                           </label>
                           <div class="col-lg-6">
                              <textarea class="form-control" id="description" name="description" rows="5" placeholder="Mô tả..."></textarea>
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('description'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('description') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-skill">Nổi bật <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <select class="form-control" id="val-skill" name="hot" aria-required="true" aria-describedby="val-skill-error">
                                 <option value="">__Chọn trạng thái__</option>
                                 <option value="0">Ẩn</option>
                                 <option value="1">Hiện</option>
                              </select>
                              <div id="val-skill-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('hot'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('hot') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-skill">Trạng thái <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <select class="form-control" id="val-skill" name="status" aria-required="true" aria-describedby="val-skill-error">
                                 <option value="">__Chọn trạng thái__</option>
                                 <option value="0">Ẩn</option>
                                 <option value="1">Hiện</option>
                              </select>
                              <div id="val-skill-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('status'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('status') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-lg-8 ml-auto">
                              <button type="submit" class="btn btn-primary">Lưu</button>
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