@extends('fe.master')
@section('content')
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-2"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">About</h3>
    </div>
</section>
<section id="about-story" class="about-story section">
    <div class="divider divider-2"></div>
    <div class="container">
        <div class="block-first">
            <div class="row">
                <div class="col-md-4">
                    <div class="image-wrap">
                    </div>
                    <img src="{!! asset('images/post/'.$post_about[0]->image)  !!}" alt="{!! $post_about[0]->name !!}">
                </div>
                <div class="col-md-7 col-md-offset-1">
                    <h4 class="lg text-uppercase">{!! $post_about[0]->name !!}</h4>
                    <p>{!! $post_about[0]->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="milestones" class="milestones section">
    <div class="awe-color"></div>
    <div class="awe-pattern"></div>
    <div class="section-heading text-center">
        <div class="ribbon ribbon-4">
            <h2 class="sm">milestones</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="milestones-slider">
                @foreach($histories as $item)
                    <div class="milestones-item text-center">
                        <div class="image-wrap">
                            <img src="{!! asset('images/history/'.$item->image)  !!}" alt="{!! $item->content !!}">
                        </div>
                        <div class="item-body">
                            <span class="time">{!! $item->year !!}</span>
                            <p>{!! $item->content !!}</p>
                        </div>
                    </div>
                @endforeach()
            </div>
        </div>
    </div>
</section>
<section id="testimonial" class="testimonial testimonial-2 section">
    <div class="divider divider-2"></div>
    <div class="container">
        <div class="testimonial-slider text-center">
            @foreach($milestones as $item)
                <div class="item">
                    <div class="icon-head">
                        <i class="icon awe_quote_left"></i>
                    </div>
                    <blockquote>
                        <p>{!! $item->name !!}</p>
                        <span>{!! $item->content !!}</span>
                        <div class="test-footer">
                            <span class="sm">{!! $item->author !!}</span>
                        </div>
                    </blockquote>
                </div>
            @endforeach()
        </div>
    </div>
</section>
<section id="the-staff" class="the-staff section">
    <div class="section-heading text-center">
         <div class="awe-parallax bg-4"></div>
         <div class="awe-overlay"></div>
         <div class="awe-title awe-title-3">
             <h3 class="lg text-uppercase">The staff</h3>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="staff-slider">
                    @foreach($employees as $item)
                        <div class="staff-item">
                            <div class="staff-heading">
                                <div class="image-wrap">
                                    <img src="{!! asset('images/employee/'.$item->photo)  !!}" alt="">
                                </div>
                                <div class="staff-social">
                                    <a href="{!! $item->facebook_url !!}"><i class="fa fa-facebook"></i></a>
                                    <a href="{!! $item->twitter_url !!}"><i class="fa fa-twitter"></i></a>
                                    <a href="{!! $item->tumblr_url !!}"><i class="fa fa-tumblr"></i></a>
                                </div>
                            </div>
                            <div class="staff-info">
                                <h4 class="staff-name sm">{!! $item->firstname !!} {!! $item->lastname !!}</h4>
                                <span class="staff-work">{!! $item->name !!}</span>
                            </div>
                            <div class="staff-body">
                                <p>{!! $item->note !!}</p>
                            </div>
                        </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
