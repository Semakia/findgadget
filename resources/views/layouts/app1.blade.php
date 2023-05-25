<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Hmart-Smart Product eCommerce html Template">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/images/favicon.ico')}}" />
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/font.awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/venobox.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/jquery-ui.min.css')}}">

    <!-- Complements assets -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/complements/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/complements/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('frontend/complements/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/complements/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/complements/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/complements/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/complements/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/complements/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/complements/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('frontend/complements/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/complements/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/complements/css/style.css')}}">

    <!-- Styles CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/complements/css/style.css')}}">
    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

    <link href="{{asset('frontend/new/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/new/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/new/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/new/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/new/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/new/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  

  <!-- Icon Font Stylesheet -->
  {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">--}}
  {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">--}}
 

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/new/css/style.css')}}" rel="stylesheet">
  <link href="complement/css/style.css" rel="stylesheet">
  <link href="complement/css/bootstrap.min.css" rel="stylesheet"> 
</head>

<body>
    <div class="main-wrapper">
        <header>
            <!-- Header top area start -->
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <div class="welcome-text">
                                <p>World Wide Completely Free Returns and Shipping</p>
                            </div>
                        </div>
                        <div class="col d-none d-lg-block">
                            <div class="top-nav">
                                <ul>
                                    {{--<li><a href="tel:0123456789"><i class="fa fa-phone"></i> +012 3456 789</a></li>
                                    <li><a href="mailto:demo@example.com"><i class="fa fa-envelope-o"></i> demo@example.com</a></li>--}}

                                    @if (Session::has('user'))
                                        <li><a href="/account"><i class="fa fa-user"></i> Account</a></li>
                                    @else
                                        <li><a href="/login"><i class="fa fa-user"></i> Account</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
            <!-- Header top area end -->
            <!-- Header action area start -->
            <div class="header-bottom  d-none d-lg-block" style="background-color: #fff;">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-3 col">
                            <a class="navbar-brand" href="/">
                                <img src="{{asset('frontend/assets/images/logo/logo.jpg')}}" width="300" height="70" class="d-inline-block align-top centered-logo" alt="logo">
                                
                            </a>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="search-element">
                                <form action="#">
                                    <input type="text" placeholder="Search" />
                                    <button><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col">
                            <div class="header-actions">
                                <!-- Single Wedge Start -->
                                <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle" style="color: #2f4c86">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <!-- Single Wedge End -->
                                <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0" style="color: #2f4c86">
                                    <i class="pe-7s-shopbag"></i>
                                    <span class="header-action-num">{{Session::has('cart')?Session::get('cart')->totalQty:0}}</span>
                                    <!-- <span class="cart-amount">€30.00</span> -->
                                </a>
                                <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                    <i class="pe-7s-menu"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header action area end -->
            <!-- Header action area start -->
            <div class="header-bottom d-lg-none sticky-nav style-1" style="background-color: #fff;">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-3 col">
                            <div class="header-logo">
                                <a href="index.html"><img src="{{asset('frontend/assets/images/logo/logo.jpg')}}" width="200" height="60" ></a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="search-element">
                                <form action="#">
                                    <input type="text" placeholder="Search" />
                                    <button><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col">
                            <div class="header-actions">
                                <!-- Single Wedge Start -->
                                <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle" style="color: #2f4c86">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <!-- Single Wedge End -->
                                <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0" style="color: #2f4c86">
                                    <i class="pe-7s-shopbag"></i>
                                    <span class="header-action-num">{{Session::has('cart')?Session::get('cart')->totalQty:0}}</span>
                                    <!-- <span class="cart-amount">€30.00</span> -->
                                    
                                </a>
                                <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none" style="color: #2f4c86">
                                    <i class="pe-7s-menu"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header action area end -->


            <div class="header-nav-area d-none d-lg-block sticky-nav" style="background-color: #2f4c86;">
                <div class="container">
                    <div class="header-nav">
                        <div class="main-menu position-relative" style="background-color: #2f4c86;">
                            <ul style="background-color: #2f4c86;">
                                <li class="dropdown"><a href="/home">Home </a>
                                </li>
                                <li><a href="/about">About</a></li>
                                
                                @yield('nav-shop')

                                {{--<li class="dropdown "><a href="#">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class="dropdown position-static"><a href="blog-grid-left-sidebar.html">Blog Grid
                                                <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                                <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                                <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown position-static"><a href="blog-list-left-sidebar.html">Blog List
                                                <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-list.html">Blog List</a></li>
                                                <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                                <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown position-static"><a href="blog-single-left-sidebar.html">Single
                                                Blog <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-single.html">Single Blog</a>
                                                <li><a href="blog-single-left-sidebar.html">Single Blog Left Sidebar</a>
                                                </li>
                                                <li><a href="blog-single-right-sidebar.html">Single Blog Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>--}}
                                <li class="dropdown position-static"><a href="/contact">Support <i class="fa fa-angle-down"></i></a>
                                    <ul class="mega-menu d-block">
                                        <li class="d-flex">
                                            <ul class="d-block">
                                                <li><a href="/contact">Contact us</a></li>
                                                <li><a href="/ordertracking">Order Tracking</a></li>
                                            </ul>
                                            
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

             <!-- header navigation area start -->
        
            <!-- header navigation area end -->
            
        </header>
    
            
            <!-- header navigation area start -->
            {{--<div class="header-nav-area sticky-nav" style="background-color: #315536;" >
                <div >
                    <nav class="header-nav  navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" style="background-color: #012970" id="ftco-navbar">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="oi oi-menu"></span> Menu
                        </button>
                        <div class="main-menu position-relative collapse navbar-collapse"  style="background-color: #012970 ;" >
                                              
                            <ul class="navbar-nav ml-auto" style="background-color: #012970;"  >
                                <li class="dropdown"><a href="/home">Home </a>
                                </li>
                                <li><a href="/about">About</a></li>
                                
                                @yield('nav-shop')

                                <li class="dropdown "><a href="#">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class="dropdown position-static"><a href="blog-grid-left-sidebar.html">Blog Grid
                                                <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                                <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                                <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown position-static"><a href="blog-list-left-sidebar.html">Blog List
                                                <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-list.html">Blog List</a></li>
                                                <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                                <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown position-static"><a href="blog-single-left-sidebar.html">Single
                                                Blog <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-single.html">Single Blog</a>
                                                <li><a href="blog-single-left-sidebar.html">Single Blog Left Sidebar</a>
                                                </li>
                                                <li><a href="blog-single-right-sidebar.html">Single Blog Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown position-static"><a href="/contact">Support <i class="fa fa-angle-down"></i></a>
                                    <ul class="mega-menu d-block">
                                        <li class="d-flex">
                                            <ul class="d-block">
                                                <li><a href="/contact">Contact us</a></li>
                                                <li><a href="/ordertracking">Order Tracking</a></li>
                                            </ul>
                                            
                                        </li>
                                    </ul>
                                </li>
                                <li class="search-element">
                                    <form action="#">
                                        <input type="search" placeholder="Search" />
                                        <button style="background-color: #107255"><i class="pe-7s-search"></i></button>
                                    </form>
                                        
                                    
                                </li>


                                    <li>
                                         <!-- Single Wedge Start -->
                                         <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                        <!-- Single Wedge End -->
                                    </li>
                                    
                                    <li>
                                        <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                            <i class="pe-7s-shopbag"></i>
                                            <span class="header-action-num">01</span>
                                            <!-- <span class="cart-amount">€30.00</span> -->
                                        </a>
                                    </li>
                                    <li>  
                                        <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none navbar-toggler">
                                            <i class="pe-7s-menu"></i>
                                        </a>
                                    </li>
                                    

                                    <div class="burger">
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                    </div>
                                        
                                        
                                    </div>
                                </div>
                                
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- header navigation area end -->
            
        </header>--}}


        <!-- offcanvas overlay start -->
        <div class="offcanvas-overlay"></div>
        <!-- offcanvas overlay end -->
        <!-- OffCanvas Wishlist Start -->
        <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist hidden">
            <div class="inner">
                <div class="head">
                    <span class="title">Wishlist</span>
                    <button class="offcanvas-close">×</button>
                </div>
                <div class="body customScroll">
                    <ul class="minicart-product-list">
                        @if ($wishItems != null)
                        @foreach ($wishItems as $productItem)
                            <li>
                                <a href="single-product.html" class="image"><img src="/storage/gadget_images/{{$productItem['product_image']}}" alt="Cart product Image"></a>
                                <div class="content">
                                    <a href="single-product.html" class="title">{{$productItem['product_name']}}</a>
                                    
                                    <a href="#" class="remove">×</a>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li>Your wishlist is empty</li>
                    @endif
                        
                        
                    </ul>
                </div>
                <div class="foot">
                    <div class="buttons">
                        <a href="wishlist.html" class="btn btn-dark btn-hover-primary mt-30px">view wishlist</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- OffCanvas Wishlist End -->
        <!-- OffCanvas Cart Start -->
        
        <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
            <div class="inner">
                <div class="head">
                    <span class="title">Cart</span>
                    <button class="offcanvas-close">×</button>
                </div>
                <div class="body customScroll">
                    <ul class="minicart-product-list">
                        @if ($product != null)
                        @foreach ($product as $productItem)
                            <li>
                                <a href="single-product.html" class="image"><img src="/storage/gadget_images/{{$productItem['product_image']}}" alt="Cart product Image"></a>
                                <div class="content">
                                    <a href="single-product.html" class="title">{{$productItem['product_name']}}</a>
                                    <span class="quantity-price">{{$productItem['qty']}} x <span class="amount">{{$productItem['product_price']}}</span></span>
                                    <a href="#" class="remove">×</a>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li>Your cart is empty</li>
                    @endif
                        
                        
                    </ul>
                </div>
                <div class="foot">
                    <div class="buttons mt-30px">
                        <a href="/cart" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                        <a href="/checkout" class="btn btn-outline-dark current-btn">checkout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- OffCanvas Cart End -->
        <!-- OffCanvas Menu Start -->
        <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <button class="offcanvas-close"></button>
            <div class="user-panel">
                <ul>
                    <li><a href="tel:0123456789"><i class="fa fa-phone"></i> +012 3456 789</a></li>
                    <li><a href="mailto:demo@example.com"><i class="fa fa-envelope-o"></i> demo@example.com</a></li>
                    <li><a href="/account"><i class="fa fa-user"></i> Account</a></li>
                </ul>
            </div>
            <div class="inner customScroll">
                <div class="offcanvas-menu mb-4">
                    <ul>
                        <li class="dropdown"><a href="/home">Home </a>
                        </li>
                        <li><a href="/about">About</a></li>
                        
                        @yield('nav-mobile-shop')

                        {{--<li><a href="#"><span class="menu-text">Blog</span></a>
                            <ul class="sub-menu">
                                <li><a href="blog-grid.html">Blog Grid Page</a></li>
                                <li><a href="blog-grid-left-sidebar.html">Grid Left Sidebar</a></li>
                                <li><a href="blog-grid-right-sidebar.html">Grid Right Sidebar</a></li>
                                <li><a href="blog-list.html">Blog List Page</a></li>
                                <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a></li>
                                <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a></li>
                                <li><a href="blog-single.html">Blog Single Page</a></li>
                                <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                                <li><a href="blog-single-right-sidebar.html">Single Right Sidbar</a>
                            </ul>
                        </li>--}}

                            
                        
                        <li><a href="#"><span class="menu-text">Support</span></a>
                            <ul class="sub-menu">
                                <li><a href="/contact">Contact us</a></li>
                                <li><a href="/ordertracking">Order Tracking</a></li>
                                
                            </ul>
                        </li>

                        
                        
                    </ul>
                </div>
                <!-- OffCanvas Menu End -->
                <div class="offcanvas-social mt-auto">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- OffCanvas Menu End -->





        {{--Start-content--}}

        @yield('contenu')

        {{--end-content--}}






        <!-- Footer Area Start -->
        
        
    
        <div class="footer-area" style="background-color: #cacbe2" >
            
            <div class="footer-container">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 mb-md-30px mb-lm-30px">
                                <div class="single-wedge">
                                    <div class="footer-logo">
                                        <a href="/home"><img src="{{asset('frontend/assets/images/logo/bg2.jpg')}}" alt="" width="200" height="60"></a>
                                    </div>
                                    
                                    <ul class="link-follow">
                                        <li>
                                            <a class="m-0" title="Twitter" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a title="Tumblr" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-tumblr" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Facebook" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Instagram" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End single blog -->
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 col-sm-6 mb-lm-30px pl-lg-60px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Shop</h4>
                                    <div class="footer-links">
                                        <div class="footer-row">
                                            <ul class="align-items-center">
                                                <li class="li"><a class="single-link" href="my-account.html">My Account</a></li>
                                                <li class="li"><a class="single-link" href="contact.html">Contact</a></li>
                                                <li class="li"><a class="single-link" href="cart.html">Shopping cart</a></li>
                                                <li class="li"><a class="single-link" href="shop-left-sidebar.html">Shop</a></li>
                                                <li class="li"><a class="single-link" href="login.html">Services Login</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End single blog -->
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 col-sm-6 mb-lm-30px pl-lg-40px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">About & Support</h4>
                                    <div class="footer-links">
                                        <div class="footer-row">
                                            <ul class="align-items-center">
                                                <li class="li"><a class="single-link" href="my-account.html">About us</a></li>
                                                <li class="li"><a class="single-link" href="contact.html">Contact us</a></li>
                                                <li class="li"><a class="single-link" href="cart.html">Tracking my order</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End single blog -->
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 col-sm-12">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Contact Info</h4>
                                    <div class="footer-links">
                                        <!-- News letter area -->
                                        <p class="address">Address: Your Address Goes Here.</p>
                                        <p class="phone">Phone/Fax:<a href="tel:0123456789"> 0123456789</a></p>
                                        <p class="mail">Email:<a href="mailto:demo@example.com"> demo@example.com</a></p>
                                        <p class="mail"><a href="https://demo@example.com"> demo@example.com</a></p>
                                        <!-- News letter area  End -->
                                    </div>
                                </div>
                            </div>
                            <!-- End single blog -->
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="line-shape-top line-height-1">
                            <div class="row flex-md-row-reverse align-items-center">
                                <div class="col-md-6 text-center text-md-end">
                                    <div class="payment-mth"><a href="#"><img class="img img-fluid" src="{{asset('frontend/assets/images/icons/payment.png')}}" alt="payment-image"></a></div>
                                </div>
                                <div class="col-md-6 text-center text-md-start">
                                    <p class="copy-text"> © 2022 <strong>Hmart</strong> Made With <i class="fa fa-heart"
                                        aria-hidden="true"></i> By <a class="company-name" href="https://themeforest.net/user/codecarnival/portfolio">
                                            <strong> Codecarnival </strong></a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Area End -->
    </div>

   
    <!-- Modal -->
    <div class="modal modal-2 fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class="pe-7s-close"></i></button>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                            <!-- Swiper -->
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{asset('frontendassets/images/product-image/zoom-image/1.webp')}}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{asset('assets/images/product-image/zoom-image/2.webp')}}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{asset('frontend/assets/images/product-image/zoom-image/3.webp')}}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{asset('frontend/assets/images/product-image/zoom-image/4.webp')}}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{asset('frontend/assets/images/product-image/zoom-image/5.webp')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-container gallery-thumbs mt-20px slider-nav-style-1 small-nav">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{asset('frontend/assets/images/product-image/small-image/1.webp')}}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{asset('frontend/assets/images/product-image/small-image/2.webp')}}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{asset('frontend/assets/images/product-image/small-image/3.webp')}}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{asset('frontend/assets/images/product-image/small-image/4.webp')}}" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{asset('frontend/assets/images/product-image/small-image/5.webp')}}" alt="">
                                    </div>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-buttons">
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-details-content quickview-content">
                                <h2>Modern Smart Phone</h2>
                                <div class="pricing-meta">
                                    <ul class="d-flex">
                                        <li class="new-price">$20.90</li>
                                    </ul>
                                </div>
                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">( 2 Review )</a></span>
                                </div>
                                <p class="mt-30px">Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmll tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mill veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exet commodo consequat. Duis aute irure dolor</p>
                                <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                    <span>SKU:</span>
                                    <ul class="d-flex">
                                        <li>
                                            <a href="#">Ch-256xl</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                    <span>Categories: </span>
                                    <ul class="d-flex">
                                        <li>
                                            <a href="#">Smart Device, </a>
                                        </li>
                                        <li>
                                            <a href="#">ETC</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                    <span>Tags: </span>
                                    <ul class="d-flex">
                                        <li>
                                            <a href="#">Smart Device, </a>
                                        </li>
                                        <li>
                                            <a href="#">Phone</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                    </div>
                                    <div class="pro-details-cart">
                                        <button class="add-cart"> Add To
                                            Cart</button>
                                    </div>
                                    <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                        <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                                    </div>
                                </div>
                                <div class="payment-img">
                                    <a href="#"><img src="{{asset('frontend/assets/images/icons/payment.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal Cart -->
    <div class="modal customize-class fade" id="exampleModal-Cart" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                        <i class="pe-7s-check"></i> Added to cart successfully!
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="{{asset('frontend/assets/images/product-image/1.webp')}}" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    <!-- Modal wishlist -->
    <div class="modal customize-class fade" id="exampleModal-Wishlist" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                        <i class="pe-7s-check"></i> Added to Wishlist successfully!
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="{{asset('frontend/assets/images/product-image/1.webp')}}" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- Modal compare -->
    <div class="modal customize-class fade" id="exampleModal-Compare" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                        <i class="pe-7s-check"></i> Added to compare successfully!
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="{{asset('frontend/assets/images/product-image/1.webp')}}" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Global Vendor, plugins JS -->
    <!-- JS Files
    ============================================ -->
    <script type="text/javascript" src="/javascripts/jquery-3.1.1.min.js"></script>
    <script src="https://js.stripe.com/v2/"></script>
    <script src="src/js/checkout.js"></script>
    <script src="{{asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/scrollUp.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/venobox.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/mailchimp-ajax.js')}}"></script>

    <script src="{{asset('frontend/complements/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/complements/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('frontend/complements/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/complements/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/complements/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('frontend/complements/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/complements/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('frontend/complements/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/complements/js/aos.js')}}"></script>
    <script src="{{asset('frontend/complements/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('frontend/complements/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('frontend/complements/js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset('frontend/complements/js/google-map.js')}}"></script>
    <script src="{{asset('frontend/complements/js/main.js')}}"></script>
    <script src="{{asset('new/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('new/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('new/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('new/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('new/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('new/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('new/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('new/vendor/php-email-form/validate.js')}}"></script>
  {{--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>--
  <script src="complement/lib/wow/wow.min.js"></script>
  <script src="complement/lib/easing/easing.min.js"></script>
  <script src="complement/lib/waypoints/waypoints.min.js"></script>
  <script src="complement/lib/counterup/counterup.min.js"></script>
  <script src="complement/lib/owlcarousel/owl.carousel.min.js"></script>
 

  <!-- Template Javascript -->
  <script src="complement/js/main.js"></script>--}}

  <!-- Template Main JS File -->
  <script src="{{asset('new/js/main.js')}}"></script>


    <!-- Minify Version -->
    <!-- <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/main.min.js"></script> -->

    <!--Main JS (Common Activation Codes)-->
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>
</body>

</html>