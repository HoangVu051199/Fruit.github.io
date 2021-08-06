@extends('layouts.app_backend')
@section('title','Cập nhật user')
@section('content')
<div class="content-body" style="min-height: 788px;">
   <div class="row page-titles mx-0">
      <div class="col p-md-0">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Cập nhật user</a></li>
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
                     <form class="form-valide" action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-username">Avatar<span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input type="file" class="form-control" accept="image/*" id="customFile" name="image" aria-required="true" aria-describedby="val-username-error" aria-invalid="true">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('avatar'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('avatar') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Tên <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input name="name" value="{{ $users->name }}" class="form-control" placeholder="Tên">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('name'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Email <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input type="email" value="{{ $users->email }}" name="email" class="form-control" placeholder="Email">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('email'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('email') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Password <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('password'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('password') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Confirm Password<span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input type="password" name="password_confirmation" class="form-control" placeholder="Mật khẩu">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('password_confirmation'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('password_confirmation') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Phone <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input name="phone" value="{{ $users->phone }}" class="form-control" placeholder="Phone">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('phone'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('phone') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-suggestions">Birthday <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <input type="date" value="{{ $users->birthday }}" name="birthday" class="form-control" placeholder="Ngày sinh">
                              <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('birthday'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('birthday') }}</small>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="form-group row is-invalid">
                           <label class="col-lg-4 col-form-label" for="val-skill">Vai trò <span class="text-danger">*</span>
                           </label>
                           <div class="col-lg-6">
                              <select class="form-control" id="val-skill" name="role_id" aria-required="true" aria-describedby="val-skill-error">
                                 <option value="">__Chọn vai trò__</option>
                                 @if($roles)
                                 @foreach($roles as $item)
                                 <option value="{{ $item->id }}" {{ old('roles', isset($listRoleUser->role_id) ? $listRoleUser->role_id : '') == $item->id ? 'selected = selected' : '' }}>{{ $item->display_name }}</option>
                                 @endforeach
                                 @endif
                              </select>
                              <div id="val-skill-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                 @if($errors->first('role_id'))
                                 <small id="emailHelp" class="form-text text-danger">{{ $errors->first('role_id') }}</small>
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
                                 @if($users->status == 0)
                                 <option value="0" selected>Đã khoá</option>
                                 <option value="1">Hoạt động</option>
                                 @else
                                 <option value="0">Đã khoá</option>
                                 <option value="1" selected>Hoạt động</option>
                                 @endif
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
                              <button type="submit" name="submit" value="{{ isset($users) ? 'update' : '' }}" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu dữ liệu</button>
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