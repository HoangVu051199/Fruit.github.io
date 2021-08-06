@extends('layouts.app_backend')
@section('title', 'Danh sách vai trò')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Vai trò</a></li>
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
                                <span class="mr-1">Vai trò</span>/
                                <a href="{{ route('roles.create') }}" class="btn mb-1 btn-primary">Thêm<span class="btn-icon ml-2"><i class="fa fa-plus"></i></span>
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
                                          <th scope="col">STT</th>
                                          <th scope="col">Tên vai trò</th>
                                          <th scope="col" width="540px">Danh sách quyền</th>
                                          <th scope="col" width="250px">Mô tả</th>
                                          <th scope="col">Thao tác</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                     @foreach($roles as $key => $role)
                                     <tr>
                                      <th scope="row">{{ ++$key }}</th>
                                      <td>{{ $role->display_name }}</td>
                                      <td>
                                        @foreach($role->permissionsRole as $item )
                                          <span class="badge badge-pill badge-danger mt-1">{{ $item->display_name }}</span>
                                        @endforeach
                                      </td>
                                      <td>{{ $role->description }}</td>
                                        <td>
                                            <span>
                                                <a href="{{ route('roles.edit', $role->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                                                    <i class="fa fa-pencil color-muted m-r-5"></i>
                                                </a>
                                                <a href="{{ route('roles.delete', $role->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá">
                                                    <i class="fa fa-close color-danger ml-3"></i>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $roles->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
