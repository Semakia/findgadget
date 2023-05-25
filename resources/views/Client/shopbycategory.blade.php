@extends('layouts.app1')

@section('nav-shop')
<li class="dropdown position-static"><a href="/shop">Shop <i
    class="fa fa-angle-down"></i></a>
    <ul class="mega-menu d-block">
        <li class="d-flex">

            @foreach ($categories as $categorie)

                <ul class="d-block">
                    <li class="title"><a href="/shopByCategory/{{$categorie->category_name}}" class = "{{(request()->is('/shopBycategory/'.$categorie->category_name) )}}">{{$categorie->category_name}}</a></li>
                    @foreach ($categorie->gadgets as $gadget)
                        
                    <li style="display: flex; align-items: center;"><img src="/storage/gadget_images/{{$gadget->gadget_image}}" alt="" width="50" style="margin-right: 10px;" /><a href="">{{ $gadget->gadget_name }}</a></li>
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
       
       
@section('contenu')


<div class="breadcrumb-area1">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Shop</h2>
                <!-- breadcrumb-list start -->
               
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<!-- Shop Page Start  -->
<div class="shop-category-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar d-flex">
                    <p class="compare-product"> <span>{{$nbbycat}}</span> Product Found of <span>{{$nbProduct}}</span></p>
                    <!-- Left Side End -->
                    <div class="shop-tab nav">
                        <button class="active" data-bs-target="#shop-grid" data-bs-toggle="tab">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </button>
                        <button data-bs-target="#shop-list" data-bs-toggle="tab">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </button>
                    </div>
                    <!-- Right Side Start -->
                    <div class="select-shoing-wrap d-flex align-items-center">
                        <div class="shot-product">
                            <p>Sort By:</p>
                        </div>
                        <!-- Single Wedge End -->
                        <div class="header-bottom-set dropdown">
                            <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">Default <i class="fa fa-angle-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="/shopByName">Name, A to Z</a></li>
                                <li><a class="dropdown-item" href="/ShopByAlphabet">Name, Z to A</a></li>
                                <li><a class="dropdown-item" href="shopByPH">Price, low to high</a></li>
                                <li><a class="dropdown-item" href="/shopByPL">Price, high to low</a></li>
                                <li><a class="dropdown-item" href="/newgadgets">Sort By new</a></li>
                            </ul>
                        </div>
                        <!-- Single Wedge Start -->
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->
                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area">
                    <!-- Tab Content Area Start -->
                    <div class="row">
                        <div class="col">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="shop-grid">
                                    <div class="row mb-n-30px">
                                        @foreach ($gadgets as $gadget)

                                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                                    <!-- Single Prodect -->
                                                    <div class="product">
                                                        <span class="badges">
                                                        
                                                        </span>
                                                        <div class="thumb">
                                                            <a href="single-product.html" class="image">
                                                                <img src="/storage/gadget_images/{{$gadget->gadget_image}}" alt="Product" />
                                                                <img class="hover-image" src="/storage/gadget_images/{{$gadget->gadget_image}}" alt="Product" />
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
                                <div class="tab-pane fade mb-n-30px" id="shop-list">
                                    <div class="shop-list-wrapper mb-30px">
                                        <div class="row">
                                            @foreach ($gadgets as $gadget)
                                                            <div class="col-md-5 col-lg-5 col-xl-4 mb-lm-30px">
                                                                <div class="product">
                                                                    <div class="thumb">
                                                                        <a href="single-product.html" class="image">
                                                                            <img src="storage/gadget_images/{{$gadget->gadget_image}}" alt="Product" />
                                                                            <img class="hover-image" src="storage/gadget_images/{{$gadget->gadget_image}}" alt="Product" />
                                                                        </a>
                                                                        <span class="badges">
                                                                        
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-7 col-lg-7 col-xl-8">
                                                                <div class="content-desc-wrap">
                                                                    <div class="content">
                                                                        <span class="category"><a href="#">{{$gadget->gadget_category}}</a></span>
                                                                        <h5 class="title"><a href="single-product.html">{{$gadget->gadget_name}}</a></h5>
                                                                        <p>{{$gadget->description}}</p>
                                                                    </div>
                                                                    <div class="box-inner">
                                                                        <span class="price">
                                                                        <span class="new">{{$gadget->gadget_price}} $</span>
                                                                        </span>
                                                                        <div class="actions">
                                                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                                                                                class="pe-7s-shopbag"></i></button>
                                                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist"><i
                                                                                    class="pe-7s-like"></i></button>
                                                                            <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                                                            <button class="action compare" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal-Compare"><i
                                                                                    class="pe-7s-refresh-2"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab Content Area End -->
                    <!--  Pagination Area Start -->
                    <div class="pro-pagination-style text-center text-lg-end" data-aos="fade-up" data-aos-delay="200">
                        <div class="pages">
                            {{$gadgets->links()}}
                        </div>
                    </div>
                    <!--  Pagination Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>
        </div>
    </div>
</div>

 {{--end - content--}}
 @endsection       