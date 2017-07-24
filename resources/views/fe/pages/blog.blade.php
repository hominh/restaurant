@extends('fe.master')
@section('title','Blog')
@section('content')
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-2"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">Blog</h3>
    </div>
</section>

<section class="section-blog section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-list">
                    @foreach($allpost as $item)
                        <div class="post post-single">
                            <div class="post-media">
                                <div class="image-wrap">
                                    <img src="{!! asset('images/post/'.$item->image)  !!}" alt="{!! $item->pname !!}">
                                </div>
                            </div>
                            <div class="post-body">
                                <!--<div class="tags">
                                    <div class="tagcloud">
                                        <a href="#">Tag o day1111</a>
                                    </div>
                                </div>!-->
                                <div class="post-title">
                                    <h3 class="xmd"><a href="{!! URL('post',[$item->alias]) !!}.html">{!! $item->pname !!}</a></h3>
                                </div>
                                <div class="post-content">
                                    <p>{!! $item->description !!}</p>
                                </div>
                                <div class="post-footer">
                                    <a href="{!! URL('post',[$item->alias]) !!}.html" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">Read</a>
                                </div>
                            </div>
                        </div>
                    @endforeach()





                </div>
                <div class="pagination">
                    @if ($allpost->lastPage() > 1)




                            @for ($i = 1; $i <= $allpost->lastPage(); $i++)
                                    <!--<span class="{{ ($allpost->currentPage() == 1) ? ' current' : '' }}">1</span>!-->
                                    <a class="{{ ($allpost->currentPage() == $i) ? ' active' : '' }}"  href="{{ $allpost->url($i) }}">{{ $i }}</a>

                            @endfor

                        <
                    @endif
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
