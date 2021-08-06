@extends('layouts.app_backend')
@section('title', 'Danh sách quyền')
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
                        <span class="mr-1">Danh Sách Quyền</span>
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
                                 <th scope="col">STT</th>
                                 <th scope="col">Tên quyền</th>
                                 <th scope="col">Mô tả</th>
                                 
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($permissions as $key => $item)
                              <tr>
                                 <th scope="row">{{ ++$key }}</th>
                                 <td>{{ $item->display_name }}</td>
                                 <td>{{ $item->description }}</td>
                                 <!-- <td>
                                    <span>
                                    <a href="{{ route('permissions.edit', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                                    <i class="fa fa-pencil color-muted m-r-5"></i>
                                    </a>
                                    <a href="{{ route('permissions.delete', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá">
                                    <i class="fa fa-close color-danger ml-3"></i>
                                    </a>
                                    </span>
                                 </td> -->
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     {{ $permissions->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection