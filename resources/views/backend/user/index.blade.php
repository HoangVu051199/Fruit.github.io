@extends('layouts.app_backend')
@section('title', 'User')
@section('content')
<div class="row page-titles mx-0">
   <div class="col p-md-0">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
         <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
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
                        <span class="mr-1">User</span>/
                        <a href="{{ route('users.create') }}" class="btn mb-1 btn-primary">Thêm<span class="btn-icon ml-2"><i class="fa fa-plus"></i></span>
                        </a>
                        <div class="col-lg-3 float-right">
                           <input type="search" class="form-control rounded" placeholder="Tìm kiếm theo vị trí..." wire:model="searchTerm"
                              aria-label="Search Dashboard">
                        </div>
                     </h4>
                     <div class="table-responsive">
                        <table class="table header-border table-hover verticle-middle">
                           <thead>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Image</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Email</th>
                                 <th scope="col">Phone</th>
                                 <th scope="col">Vai trò</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($users as $key => $item)
                              <tr>
                                 <th scope="row">{{ ++$key }}</th>
                                 <td><img class="img-thumbnail" width="100px" src="{{ $item->avatar }}"></td>
                                 <td>{{ $item->name }}</td>
                                 <td>{{ $item->email }}</td>
                                 <td>{{ $item->phone }}</td>
                                 <td>{{ $item->roles()->pluck('display_name')->implode(' ') }}</td>
                                 <td>
                                    @if($item->status == 0)
                                    <span>Đã khoá</span>
                                    @else
                                    <span>Hoạt động</span>
                                    @endif
                                 </td>
                                 <td>
                                    <span>
                                    <a href="{{ route('users.edit', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                                    <i class="fa fa-pencil color-muted m-r-5"></i>
                                    </a>
                                    <a href="{{ route('users.delete', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá">
                                    <i class="fa fa-close color-danger ml-3"></i>
                                    </a>
                                    </span>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     {{ $users->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection