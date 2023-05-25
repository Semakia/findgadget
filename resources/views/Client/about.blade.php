 
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
       
 @section('contenu')

 {{--Start-content--}}


        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area 1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">About Us</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list" style="color:#fff">
                            We strictly test and carefully select each item before it reaches you.
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- About section Start -->
        <div class="about-area pt-100px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="about-wrapper text-center">
                            <div class="about-contant">
                                <h2 class="title">
                                    <span>Smart Fashion </span>
                                    With Smart Devices
                                </h2>
                                <p>What makes Us different from other stores is that team members would rigorously select each item and rigorously tested in multiple rounds. That would ensure quality and reliable functionality before it is ready for sale. Finally, these items are delivered to you.

                                    We have a dedicated testing lab where we receive preliminary products from our marketing and purchasing teams every day for multiple rounds of testing.</p>
                            </div>
                            <div class="promo-video">
                                <img src="frontend/assets/images/about/logo.jpg" alt="">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About section End -->
        <!-- Team Area Start -->
        <div class="team-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title line-height-1">Why choose us ?</h2>
                            <p>We are proud to be your number one choice for buying gadgets online. Here are some reasons why we are the best choice:</p>
                            <div class="why-us-list">
                                <div class="why-us-item">
                                    <i class="fa fa-check"></i>
                                    wide selection of gadgets: We offer a wide range of innovative and trendy gadgets to meet all your technological needs.
                                </div>
                                <div class="why-us-item">
                                    <i class="fa fa-check"></i>                  
                                    Premium Quality: All of our gadgets are carefully selected and tested to ensure exceptional quality and optimal performance.
                                </div>
                
                                <div class="why-us-item">
                                    <i class="fa fa-check"></i>
                                    Exceptional Customer Experience: Our dedicated team is here to assist you every step of the way, from product selection to after-sales, to provide you with an exceptional customer experience.
                                </div>
                                <div class="why-us-item">
                                    <i class="fa fa-check"></i>
                                    Fast and Secure Delivery: We are committed to delivering your gadgets quickly and securely, right to your doorstep.
                                </div>
                              
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Team Area End -->
        <!-- Feature Area Srart -->
        <div class="feature-area pt-100px pb-100px">
            <div class="container">
                <div class="feature-wrapper">
                    <div class="single-feture-col mb-md-30px mb-lm-30px">
                        <!-- single item -->
                        <div class="single-feature">
                            <div class="feature-icon">
                                <img src="frontend/assets/images/icons/1.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Free Shipping</h4>
                                <span class="sub-title">Capped at $39 per order</span>
                            </div>
                        </div>
                    </div>
                    <!-- single item -->
                    <div class="single-feture-col mb-md-30px mb-lm-30px">
                        <div class="single-feature">
                            <div class="feature-icon">
                                <img src="frontend/assets/images/icons/2.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Card Payments</h4>
                                <span class="sub-title">12 Months Installments</span>
                            </div>
                        </div>
                    </div>
                    <!-- single item -->
                    <div class="single-feture-col">
                        <div class="single-feature">
                            <div class="feature-icon">
                                <img src="frontend/assets/images/icons/3.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Easy Returns</h4>
                                <span class="sub-title">Shop With Confidence</span>
                            </div>
                        </div>
                        <!-- single item -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Area End -->
        <!-- Testimonial area start -->
        
        <!-- Blog area start from here -->
        
        <!-- Blog area end here -->


  {{--end - content--}}   
  
@endsection  
