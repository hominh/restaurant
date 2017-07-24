@extends('fe.master')
@section('title',$configs[0]->value)
@section('description',$configs[1]->value)
@section('keyword',$configs[2]->value)
@section('content')
<section id="home-media" class="home-media section">
    <div class="home-fullscreen tb">
        <ul class="home-slider" data-background="awe-parallax">
            @foreach($slides as $item)
                <li>
                    <div class="image-wrap">
                        <img src="{!! asset('images/slide/'.$item->image)  !!}" alt="{!! $item->title !!}">
                    </div>
                    <div class="slider-content text-center">
                        <h5 class="sm text-uppercase">{!! $item->title  !!}</h5>
                        <h1 class="fittext sbig text-uppercase">{!! $item->description !!}</h1>
                        <a href="{{url('/about.html')}}" class="awe-btn awe-btn-6 awe-btn-default text-uppercase">{!! $item->textlink !!}</a>
                    </div>
                </li>

            @endforeach
        </ul>
    </div>
</section>
<section id="good-food" class="good-food section pd">
    <div class="container">
        <div class="good-food-heading text-center">
            <div class="good-food-title style-1 wow fadeInUp" data-wow-delay=".2s">
                <i class="icon awe_quote_left"></i>
                <h2 class="lg text-uppercase">GOOD FOOD IS SIN</h2>
                <i class="icon awe_quote_right"></i>
            </div>
            <p class=" wow fadeInUp" data-wow-delay=".4s">Doner filet mignon bacon corned beef rump, frankfurter sirloin brisket drumstick kielbasa ribeye boudin pancetta prosciutto. Ball tip jowl porchetta tongue strip steak pig. Turkey shankle bacon, swine doner biltong ball tip pork kielbasa tenderloin ham. </p>
        </div>
        <div class="good-food-body wow fadeInUp" data-wow-delay=".6s">
            <div class="row">
                @foreach($services as $item)
                    <div class="col-md-4">
                        <div class="good-item text-center">
                            <div class="item-image-head">
                                <img src="{!! asset('images/service/'.$item->image)  !!}" alt="{!! $item->name !!}">
                            </div>
                            <div class="item-title">
                                <h4 class="text-uppercase">{!! $item->name !!}</h4>
                            </div>
                            <div class="item-body">
                                <p>{!! $item->intro !!}</p>
                            </div>

                            <div class="item-footer scroll-to-menu">
                                @if($item->name == "DINNER & MORE ")
                                    <a href="{{url('/menu.html')}}" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">The menu</a>
                                @endif()
                                @if($item->name == "SHOW & EVENTS")
                                    <a href="{{url('/event.html')}}" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">Reservation</a>
                                @endif()
                                @if($item->name == "PARTY & WEDDING")
                                    <a href="{{url('/event.html')}}" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">All event</a>
                                @endif()
                            </div>
                        </div>
                    </div>
                @endforeach()
            </div>
        </div>
    </div>
    <div class="divider divider-2"></div>
</section>
<section id="testimonial" class="testimonial testimonial-1 section">
    <div class="awe-parallax bg-2"></div>
    <div class="awe-overlay"></div>
    <div class="container">
        <div class="testimonial-content">
            <div class="icon-head">
                <i class="icon awe_quote_left"></i>
            </div>
            <blockquote>
                <p>{!! $lastQuote[0]->name !!}</p>
                <span>{!! $lastQuote[0]->content !!}</span>
                <div class="test-footer text-right">
                    <span class="sm">{!! $lastQuote[0]->author !!}</span>
                </div>
            </blockquote>
        </div>
    </div>
</section>

