@extends('layouts.app_backend')
@section('title', 'Danh sách khuyến mãi')
@section('content')
<div class="row page-titles mx-0">
   <div class="col p-md-0">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
         <li class="breadcrumb-item active"><a href="javascript:void(0)">Khuyến mãi</a></li>
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
                        <span class="mr-1">Khuyến mãi</span>/
                        <a href="{{ route('promotion.create') }}" class="btn mb-1 btn-primary">Thêm<span class="btn-icon ml-2"><i class="fa fa-plus"></i></span>
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
                                 <th scope="col">Tên chương trình</th>
                                 <th scope="col">Mức giảm</th>
                                 <th scope="col">Thời gian bắt đầu</th>
                                 <th scope="col">Thời gian kết thúc</th>
                                 <th scope="col">Trạng thái</th>
                                 <th scope="col">Thao tác</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($promotion as $key => $item)
                              <tr>
                                 <th scope="row">{{++$key}}</th>
                                 <td>{{ $item->name }}</td>
                                 <td>
                                    @if($item->type_sale == 0)
                                    {{ $item->sale }} %
                                    @else
                                    {{ number_format($item->sale, 0,',','.') }} vnd
                                    @endif
                                 </td>
                                 <td>{{ $item->start }}</td>
                                 <td>{{ $item->finish }}</td>
                                 <td>
                                    @if($item->status == 0)
                                       Đã hết hạn
                                    @else      
                                       Đang khuyến mãi
                                    @endif
                                 </td>
                                 <td>
                                    <span>
                                    <a href="{{ route('promotion.show', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xem">
                                    <i class="fa fa-eye color-muted m-r-5"></i>
                                    </a>
                                    <a href="{{ route('promotion.edit', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa">
                                    <i class="fa fa-pencil color-muted m-r-5 ml-3"></i>
                                    </a>
                                    <a href="{{ route('promotion.delete', $item->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xoá">
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