@extends('layouts.app_backend')
@section('title','Thêm slider')
@section('content')
<div class="content-body" style="min-height: 788px;">
   <div class="row page-titles mx-0">
      <div class="col p-md-0">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Thêm slider</a></li>
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
                     <form class="form-valide" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
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
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Vị trí <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input name="position" class="form-control" placeholder="Vị trí...">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('position'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('position') }}</small>
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
                                 <option value="1">Hiển thị</option>
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
                              <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu dữ liệu</button>
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