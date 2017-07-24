<div class="container">

            <!-- LOGO -->

            <div class="logo"><a href="{{url('/')}}"><img src="{!! asset('images/logo/'.$configs[5]->value)  !!}" alt="{!! $configs[0]->value !!}"></a></div>

            <!-- END / LOGO -->



            <!-- OPEN MENU MOBILE -->

            <div class="open-menu-mobile">

                <span>Toggle menu mobile</span>

            </div>

            <!-- END / OPEN MENU MOBILE -->



            <!-- NAVIGATION -->

            <nav class="navigation text-right" data-menu-type="1200">

                <!-- NAV -->

                <ul class="nav text-uppercase" id="menu-nav">

                    <li class="menu-item-has-children">

                        <a href="{{url('/')}}">Home</a>
                    </li>

                    <li><a href="{{url('/about.html')}}" class="{{ set_active(['about.html']) }}">About</a></li>


                    <li><a href="{{url('/menu.html')}}" class="{{ set_active(['menu.html']) }}">Menu</a></li>

                    <li><a href="reservation.html">Reservation</a></li>

                    <li><a href="{{url('/event.html')}}" class="{{ set_active(['event.html']) }}">Event</a></li>

                    <!--<li class="menu-item-has-children">

                        <a href="#">Pages</a>

                        <ul class="sub-menu">

                            <li class="menu-item-has-children">

                                <a href="shop.html">Shop</a>

                                <ul class="sub-menu">

                                    <li><a href="shop.html">Shop page</a></li>

                                    <li><a href="cart.html">Cart</a></li>

                                    <li><a href="checkout.html">Checkout</a></li>

                                </ul>

                            </li>

                            <li class="menu-item-has-children">

                                <a href="blog-sidebar.html">Blog</a>

                                <ul class="sub-menu">

                                    <li><a href="blog-sidebar.html">Blog sidebar</a></li>

                                    <li><a href="blog-grid.html">Blog grid</a></li>

                                    <li><a href="blog-single.html">Blog single</a></li>

                                </ul>

                            </li>

                            <li><a href="shortcode.html">Shortcode</a></li>

                        </ul>

                    </li>!-->

                    <li><a href="{{url('/contact.html')}}" class="{{ set_active(['contact.html']) }}">Contact</a></li>

                </ul>

                <!-- END / NAV -->



                <!-- MINICART -->

                <!--<div class="minicart-wrap">

                    <div class="toggle-minicart active">

                        <span class="text-uppercase">Cart</span>

                    </div>

                    <div class="minicart-body">

                        <h4 class="xsm text-uppercase text-center">Your cart</h4>

                        <ul class="minicart-list">

                            <li>

                                <div class="product-thumb">

                                    <img src="images/shop/img-2.jpg" alt="">

                                </div>

                                <div class="product-name">

                                    <a href="#">Name of the Dish ( L )</a>

                                </div>

                                <div class="qty-wrap">

                                    <span class="product-quantity">

                                        <span class="quantity">2</span> serves.

                                    </span>

                                    <span class="amount">$48</span>

                                </div>

                                <div class="product-remove">

                                    <a href="#"><i class="icon awe_close"></i></a>

                                </div>

                            </li>



                            <li>

                                <div class="product-thumb">

                                    <img src="images/shop/img-2.jpg" alt="">

                                </div>

                                <div class="product-name">

                                    <a href="#">Name of the Dish ( L )</a>

                                </div>

                                <div class="qty-wrap">

                                    <span class="product-quantity">

                                        <span class="quantity">2</span> serves.

                                    </span>

                                    <span class="amount">$48</span>

                                </div>

                                <div class="product-remove">

                                    <a href="#"><i class="icon awe_close"></i></a>

                                </div>

                            </li>

                        </ul>

                        <div class="minicart-total">

                            Total

                            <span class="amount pull-right">$120</span>

                        </div>



                        <div class="minicart-footer">

                            <a href="checkout.html" class="awe-btn awe-btn-1 awe-btn-default text-uppercase">Check out</a>

                        </div>



                    </div>

                </div>!-->

                <!-- END / MINICART -->



                <!-- SOCIAL -->

                <div class="head-social">

                    <a href="{!! $configs[4]->value !!}"><i class="fa fa-twitter"></i></a>

                    <a href="#"><i class="fa fa-pinterest"></i></a>

                    <a href="{!! $configs[3]->value !!}"><i class="fa fa-facebook"></i></a>

                </div>

                <!-- END / SOCIAL -->

            </nav>

            <!-- END / NAVIGATION -->

        </div>
