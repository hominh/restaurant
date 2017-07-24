@extends('fe.master')
@section('content')
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-2"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">Event</h3>
    </div>
</section>
<section class="section-blog section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-list">
                    @foreach($allEvent as $item)
                        <div class="post post-single">
                            <div class="post-media">
                                <div class="image-wrap">
                                    <img src="{!! asset('images/event/'.$item->avatar)  !!}" alt="{!! $item->name !!}">
                                </div>
                            </div>
                            <div class="post-body">
                                <div class="tags">
                                    <div class="tagcloud">

                                    </div>
                                </div>
                                <div class="post-title">
                                    <h3 clasas="xmd">{!! $item->name !!}</h3>
                                </div>
                                <div class="post-content">
                                    {!! $item->intro !!}
                                </div>
                                <div class="item-event-meta">
                                    <div class="date">
                                        <i class="icon awe_calendar"></i>
                                            {!! $item->datetime !!}
                                    </div>
                                    <div class="website">
                                        <i class="icon awe_link"></i>
                                        <a href="{!! $item->website !!}">Website</a>
                                    </div>
                                </div>
                                <div class="post-footer">
                                    <div class="awe-btn awe-btn-2 awe-btn-default text-uppercase">
                                        <a href="{!! URL('event',[$item->alias]) !!}.html" class="">Read</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