<section id="fastfood" class="fastfood section pd70">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="fastfood-description">
                    <div class="content-heading mt">
                        <h4 class="lg text-uppercase">{!! $postmenuathome[0]->name !!}</h4>
                        <hr class="_hr">
                    </div>
                    <div class="text-wrap">
                        <p>{!! $postmenuathome[0]->intro !!}</p>
                    </div>
                    <a href="menu.html" class="awe-btn awe-btn-2 awe-btn-ar text-uppercase">See the menu</a>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1">
                <div class="fastfood-items">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="{!! asset('images/fastfood/img-1.jpg')  !!}" alt="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="{!! asset('images/fastfood/img-2.jpg')  !!}" alt="">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="{!! asset('images/fastfood/img-3.jpg')  !!}" alt="">
                            </div>

                        </div>
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="{!! asset('images/fastfood/img-4.jpg')  !!}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-highlight section">
    <div class="divider divider-2 divider-color"></div>
    <div class="awe-color"></div>
    <div class="container">
        <div class="highlight-content tb">
            <div class="tb-cell">
                <p>Why don’t find a table and save it now? Find a table and We have discount for you!</p>
            </div>
            <div class="links tb-cell">
                <div class="reservation-link">
                    <a href="reservation.html" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">RESERVATION</a>
                </div>
                <div class="shop-delivery-link">
                    <a href="shop.html" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">SHOP DELIVERY</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-blog" class="section-blog section">
    <div class="divider divider-2"></div>
    <div class="container">
        <div class="row">
            <div class="blog-grid">
                <div class="grid-sizer"></div>
                @foreach($postfeatureathomeTop as $item)
                    <div class="post post-single w2">
                        <div class="post-media">
                            <img src="{!! asset('images/post/'.$item->image)  !!}" alt="{!! $item->name !!}">
                        </div>
                        <div class="post-body">
                            <div class="post-title">
                                <h2 class="text-uppercase"><a href="{!! URL('post',[$item->alias]) !!}.html">{!! $item->name !!}</a></h2>
                            </div>
                            <div class="post-content">
                                <p>{!! $item->intro !!}</p>
                            </div>
                        </div>

                    </div>
                @endforeach

                @foreach($postfeatureathome as $item)
                    <div class="post post-single">
                        <div class="post-media">
                            <img src="{!! asset('images/post/'.$item->image)  !!}" alt="{!! $item->name !!}">
                        </div>
                        <div class="post-body">
                            <div class="post-title">
                                <h2 class="text-uppercase"><a href="{!! URL('post',[$item->alias]) !!}.html">{!! $item->name !!}</a></h2>
                            </div>
                        </div>
                    </div>
                @endforeach()
            </div>
        </div>
         <div class="loadmore text-center">
             <a href="{!! URL('blog') !!}.html" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">LOAD MORE POSTS</a>
        </div>
    </div>
</section>

<section id="contact" class="contact section">
    <div class="contact-first">
        <div class="awe-overlay overlay-default"></div>
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="contact-body text-center">
                            <h3 class="lg text-uppercase">CONTACT US</h3>
                            <hr class="_hr">
                            <address class="address-wrap">
                                <span class="address">Eddy Street & Gough Street, San Francisco, CA 94109</span>
                                <span class="phone">3792 - 7384 - 8459</span>
                            </address>
                        </div>
                        <div class="see-map text-center">
                            <a href="#" data-see-contact="See contact info" data-see-map="See location on map" class="awe-btn awe-btn-5 awe-btn-default text-uppercase"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="map" data-map-zoom="14" data-map-latlng="45.738028, 21.224535" data-snazzy-map-theme="grayscale" data-map-marker="images/marker.png" data-map-marker-size="200*60"></div>
    </div>
    <div class="contact-second tb">
        <div class="tbl-cell">
            <div class="contact-form contact-form-1">
                <div class="inner wow fadeInUp" data-wow-delay=".3s">
                    <form id="send-message-form" action="" method="post">
                        <div class="form-item form-textarea">
                            <textarea placeholder="Your Message" name="message"></textarea>
                        </div>
                        <div class="form-item form-type-name">
                            <input type="text" placeholder="Your Name" name="name">
                        </div>
                        <div class="form-item form-type-email">
                            <input type="text" placeholder="Your Email" name="email">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-actions text-center">
                            <input type="submit" value="Send message" class="contact-submit awe-btn awe-btn-6 awe-btn-default text-uppercase">
                        </div>
                        <div id="contact-content"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tb-cell">
            <div class="news-letter text-center">
                <div class="inner wow fadeInUp" data-wow-delay=".6s">
                    <div class="letter-heading">
                        <h4 class="sm text-uppercase">GET NEWS LETTER FROM US</h4>
                        <p>Doner filet mignon bacon corned beef rump, frankfurter sirloin</p>
                    </div>
                    <form>
                        <div class="form-item">
                            <input type="text" placeholder="Your email" class="text-uppercase" name="email">
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="Subscribe" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
