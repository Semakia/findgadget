     


    

@extends('layouts.app1')

@section('name')
    <title>Hmart - Home </title>
@endsection

@section('nav-shop')
<li class="dropdown position-static"><a href="/shop">Shop <i
    class="fa fa-angle-down"></i></a>
    <ul class="mega-menu d-block">
        <li class="d-flex">

            @foreach ($categories as $categorie)

            <ul class="d-block">
                <li class="title"><a href="/shopByCategory/{{$categorie->category_name}}" class = "{{(request()->is('/shopBycategory/'.$categorie->category_name) )}}">{{$categorie->category_name}}</a></li>
                @foreach ($categorie->gadgets as $gadget)
                     
                <li style="display: flex; align-items: center;"><img src="storage/gadget_images/{{$gadget->gadget_image}}" alt="" width="50" style="margin-right: 10px;" /><a href="">{{ $gadget->gadget_name }}</a></li>
                @endforeach
                
            </ul>
                
            @endforeach

            
            
        </li>
    </ul>
</li>
    
@endsection

@section('nav-mobile-shop')
<li><a href="#"><span class="menu-text">Shop</span></a>
    
            @foreach ($categories as $categorie)

                <ul class="sub-menu">
                    <li><a href="/shopByCategory/{{$categorie->category_name}}" class = "{{(request()->is('/shopBycategory/'.$categorie->category_name) )}}">{{$categorie->category_name}}</a></li>
                    @foreach ($categorie->gadgets as $gadget)
                        
                    <li style="display: flex; align-items: center;"><img src="storage/gadget_images/{{$gadget->gadget_image}}" alt="" width="50" style="margin-right: 10px;" /><a href="">{{ $gadget->gadget_name }}</a></li>
                    @endforeach
                    
                </ul>
                
            @endforeach
            
            
        
</li>
    
@endsection

{{--@section('offcanvas-cart')
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                @foreach ($product as $product)
                    <li>
                        <a href="single-product.html" class="image"><img src="/storage/gadget_images/{{$product['product_image']}}" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">{{$product['product_name']}}</a>
                            <span class="quantity-price">{{$product['qty']}} x <span class="amount">{{$product['product_price']}}</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                @endforeach
                
                
            </ul>
        </div>
        <div class="foot">
            <div class="buttons mt-30px">
                <a href="/cart" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                <a href="/checkout" class="btn btn-outline-dark current-btn">checkout</a>
            </div>
        </div>
    </div>
</div>--}}

       
@section('contenu')

 {{--Start-content--}}

    <!-- Hero/Intro Slider Start -->
<div class="section ">
    <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
        <!-- Hero slider Active -->
        <div class="swiper-wrapper">
            <!-- Single slider item -->
            @foreach ($sliders as $slider)
            <div class="hero-slide-item slider-height swiper-slide bg-color1" >

                <a href="/shop"><img src="storage/slider_images/{{ $slider->slider_image }}" alt="Background Image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;" href="/shop"></a>

                <div class="container h-100" href="/shop">
                    <div class="row h-100">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center sm-center-view">
                            <div class="hero-slide-content slider-animated-1">
                                <span class="category"></span>
                                <h2 class="title-1">  <br>
                                 <br>
                                 </h2>
                                 
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-end">
                            <div class="show-case">
                                <div class="hero-slide-image">
                                    <img src="" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
           
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<!-- Hero/Intro Slider End -->
<!--section services start-->




<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters ftco-services">
  <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services mb-md-0 mb-4">
      <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            <span class="flaticon-shipped"></span>
      </div>
      <div class="media-body">
        <h3 class="heading">Free Shipping</h3>
        <span>On order over $39</span>
      </div>
    </div>      
  </div>
 
  <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services mb-md-0 mb-4">
      <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            <span class="flaticon-award"></span>
      </div>
      <div class="media-body">
        <h3 class="heading">Superior Quality</h3>
        <span>Quality Products</span>
      </div>
    </div>      
  </div>
  <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services mb-md-0 mb-4">
      <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            <span class="flaticon-customer-service"></span>
      </div>
      <div class="media-body">
        <h3 class="heading">Support</h3>
        <span>24/7 Support</span>
      </div>
    </div>      
  </div>
</div>
    </div>
</section>
<!--section services end-->

<!-- Banner Area Start -->
<div class="banner-area style-one pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="single-banner nth-child-1">
                    <img src="frontend/assets/images/banner/Watch.jpg" alt="">
                    <div class="banner-content nth-child-1">
                        <h3 class="title" style="color:#fff">Smart Watch For <br>
                        Your Hand</h3>
                        <span class="category" style="color:#fff">From $29.00</span>
                        <a href="/shop" class="shop-link"  style="background-color: #2f4c86"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-banner nth-child-2 mb-30px mb-lm-30px mt-lm-30px ">
                    <img src="frontend/assets/images/banner/Headphones.jpg" alt="">
                    <div class="banner-content nth-child-2">
                        <h3 class="title"  style="color:#fff">Headphones</h3>
                        <span class="category"  style="color:#fff">From $95.00</span>
                        <a href="/shop" class="shop-link" style="background-color: #2f4c86"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="single-banner nth-child-2">
                    <img src="frontend/assets/images/banner/Iphone12.jpg" alt="">
                    <div class="banner-content nth-child-3">
                        <h3 class="title" style="color:#fff">Iphone 13</h3>
                        <span class="category"  style="color:#fff">From $69.00</span>
                        <a href="/shop" class="shop-link"  style="background-color: #2f4c86"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->
<!-- Product Area Start -->
<div class="product-area pb-100px">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <div class="row">
            <div class="col-12">
                <!-- Tab Start -->
                <div class="tab-slider d-md-flex justify-content-md-between align-items-md-center">
                    <ul class="product-tab-nav nav justify-content-start align-items-center">
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#newarrivals">New Arrivals</button>
                        </li>
                        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#BestSellers" >Best Sellers</button>
                        </li>
                        @foreach ($NewArrivalCategory as $category)
                            <li class="nav-item"><button class="nav-link  btn-lg-12" data-bs-toggle="tab" data-bs-target="#Arrivals{{$category}}">{{$category}} New Arrivals</button>
                            </li>
                        @endforeach
                       
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
        </div>
        <!-- Section Title & Tab End -->
        <div class="row">
            <div class="col">
                <div class="tab-content mt-60px">
                    <!-- 1st tab start -->
                    <div class="tab-pane fade show active" id="newarrivals">
                        <div class="row mb-n-30px">
                            @foreach ($gadgetsThisMonth as $gadget)
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <span class="badges">
                                        <span class="new">Sales-50%</span>
                                    </span>
                                    <div class="thumb">
                                        <a href="single-product.html" class="image">
                                            <img src="storage/gadget_images/{{$gadget->gadget_image}}" alt="Product" />
                                            <img class="hover-image" src="storage/gadget_images/{{$gadget->gadget_image}}" alt="Product" alt="Product" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <span class="category"><a href="#">{{$gadget->gadget_category}}</a></span>
                                        <h5 class="title"><a href="single-product.html">{{$gadget->gadget_name}}
                                            </a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">{{$gadget->gadget_price}} $</span>
                                        </span>
                                    </div>
                                    <div class="actions">
                                        <button title="Add To Cart" class="action add-to-cart" ><a href="/add_to_cart/{{$gadget->id}}" style="color: aliceblue"><i
                                            class="pe-7s-shopbag"></i></a></button>
                                        
                                        <button  class="action wishlist" title="Wishlist" ><a href="/add_to_wishlist/{{$gadget->id}}" style="color: aliceblue"><i
                                                class="pe-7s-like"></i></a></button>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>     
                    <!-- 1st tab end -->
                    <!-- 2nd tab start -->
                    <div class="tab-pane fade" id="BestSellers">
                        <div class="row">
                            @foreach ($gadgetsMostsold as $gadget)
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <span class="badges">
                                        <span class="new">New</span>
                                    </span>
                                    <div class="thumb">
                                        <a href="single-product.html" class="image">
                                            <img src="storage/gadget_images/{{$gadget->gadget_image}}" alt="Product" />
                                            <img class="hover-image" src="storage/gadget_images/{{$gadget->gadget_image}}" alt="Product" alt="Product" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <span class="category"><a href="#">{{$gadget->gadget_category}}</a></span>
                                        <h5 class="title"><a href="single-product.html">{{$gadget->gadget_name}}
                                            </a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">{{$gadget->gadget_price}} $</span>
                                        </span>
                                    </div>
                                    <div class="actions">
                                        <button title="Add To Cart" class="action add-to-cart" ><a href="/add_to_cart/{{$gadget->id}}" style="color: aliceblue"><i
                                            class="pe-7s-shopbag"></i></a></button>
                                        
                                        <button  class="action wishlist" title="Wishlist" ><a href="/add_to_wishlist/{{$gadget->id}}" style="color: aliceblue"><i
                                                class="pe-7s-like"></i></a></button>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- 2nd tab end -->
                    <!-- 3rd tab start -->
                    <div class="tab-pane fade" id="Arrivals">
                        <div class="row">
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <span class="badges">
                                        <span class="new">New</span>
                                    </span>
                                    <div class="thumb">
                                        <a href="single-product.html" class="image">
                                            <img src="frontend/assets/images/product-image/1.webp" alt="Product" />
                                            <img class="hover-image" src="frontend/assets/images/product-image/1.webp" alt="Product" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <span class="category"><a href="#">Accessories</a></span>
                                        <h5 class="title"><a href="single-product.html">Modern Smart Phone
                                            </a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                    <div class="actions">
                                        <button title="Add To Cart" class="action add-to-cart" ><a href="/shop" style="color: aliceblue"><i
                                            class="pe-7s-shopbag"></i></a></button>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- 3rd tab end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End -->
<!-- Fashion Area Start -->
<div class="fashion-area" data-bg-image="{{asset('frontend/assets/images/fashion/fashion.jpg')}}">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 text-center">
                <h2 class="title"> <span>Smart Fashion</span> With Smart Devices </h2>
                <a href="/shop" class="btn btn-primary btn-custom text-capitalize m-auto" style="background-color:#2f4c86; border-color:#2f4c86;"   >Shop All Devices</a>
                <style>
                    .btn-primay:hover {
                        background-color: darkgreen;
                    }
                </style>
            </div>
        </div>
    </div>
</div>
<!-- Fashion Area End -->
<!-- Feature product area start -->
<div class="feature-product-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">Featured Offers</h2>
                    <p>Take advantage of our wonderful offers now !</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 mb-md-35px mb-lm-35px">
                <div class="single-feature-content">
                    <div class="feature-image">
                        <img src="frontend/assets/images/banner/collection.jpg" alt="">
                    </div>
                    <div class="top-content">
                        <h4 class="title" ><a href="/shop" style="color: #fff">Apple Collection </a></h4>
                        <span class="price">
                    <span class="old"><del>$48.50</del></span>
                        <span class="new">$38.50</span>
                        </span>
                    </div>
                    <div class="bottom-content">
                        <div class="deal-timing">
                            <div data-countdown="2023/09/15"></div>
                        </div>
                        <a href="/shop" class="btn  btn-primary btn-custom  m-auto"   > Shop
                            Now </a>
                        <style>
                            .btn-primay:hover {
                                background-color: darkgreen;
                            }
                        </style>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="feature-right-content">
                    <div class="image-side">
                        <img src="frontend/assets/images/banner/watch-2.jpg" alt=""> 
                        <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                            class="pe-7s-shopbag"></i></button>
                    </div>
                    <div class="content-side">
                        <div class="deal-timing" style="background-color: #2f4c86">
                            <span >End In:</span>
                            <div data-countdown="2024/09/15"></div>
                        </div>
                        <div class="prize-content">
                            <h5 class="title"><a href="single-product.html">Ladies Smart Watch  </a></h5>
                            <span class="price">
                                <span class="old">$48.50</span>
                                <span class="new">$38.50</span>
                            </span>
                        </div>
                        <div class="product-feature">
                            <ul>
                                <li>Type : <span>Google Nest Mini 2nd Generation.</span></li>
                                <li>Vesion : <span>GA01141.</span></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="feature-right-content mt-30px">
                    <div class="image-side">
                        <img src="frontend/assets/images/banner/google.jpg" alt="">
                        <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                            class="pe-7s-shopbag"></i></button>
                    </div>
                    <div class="content-side">
                        <div class="deal-timing" style="background-color: #2f4c86">
                            <span>End In:</span>
                            <div data-countdown="2023/09/15"></div>
                        </div>
                        <div class="prize-content">
                            <h5 class="title"><a href="single-product.html"> Smart Speaker</a></h5>
                            <span class="price">
                    <span class="old">$35.50</span>
                            <span class="new">$30.50</span>
                            </span>
                        </div>
                        <div class="product-feature">
                            <ul>
                                <li>Type : <span>Google Nest Mini 2nd Generation.</span></li>
                                <li>Vesion : <span>GA01141.</span></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature product area End -->

<!-- Brand area start -->
<div class="brand-area pt-100px pb-100px">
    <div class="container">
        <div class="brand-slider swiper-container">
            
            <a href="/about"><img class=" img-fluid" src="frontend/assets/images/partner/Why.jpg" alt="" /></a>
                
            
        </div>
    </div>
</div>
<!-- Brand area end -->


 {{--end - content--}}
@endsection       