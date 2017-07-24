@extends('fe.master')
@section('title','Menu')
@section('content')
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-4"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">Menu</h3>
    </div>
</section>
<section id="the-menu" class="the-menu section">
    <div class="tabs-menu tabs-page">
        <div class="container">
            <ul class="nav-tabs text-center" role="tablist" id="tablistmenu">
                <?php $pos = 0 ?>
                @foreach($foodtypes as $item)
                    <?php $pos = $pos + 1; ?>
                    @if($pos == 1)
                        <li class="active" id="{!! $item->id !!}"><a href="menu_tab_{!! $item->id !!}" role="tab" data-toggle="tab" id="{!! $item->id !!}">{!! $item->name !!}</a></li>
                    @endif
                    @if($pos != 1)
                        <li pid="ft_{!! $item->id !!}" id="{!! $item->id !!}"><a href="menu_tab_{!! $item->id !!}" role="tab" data-toggle="tab" id="{!! $item->id !!}">{!! $item->name !!}</a></li>
                    @endif

                @endforeach()
            </ul>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
            <div class="tab-menu-content tab-content">
                @foreach($foods as $item)
                    <div class="tab-pane fade in active" id="menu_tab_{!! $item->foodtype_id !!}" pid="ft_{!! $item->foodtype_id !!}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="the-menu-item">
                                    <div class="image-wrap">
                                        <img src="{!! asset('images/food/'.$item->image)  !!}" alt="{!! $item->name !!}">
                                    </div>
                                    <div class="the-menu-body">
                                        <h4 class="xsm">{!! $item->name !!}</h4>
                                    </div>
                                    <div class="prices">
                                        <span class="price xsm">${!! $item->price !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach()
            </div>
        </div>
    </div>
</section>
@endsection
