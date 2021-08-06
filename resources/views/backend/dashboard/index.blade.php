@extends('layouts.app_backend')
@section('title','Dashboard')
@section('content')
<div class="content-body">
  @if(Auth::user()->hasRole(['admin']))
   <div class="container-fluid mt-3">
      <div class="row">
         <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
               <div class="card-body">
                  <h3 class="card-title text-white">Sản Phẩm</h3>
                  <div class="d-inline-block">
                     <h2 class="text-white">{{ $countProduct }}</h2>
                     <p class="text-white mb-0">{{ $dt }}</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="card gradient-8">
               <div class="card-body">
                  <h3 class="card-title text-white">Khuyến Mãi</h3>
                  <div class="d-inline-block">
                     <h2 class="text-white">{{ $count }}</h2>
                     <p class="text-white mb-0">{{ $dt }}</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-gift"></i></span>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
               <div class="card-body">
                  <h3 class="card-title text-white">Thành Viên</h3>
                  <div class="d-inline-block">
                     <h2 class="text-white">{{ $countUser }}</h2>
                     <p class="text-white mb-0">{{ $dt }}</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
               <div class="card-body">
                  <h3 class="card-title text-white">Bài Viết</h3>
                  <div class="d-inline-block">
                     <h2 class="text-white">{{ $countNew }}</h2>
                     <p class="text-white mb-0">{{ $dt }}</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
               </div>
            </div>
         </div>
         
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div>
                     <h4 class="card-title">
                        <span class="mr-1">Đơn hàng mới</span>
                        <!-- <a href="{{ route('permissions.create') }}" class="btn mb-1 btn-primary"><span class="btn-icon ml-2"><i class="fa fa-plus"></i></span>
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
                                 <th scope="col">Tên Khách Hàng</th>
                                 <th scope="col">Email</th>
                                 <th scope="col">Số điện thoại</th>
                                 <th scope="col">Trạng thái</th>
                                 <th scope="col">Thao tác</th>
                              </tr>
                           </thead>
                           <tbody>
                             
                           @foreach($confirmation as $key => $item)
                            @if($item->status == 0)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td style="text-transform: capitalize">{{ $item->customer_name }}</td>
                                <td>{{ $item->customer_email }}</td>
                                <td>{{ $item->customer_phone }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <span class="label gradient-1 btn-rounded">
                                        Chờ xử lý
                                    </span>
                                </td>
                                <td>
                                <span>
                                <a href="{{URL::to('order/edit', $item->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                </a>
                                <a href="{{ URL::to('order/show', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chi tiết">
                                <i class="fa fa-eye color-danger ml-3"></i>
                                </a>
                                </span>
                                </td>
                            </tr> 
                            @endif   
                        @endforeach
                              
                           </tbody>
                        </table>
                     </div>
                  
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
  @else
    <div class="container-fluid mt-3">
      <div class="row">
         <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
               <div class="card-body">
                  <h3 class="card-title text-white">Sản Phẩm</h3>
                  <div class="d-inline-block">
                     <h2 class="text-white">{{ $countProduct }}</h2>
                     <p class="text-white mb-0">{{ $dt }}</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="card gradient-8">
               <div class="card-body">
                  <h3 class="card-title text-white">Khuyến Mãi</h3>
                  <div class="d-inline-block">
                     <h2 class="text-white">{{ $count }}</h2>
                     <p class="text-white mb-0">{{ $dt }}</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-gift"></i></span>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
               <div class="card-body">
                  <h3 class="card-title text-white">Thành Viên</h3>
                  <div class="d-inline-block">
                     <h2 class="text-white">{{ $countUser }}</h2>
                     <p class="text-white mb-0">{{ $dt }}</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
               <div class="card-body">
                  <h3 class="card-title text-white">Bài Viết</h3>
                  <div class="d-inline-block">
                     <h2 class="text-white">{{ $countNew }}</h2>
                     <p class="text-white mb-0">{{ $dt }}</p>
                  </div>
                  <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
               </div>
            </div>
         </div>
         
         <!-- <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div>
                     <h4 class="card-title">
                        <span class="mr-1">Đơn hàng mới</span>
                        
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
                                 <th scope="col">Tên Khách Hàng</th>
                                 <th scope="col">Email</th>
                                 <th scope="col">Số điện thoại</th>
                                 <th scope="col">Trạng thái</th>
                                 <th scope="col">Thao tác</th>
                              </tr>
                           </thead>
                           <tbody>
                             
                           @foreach($confirmation as $key => $item)
                            @if($item->status == 0)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td style="text-transform: capitalize">{{ $item->customer_name }}</td>
                                <td>{{ $item->customer_email }}</td>
                                <td>{{ $item->customer_phone }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <span class="label gradient-1 btn-rounded">
                                        Chờ xử lý
                                    </span>
                                </td>
                                <td>
                                <span>
                                <a href="{{URL::to('order/edit', $item->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                </a>
                                <a href="{{ URL::to('order/show', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chi tiết">
                                <i class="fa fa-eye color-danger ml-3"></i>
                                </a>
                                </span>
                                </td>
                            </tr> 
                            @endif   
                        @endforeach
                              
                           </tbody>
                        </table>
                     </div>
                  
                  </div>
               </div>
            </div>
         </div> -->
      </div>

   </div>
  @endif
   <!-- #/ container -->
</div>
@endsection