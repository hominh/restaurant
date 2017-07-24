@extends('fe.master')
@section('content')
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-2"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">Event</h3>
    </div>
</section>
<section class="section-blog">
    <div class="container">
        <div class="row">
          <div class="col-md-9">
              <div class="blog-single">
                  <div class="post post-single">
                      <div class="post-media">
                          <div class="image-wrap">
                          </div>
                      </div>
                      <div class="post-body">
                          <div class="post-title">
                              <h3 class="xmd">{!! $event[0]->name !!}</h3>
                          </div>
                          <div class="item-event-meta">
                              <div class="date">
                                  <i class="icon awe_calendar"></i>
                                  {!! $event[0]->datetime !!}
                              </div>
                              <div class="website">
                                  <i class="icon awe_link"></i>
                                  <a href="{!! $event[0]->website !!}">Website</a>
                              </div>

                          </div>
                          <div class="post-content">
                              {!! $event[0]->content !!}
                          </div>
                      </div>
                      <div class="share-tags">
                          <div class="share-box">
                              <h5 class="sm">Share</h5>
                              <div class="share">
                                  <a href="#"><i class="fa fa-facebook"></i></a>
                                  <a href="#"><i class="fa fa-twitter"></i></a>
                                  <a href="#"><i class="fa fa-linkedin"></i></a>
                                  <a href="#"><i class="fa fa-tumblr-square"></i></a>
                                  <a href="#"><i class="fa fa-google-plus"></i></a>
                                  <a href="#"><i class="fa fa-envelope"></i></a>

                              </div>
                          </div>
                          <div class="tag-box fr">
                              <h5 class="sm">Tags</h5>
                              <div class="tag">

                              </div>
                          </div>
                      </div>
                      <div class="about-author">
                          <div class="image-thumb fl">
                              <img src="{!! asset('images/avatar/'.$event[0]->uimage)  !!}" alt="{!! $event[0]->uname !!}">
                          </div>
                          <div class="author-info">
                              <div class="author-name">
                                  <h4 class="xmd text-capitalize">{!! $event[0]->uname !!}</h4>
                              </div>
                              <div class="author-content">
                                  <p>{!! $event[0]->about !!}</p>
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
                          <form method="POST" action="" id="comment_event" name="comment_event">
                                <input type="hidden" name="hidden" value={!! $event[0]->id !!}>
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
                                                <div class="awe-btn awe-btn-2 awe-btn-default text-uppercase"><input type="submit" value="Post this comment" class="" id="submit_comment"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
</section>
@endsection
