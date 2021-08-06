@extends('layouts.app_backend')
@section('title', 'Danh sách vận chuyển')
@section('content')
<div class="row page-titles mx-0">
   <div class="col p-md-0">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
         <li class="breadcrumb-item active"><a href="javascript:void(0)">Vận chuyển</a></li>
      </ol>
   </div>
</div>
<div class="content-body">
   <div class="container-fluid mt-3">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="form-validation">
                     <form >
                        @csrf
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-skill">Tỉnh / Thành phố <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <select class="form-control choose provinces" id="provinces" name="provinces" aria-required="true" aria-describedby="val-skill-error">
                                 <option value="">__Chọn Tỉnh / Thành phố__</option>
                                 @foreach($provinces as $item)
                                 <option value="{{ $item->matp }}">{{ $item->name }}</option>
                                 @endforeach
                              </select>
                              <div id="val-skill-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('status'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('status') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-skill">Quận / Huyện <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <select class="form-control districts choose" id="districts" aria-required="true" aria-describedby="val-skill-error">
                                 <option value="">__Chọn Quận / Huyện__</option>
                              </select>
                              <div id="val-skill-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('status'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('status') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-skill">Phường / Xã <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <select class="form-control wards" id="wards" aria-required="true" aria-describedby="val-skill-error">
                                 <option value="">__Chọn Phường / Xã__</option>
                              </select>
                              <div id="val-skill-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('status'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('status') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-username">Phí vận chuyển <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input type="text" class="form-control feeship" id="feeship" name="feeship" placeholder="Phí vận chuyển" aria-required="true" aria-describedby="val-username-error" aria-invalid="true">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('name'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-lg-8 ml-auto">
                              <button type="button" name="add_delivery" class="btn btn-primary add_delivery">Thêm phí vận chuyển</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12">
            <div class="card">
               <div class="card-body">

                  <div>
                     <h4 class="card-title">
                        <span class="mr-1">Phí vận chuyển</span>
                        <div class="col-lg-3 float-right">
                           <input type="search" class="form-control rounded" placeholder="Tìm kiếm theo vị trí..." wire:model="searchTerm"
                              aria-label="Search Dashboard">
                        </div>
                     </h4>
                        <div id="load_delivery">
                                
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection