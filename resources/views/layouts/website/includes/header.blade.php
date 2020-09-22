<header class="header1">
    <div class="container-menu-header">

        <div class="wrap_header"> <a href="index.html" class="logo"> <img src="{{ $settings->image_path }}" alt="IMG-LOGO">
            </a>
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li class="{{ Route::currentRouteNamed('index') ? 'sale-noti' : '' }}"> <a href="{{ url('/') }}">@Lang('site.home')</a></li>
                        <li> <a data-toggle="modal" data-target=".bd-product-modal">@Lang('site.shop')</a>
                        </li>
                        <li class="{{ Route::currentRouteNamed('Designs') ? 'sale-noti' : '' }}"> <a data-toggle="modal" data-target=".bd-Designs-modal">@Lang('site.designs')</a>

                        </li>
                        <li> <a href="my-ideas2.html">@Lang('site.my_ideas')</a></li>
                        <!--                        <li> <a href="about.html">About</a></li>
                        <li> <a href="contact.html">Contact</a></li>
                    </ul> -->
                </nav>
            </div>
            <div class="header-icons">

                <div class="header-wrapicon2">
                    <a class="header-icon1  sign-in" href="login.html"><i class="fa fa-user" aria-hidden="true"></i>
                        @Lang('site.sign_in') </a>
                </div>
                <span class="linedivide1"></span>
                <div class="dropdown">
                    <button class="header-icon1 cart-btn dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </button>
                    <span class="header-icons-noti">0</span>
                    <!-- shopping-cart -->
                    <div class="shopping-cart dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="shopping-cart-header">
                            <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
                            <div class="shopping-cart-total">
                                <span class="lighter-text">@Lang('site.total'):</span>
                                <span class="main-color-text">$2,229.97</span>
                            </div>
                        </div>
                        <!--end shopping-cart-header -->

                        <ul class="shopping-cart-items">
                            <li class="clearfix">
                                <img src="images/2.webp" width="70" alt="item1" />
                                <span class="item-name">410196CHOB</span>
                                <span class="item-price">$1,249.99</span>
                                <span class="item-quantity">Quantity: 01</span>
                            </li>

                            <li class="clearfix">
                                <img src="images/1.webp" width="70" alt="item1" />
                                <span class="item-name">410196CHOB</span>
                                <span class="item-price">$36.00</span>
                                <span class="item-quantity">@Lang('site.quantity'): 01</span>
                            </li>
                        </ul>

                        <a href="cart.html" class="checkout_button">@Lang('site.checkout')</a>
                    </div>
                    <!--end shopping-cart -->
                </div>

                @if (app()->getLocale() == "ar")
                <a href="{{LaravelLocalization::getLocalizedURL('en')}}" class="btn btn-lang"> EN </a>
                @else
                <a href="{{LaravelLocalization::getLocalizedURL('ar')}}" class="btn btn-lang"> AR </a>
                @endif

            </div>
        </div>
    </div>
    <div class="wrap_header_mobile">
        <a href="index.html" class="logo-mobile"> <img src="{{ $settings->image_path }}" alt="IMG-LOGO"> </a>
        <div class="btn-show-menu">
            <div class="header-icons-mobile">
                <a href="login.html" class="header-wrapicon1 dis-block">
                    <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>
                <span class="linedivide2"></span>
                <div class="dropdown">
                    <button class="header-icon1 cart-btn dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </button>
                    <span class="header-icons-noti">0</span>
                    <!-- shopping-cart -->
                    <div class="shopping-cart dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="shopping-cart-header">
                            <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
                            <div class="shopping-cart-total">
                                <span class="lighter-text">Total:</span>
                                <span class="main-color-text">$2,229.97</span>
                            </div>
                        </div>
                        <!--end shopping-cart-header -->

                        <ul class="shopping-cart-items">
                            <li class="clearfix">
                                <img src="images/2.webp" width="70" alt="item1" />
                                <span class="item-name">410196CHOB</span>
                                <span class="item-price">$1,249.99</span>
                                <span class="item-quantity">Quantity: 01</span>
                            </li>

                            <li class="clearfix">
                                <img src="images/1.webp" width="70" alt="item1" />
                                <span class="item-name">410196CHOB</span>
                                <span class="item-price">$36.00</span>
                                <span class="item-quantity">Quantity: 01</span>
                            </li>
                        </ul>

                        <a href="cart.html" class="checkout_button">Checkout</a>
                    </div>
                    <!--end shopping-cart -->
                </div>
            </div>
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze"> <span class="hamburger-box"> <span
                        class="hamburger-inner"></span> </span></div>
        </div>
    </div>
    <div class="wrap-side-menu">
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-menu-mobile {{ Route::currentRouteNamed('index') ? 'sale-noti' : '' }}"> <a href="{{ url('/') }}">@Lang('site.home')</a></li>


                <li> <a data-toggle="modal" data-target=".bd-product-modal">@Lang('site.shop')</a>

                </li>
                <li class="item-menu-mobile"><a data-toggle="modal" data-target=".bd-Designs-modal">@Lang('site.designs')</a>
                </li>
                <li class="item-menu-mobile"> <a href="my-ideas.html">@Lang('site.my_ideas')</a></li>
                <!--                    <li class="item-menu-mobile"> <a href="about.html">About</a></li>-->
                <!--                    <li class="item-menu-mobile"> <a href="contact.html">Contact</a></li>-->

            </ul>
        </nav>
    </div>
</header>

<div class="modal  bd-Designs-modal" tabindex="-1" role="dialog" aria-labelledby="bd-Designs-modal"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content rounded-0">
        <div class="modal-header bg5">
            <h5>
                @Lang('site.designs')</h5>
            <button type="button" class="close ml-auto mt-2" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="fa fa-close"></span>
            </button>
        </div>
        <div class="modal-body">

            <!-- Product Detail -->
            <div class="container bgwhite">
                <div class="row">
                    @foreach ($all_departments as $dep)
                        
                    <div class="col-sm-6 col-md-3 col-lg-2 p-8 ">
                        <div class="content">
                            <a href="{{URL::to('Designs/'.$dep->id)}}" target="_blank">
                                <div class="content-overlay"></div>
                            <img class="content-image" src="{{$dep->image_path}}">
                                <div class="content-details fadeIn-bottom">
                                    <h3 class="content-title">{{$dep->name}}</h3>
                                </div>
                            </a>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>
</div>