@extends('fe.master')
@section('title','Contact')
@section('content')
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-2"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">Contact</h3>
    </div>
</section>
<section id="contact" class="contact section">
    <div class="contact-form contact-form-2">
        <div class="divider divider-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <address class="find-us">
                        <span class="md">Find Us Here</span>
                        <div class="location-1">
                            <i class="icon awe_map_marker"></i>
                            <strong>{!! $contact[0]->location1 !!}</strong>
                        </div>
                        <div class="location-1">
                            <i class="icon awe_map_marker"></i>
                            <strong>{!! $contact[0]->location2 !!}</strong>
                        </div>
                        <div class="phone">
                            <strong>{!! $contact[0]->support_phone !!}</strong>
                        </div>
                    </address>
                </div>
                <div class="col-md-8">
                    <div class="form-row">
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
                            <div class="form-actions">
                                <input type="submit" value="Send message" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
