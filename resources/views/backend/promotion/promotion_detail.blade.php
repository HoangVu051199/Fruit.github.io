@extends('layouts.app_backend')
@section('title', 'Chi tiết khuyến mãi')
@section('content')
<div class="row page-titles mx-0">
   <div class="col p-md-0">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
         <li class="breadcrumb-item active"><a href="javascript:void(0)">Chi tiết khuyến mãi</a></li>
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
                        <span class="mr-1">Chi tiết khuyến mãi</span>
                        
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
                                 <th scope="col">Tên sản phẩm</th>
                                 <th scope="col">Mức giảm</th>
                                 <th scope="col">Thời gian bắt đầu</th>
                                 <th scope="col">Thời gian kết thúc</th>
                                 <th scope="col">Thao tác</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($promotion_detail as $key => $item)
                              <tr>
                                 <th scope="row">{{++$key}}</th>
                                 <td>{{ $item->product->name }}</td>
                                 <td> 
                                    @if($item->promotion->type_sale == 0)
                                    {{ $item->promotion->sale }} % 
                                    @else
                                    {{ number_format($item->promotion->sale, 0,',','.') }} vnd
                                    @endif
                                 </td>
                                 <td>{{ $item->promotion->start }}</td>
                                 <td>{{ $item->promotion->finish }}</td>
                                 <td>
                                    <span>
                                    <a href="{{ URL::to('promotion/delete-promotion/'. $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá">
                                    <i class="fa fa-close color-danger ml-3"></i>
                                    </a>
                                    </span>
                                 </td>
                              </tr>
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
</div>
@endsection