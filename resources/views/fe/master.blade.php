<!DOCTYPE html>

<!--[if IE 7 ]> <html class="ie ie7"> <![endif]-->

<!--[if IE 8 ]> <html class="ie ie8"> <![endif]-->

<!--[if IE 9 ]> <html class="ie ie9"> <![endif]-->

<!--[if (gt IE 9)|!(IE)]><!--> <html class="" lang="en"> <!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="/fe/css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/fe/css/lib/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fe/css/lib/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fe/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fe/css/awe-fonts.css') }}">


     <!--[if lt IE 9]>

        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>

    <![endif]-->

    <title>@yield('title')</title>
    <meta name="keyword" content="@yield('keyword')" />
    <meta name="description" content="@yield('description')" />
    <meta name="keyword" content="@yield('keyword')" />

</head>

<body>
    <!--<div class="preloader">
        <div class="inner">
            <div class="item item1"></div>
            <div class="item item2"></div>
            <div class="item item3"></div>
        </div>
    </div>!-->
    <div id="page-wrap">
        <header id="header" class="header header-1">
            @include('fe/blocks/header')
        </header>
        @yield('content')
        @include('fe/blocks/footer')
    </div>
</body>
<script src="/fe/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/fe/js/lib/app.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="/fe/js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="/fe/js/lib/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="/fe/js/lib/jquery.easing.min.js"></script>
<script type="text/javascript" src="/fe/js/lib/jquery.owl.carousel.min.js"></script>
<script type="text/javascript" src="/fe/js/lib/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/fe/js/lib/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/fe/js/lib/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/fe/js/lib/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="/fe/js/lib/retina.min.js"></script>
<script type="text/javascript" src="/fe/js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="/fe/js/lib/jquery.validate.min.js"></script>
<script type="text/javascript" src="/fe/js/scripts.js"></script>


</html>
