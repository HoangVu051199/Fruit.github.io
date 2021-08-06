@extends('layouts.app_backend')
@section('title', 'Đơn hàng')
@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Đơn hàng</a></li>
            </ol>
        </div>
    </div>
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @livewire('search-order')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
@endsection
