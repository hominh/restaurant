@extends('fe.master')
@section('title',$post[0]->name)
@section('content')
    <section class="section-blog section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-single">
                        <ul class="breadcrumb">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Recipes</a></li>
                            <li><span>{!! $post[0]->name !!}</span></li>
                        </ul>

                        <div class="post post-single">
                            <div class="post-media">
                                <div class="image-wrap">
                                    <img src="{!! asset('images/post/'.$post[0]->image)  !!}" alt="">
                                </div>
                            </div>
                            <div class="post-body">
                                <div class="post-title">
                                    <h3 class="xmd">{!! $post[0]->name !!}</h3>
                                </div>
                                <div class="meta-info">
                                    <!--<span><i class="icon awe_pie_chart"></i>2serves</span>
                                    <span><i class="icon awe_clock_2"></i>15 mins cooking</span>!-->
                                    <span><i class="icon awe_user"></i>By <a href="#">Anna Molly</a></span>
                                </div>
                                <div class="post-content">
                                    {!! $post[0]->content !!}
                                </div>
                            </div>

                            <div class="share-tags">
                                <div class="share-box">
                                    <h5 class="sm">Share</h5>
                                    <div class="share">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="tag-box fr">
                                    <h5 class="sm">Tag</h5>
                                    <div class="tag">
                                        @foreach($tagsByPostId as $item)
                                            <a href="{!! URL('tag',[$item->alias]) !!}.html">{!! $item->name !!}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="about-author">
                                <div class="image-thumb fl">
                                    <img src="{!! asset('images/avatar/'.$post[0]->uimage)  !!}" alt="{!! $post[0]->uname !!}">
                                </div>
                                <div class="author-info">
                                    <div class="author-name">
                                        <h4 class="xmd text-capitalize">{!! $post[0]->uname !!}</h4>
                                    </div>
                                    <div class="author-content">
                                        <p>{!! $post[0]->about !!}</p>
                                    </div>
                                </div>
                                <div class="author-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                            <div id="comments">
                                <div class="comments-inner-wrap">
                                    <h3 id="comments-title" class="xmd text-capitalize">{!! count($comments) !!} Comments</h3>
                                    <ul class="commentlist">
                                        @foreach($comments as $item)
                                            <li class="comment">
                                                <div class="comment-box">
                                                    <div class="comment-author">
                                                        <a href="#"><img src="{!! asset('images/avatar/noimage.png')  !!}" alt="{!! $item->name !!}"></a>
                                                    </div>
                                                    <div class="comment-body">
                                                        <cite class="fn"><a href="#">{!! $item->name !!}</a></cite>
                                                        <p>{!! $item->content !!}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>
                            </div>
                            <div id="respond">
                                <div class="reply-title">
                                    <h3 class="xmd text-capitalize">Leaver your comment</h3>
                                </div>
                                <form method="POST" action="" id="comment" name="comment">
                                    <input type="hidden" name="hidden" value="{!! $post[0]->id !!}" />
                                    <meta name="_token" content="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-item form-textarea">
                                                <textarea name="content" id="content"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-item form-name">
                                                <input type="text" placeholder="Your Name" name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-item form-email">
                                                <input type="text" placeholder="Your Email" name="email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-actions">
                                                <input type="submit" value="Post this comment" class="awe-btn awe-btn-2 awe-btn-default text-uppercase" id="submit_comment">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <aside class="sidebar">
                        <!--<div class="widget widget_search">
                            <h4 class="sm text-uppercase">Search</h4>
                            <form>
                                <input type="text" name="search" placeholder="Type keyword">
                            </form>
                        </div>!-->
                        <div class="widget widget_recent_entries">
                            <h4 class="sm text-uppercase">Recent posts</h4>
                            <ul>
                                @foreach($recentposts as $item)
                                    <li>
                                        <a href="{!! URL('post',[$item->alias]) !!}.html">{!! $item->name !!}</a>
                                    </li>
                                @endforeach()
                            </ul>
                        </div>
                        <div class="widget widget_instagram">
                            <h4 class="sm text-uppercase">Instagram</h4>
                            <div class="instagram">
                                <a href="#"><img src="images/blog/img-5.jpg" alt=""></a>
                                <a href="#"><img src="images/blog/img-9.jpg" alt=""></a>
                                <a href="#"><img src="images/blog/img-10.jpg" alt=""></a>
                                <a href="#"><img src="images/blog/img-11.jpg" alt=""></a>
                                <a href="#"><img src="images/blog/img-10.jpg" alt=""></a>
                                <a href="#"><img src="images/blog/img-11.jpg" alt=""></a>
                                <a href="#"><img src="images/blog/img-5.jpg" alt=""></a>
                                <a href="#"><img src="images/blog/img-9.jpg" alt=""></a>
                                <a href="#"><img src="images/blog/img-11.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="widget widget_latest_comments">
                            <h4 class="sm text-uppercase">Latest comments</h4>
                            <ul>
                                @foreach($lastestcomments as $item)
                                    <li>
                                        <div class="image-wrap">
                                            <img src="{!! asset('images/avatar/noimage.png')  !!}" alt="{!! $item->name !!}">
                                        </div>
                                        <div class="comment-info">
                                            <span class="author">{!! $item->name !!}</span>
                                            <a href="#">{!! $item->content !!}</a>
                                            <div class="meta">
                                                <span>{!! $item->created_at !!}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach()
                            </ul>
                        </div>
                        <div class="widget widget_categories">
                           <h4 class="sm text-uppercase">Categories</h4>
                           <ul>
                               <li><a href="#">Cras condimentum</a></li>
                               <li><a href="#">Nibh et pellentesque</a></li>
                               <li><a href="#">Leo nibh gravida velit</a></li>
                               <li><a href="#">Tortor augue a eros</a></li>
                               <li><a href="#">Libero</a></li>
                           </ul>
                       </div>
                        <div class="widget widget_tag_cloud">
                            <h4 class="sm text-uppercase">Tag cloud</h4>
                            <div class="tagcloud">
                                @foreach($tags as $item)
                                    <a href="{!! URL('tag',[$item->alias]) !!}.html">{!! $item->name !!}</a>
                                @endforeach()
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
