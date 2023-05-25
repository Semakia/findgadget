@extends('layouts.app1')

@section('name')
    <title>Hmart - Track my Order </title>
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

 {{--Start-content--}}


        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">Order Tracking</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Order Tracking</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!--order-tracking area start-->
        <div class="pt-100px pb-100px">
            <div class="container">
                <div class="order-tracking">
                    <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                    <form action="#">
                        <div class="row mb-n-30px">
                            <div class="col-12 mb-30px">
                                <label for="orderID">Order ID</label>
                                <input id="orderID" type="text" placeholder="Found in your order confirmation email.">
                            </div>
                            <div class="col-12 mb-30px">
                                <label for="billingEmail">Billing email</label>
                                <input id="billingEmail" type="text" placeholder="Email you used during checkout.">
                            </div>
                            <div class="col-12 text-center mb-30px">
                                <button class="btn btn-dark btn-outline-hover-dark">Track</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--order-tracking Policy area end-->
        
 {{--end - content--}}
 @endsection       