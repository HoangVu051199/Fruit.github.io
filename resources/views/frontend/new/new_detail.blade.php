@extends('layouts.app_frontend')
@section('title','Chi tiết tin tức')
@section('content')
        <!--blog body area start-->
    <div class="blog_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_search">
                            <div class="widget_title">
                                <h3>Search</h3>
                            </div>
                            <form action="#">
                                <input placeholder="Search..." type="text">
                                <button type="submit">search</button>
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
                    <!--blog grid area start-->
                    <div class="blog_wrapper blog_wrapper_details">
                        <article class="single_blog">
                            <figure>
                               <div class="post_header">
                                   <h3 class="post_title">{{ $new_detail->title }}</h3>
                                    <div class="blog_meta">   
                                       <p>Posted by : <a href="#">admin</a> / On : <a href="#">{{ $new_detail->created_at }}</a> / In : <a href="#">Company, Image, Travel</a></p>                                     
                                    </div>
                                </div>
                                <div class="blog_thumb">
                                   <a href="#"><img src="{{ $new_detail->image }}" alt=""></a>
                               </div>
                               <figcaption class="blog_content">
                                    <div class="post_content">
                                        <p>{{ $new_detail->content }}</p>
                                    </div>
                               </figcaption>
                            </figure>
                        </article>
                        <div class="related_posts">
                           <h3>Bài đăng liên quan</h3>
                            <div class="row">
                                @foreach($related_new as $item)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_related">
                                        <figure>
                                            <div class="related_thumb">
                                                <a href="{{ URL::to('new-detail', $item->slug) }}"><img src="{{ $item->image }}" alt=""></a>
                                            </div>
                                            <figcaption class="related_content">
                                               <h4><a href="{{ URL::to('new-detail', $item->slug) }}">{{ $item->title }}</a></h4>
                                               <div class="blog_meta">                                        
                                                    <span class="author">By : <a href="#">admin</a> / </span>
                                                    <span class="meta_date"> {{ $item->created_at }} </span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                       </div> 
                        <!-- <div class="comments_box">
                            <h3>3 Comments  </h3>
                            <div class="comment_list">
                                <div class="comment_thumb">
                                    <img src="assets/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">Admin</a></h5>
                                        <span>October 16, 2018 at 1:38 am</span> 
                                    </div>
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure</p>
                                    <div class="comment_reply">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>

                            </div>
                            <div class="comment_list list_two">
                                <div class="comment_thumb">
                                    <img src="assets/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">Demo</a></h5>
                                        <span>October 16, 2018 at 1:38 am</span> 
                                    </div>
                                    <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur</p>
                                    <div class="comment_reply">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="comment_list">
                                <div class="comment_thumb">
                                    <img src="assets/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">Admin</a></h5>
                                        <span>October 16, 2018 at 1:38 am</span> 
                                    </div>
                                    <p>Quisque orci nibh, porta vitae sagittis sit amet, vehicula vel mauris. Aenean at</p>
                                    <div class="comment_reply">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comments_form">
                            <h3>Leave a Reply </h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form action="#">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="review_comment">Comment </label>
                                        <textarea name="comment" id="review_comment" ></textarea>
                                    </div> 
                                    <div class="col-lg-4 col-md-4">
                                        <label for="author">Name</label>
                                        <input id="author"  type="text">

                                    </div> 
                                    <div class="col-lg-4 col-md-4">
                                        <label for="email">Email </label>
                                        <input id="email"  type="text">
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <label for="website">Website </label>
                                        <input id="website"  type="text">
                                    </div>   
                                </div>
                                <button class="button" type="submit">Post Comment</button>
                             </form>    
                        </div> -->
                    </div>
                    <!--blog grid area start-->
                </div>
            </div>
        </div>
    </div>
    <!--blog section area end-->


@endsection
