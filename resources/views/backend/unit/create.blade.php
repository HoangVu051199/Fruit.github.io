@extends('layouts.app_backend')
@section('title','Thêm danh mục')
@section('content')
<div class="content-body" style="min-height: 788px;">
   <div class="row page-titles mx-0">
      <div class="col p-md-0">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Thêm danh mục</a></li>
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
                     <form class="form-valide" action="{{ route('unit.store') }}" method="POST" novalidate="novalidate">
                        @csrf
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-username">Tên đơn vị tính <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input type="text" class="form-control" id="name" name="name" placeholder="Tên đơn vị tính..." aria-required="true" aria-describedby="val-username-error" aria-invalid="true">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('name'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Mô tả <span class="text-danger"></span>
                           </label>
                           <div class="col-lg-6">
                              <textarea class="form-control" id="description" name="description" rows="5" placeholder="Mô tả..."></textarea>
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('desciption'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('description') }}</small>
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