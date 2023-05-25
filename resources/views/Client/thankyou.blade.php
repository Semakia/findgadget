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

@section('contenu')
<div class="thank-you-area">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="inner_complated">
                    <div class="img_cmpted"><img src="assets/images/icons/cmpted_logo.png" alt=""></div>
                    <p class="dsc_cmpted">Thank you for ordering in our store. You will receive a confirmation
                        email shortly.</p>
                    <div class="btn_cmpted">
                        <a href="shop-4-column.html" class="shop-btn" title="Go To Shop">Continue Shopping </a>
                    </div>
                </div>
                <div class="main_quickorder text-align-center">
                    <h3 class="title">Call Us for Quick Order</h3>
                    <div class="cntct typewriter-effect"><span class="call_desk"><a href="tel:+01234567890" id="typewriter_num">01 234 567 890</a></span></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection  