
@extends('layouts.app1')

@section('name')
    <title>Hmart - contact </title>
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
       
@section('contenu')


<div class="breadcrumb-area2">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title" style="color: #fff">Contact Us</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<!-- Contact Area Start -->
<div class="contact-area">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">Send A Quest</h2>
                        </div>
                        <form class="contact-form-style" id="contact-form" action="mailto:fgroupworldwide@protonmail.com" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input name="name" placeholder="Name*" type="text" />
                                </div>
                                <div class="col-lg-6">
                                    <input name="email" placeholder="Email*" type="email" />
                                </div>
                                <div class="col-lg-12">
                                    <input name="subject" placeholder="Subject*" type="text" />
                                </div>
                                <div class="col-lg-12 text-center">
                                    <textarea name="message" placeholder="Your Message*"></textarea>
                                    <button class="btn btn-primary" style="background-color:#2f4c86; border-color:#2f4c86;" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="contact-info">
                        <div class="single-contact">
                            <div class="icon-box">
                                <img src="frontend/assets/images/icons/house-chimney.png" alt="">
                            </div>
                            <div class="info-box">
                                <h5 class="title">Address</h5>
                                <p>Your address goes here. <br>
                                123 Your Location</p>
                            </div>
                        </div>
                        <div class="single-contact">
                            <div class="icon-box">
                                <img src="frontend/assets/images/icons/phone-call.png" alt="">
                            </div>
                            <div class="info-box">
                                <h5 class="title">Phone No</h5>
                                <p><a href="tel:0123456789">+012 345 67 89</a></p>
                                <p><a href="tel:0123456789">+012 345 67 89</a></p>
                            </div>
                        </div>
                        <div class="single-contact m-0">
                            <div class="icon-box">
                                <img src="frontend/assets/images/icons/at.png" alt="">
                            </div>
                            <div class="info-box">
                                <h5 class="title">Email/Web</h5>
                                <p><a href="mailto:demo@example.com">demo@example.com</a></p>
                                <p><a href="https://www.example.com">www.example.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Area End -->
<!-- map Area Start -->
<div class="contact-map">
    <div id="mapid">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                <a href="https://sites.google.com/view/maps-api-v2/mapv2"></a>
            </div>
        </div>
    </div>
</div>

@endsection 