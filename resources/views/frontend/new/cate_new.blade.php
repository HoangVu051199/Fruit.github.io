@extends('layouts.app_frontend')
@section('title','Danh mục tin tức')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Tin Tức</h3>
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li>Danh mục tin tức</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!--blog area start-->
<div class="blog_page_section blog_reverse mt-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="blog_sidebar_widget">
                    <div class="widget_list widget_search">
                        <div class="widget_title">
                            <h3>Tìm kiếm</h3>
                        </div>
                        <form action="#">
                            <input placeholder="Search..." type="text">
                            <button type="submit">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="widget_list widget_categories">
                        <div class="widget_title">
                            <h3>Danh mục tin tức</h3>
                        </div>
                        <ul>
                            @foreach($cate_new as $item)
                            @if($item->status == 1)
                            <li><a href="{{ URL::to('cate-new-id', $item->slug) }}">{{ $item->name }}</a></li>
                            @else
                            {{ NULL }}
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget_list widget_post">
                        <div class="widget_title">
                            <h3>Bài đăng gần đây</h3>
                        </div>
                        @foreach($recent_posts as $item)
                        <div class="post_wrapper">
                            <div class="post_thumb">
                                <a href="{{ URL::to('new-detail', $item->slug) }}"><img style="width: 60px; height: 52px" src="{{ $item->image }}" alt=""></a>
                            </div>
                            <div class="post_info">
                                <h4><a href="{{ URL::to('new-detail', $item->slug) }}">{{ $item->title }}</a></h4>
                                <span>{{ $item->created_at }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="blog_wrapper blog_wrapper_sidebar">
                    <div class="row">
                        @foreach($cate_new_id as $item)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <article class="single_blog">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="{{ URL::to('/new-detail', $item->slug) }}"><img style="width:266px; height:165px;" src="{{ $item->image }}" alt=""></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <h4 class="post_title"><a href="{{ URL::to('/new-detail', $item->slug) }}">{{ $item->title }}</a></h4>
                                        <div class="articles_date">
                                            <p>{{ $item->created_at }} | <a href="#">Hoàng Vũ</a> </p>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--blog area end-->
<!--blog pagination area start-->
<div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-12 shop_toolbar t_bottom">
                <div class="pagination">
                    <ul>
                        {{ $cate_new_id->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>

<!--blog pagination area end-->
@endsection
