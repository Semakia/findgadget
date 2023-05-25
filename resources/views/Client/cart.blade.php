
     
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
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">Cart</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- Cart Area Start -->
        <div class="cart-main-area pt-100px pb-100px">
            <div class="container">
                <h3 class="cart-page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
						                    
                                            <th>Image</th>
                                            <th>Gadget Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>&nbsp;</th>
						                    <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @if ($product != null)
                                            @foreach ($product as $productItem)

                                                <tr class="text-center">
                                                <td class="product-remove"><a href="/remove_product/{{$productItem['product_id']}}"><span class="ion-ios-close"></span></a></td>
                                                
                                                <td class="image-prod"> <a href="#"><img class="img-responsive ml-15px" src="/storage/gadget_images/{{$productItem['product_image']}}" alt="" /></a></td>
                                                
                                                <td class="product-name">
                                                    <h3>{{$productItem['product_name']}}</h3>
                                                    {{--<p>Far far away, behind the word mountains, far from the countries</p>--}}
                                                </td>
                                                
                                                <td class="price">{{$productItem['product_price']}}</td>
                                                
                                                <form action="{{ url('/modifier_qty/' . $productItem['product_id']) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <td class="product-quantity">
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" type="number" name="quantity" value="{{ $productItem['qty'] }}" min="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-success" style="width: 70px; height: 40px;">Edit</button>
                                                    </td>
                                                </form>
                                                
                                                <td class="total">${{$productItem['product_price']*$productItem['qty']}}</td>
                                                </tr><!-- END TR-->
                                                @endforeach
                                        @else
                                            <li>Your cart is empty</li>
                                        @endif
              
                                         
                                       {{-- @if ($product != null)
                                            @foreach ($product as $productItem)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="#"><img class="img-responsive ml-15px" src="/storage/gadget_images/{{$productItem['product_image']}}" alt="" /></a>
                                                </td>
                                                <td class="product-name"><a href="#">{{$productItem['product_name']}}</a></td>
                                                <td class="product-price-cart"><span class="amount">{{$productItem['product_price']}}</span></td>
                                                
                                                <form action="{{url('/modifier_qty/'.$productItem['product_id'])}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <td class="product-quantity">
                                                            <div class="cart-plus-minus">
                                                                <input class="cart-plus-minus-box" type="number" name="quantity" value="{{$productItem['qty']}}" min="1" />
                                                            </div>
                                                            <button class="" title="Update Quantity" type="submit">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                    </td>
                                                </form>
                                                
                                                
                                                    <td class="product-subtotal">{{$productItem['qty']}}</td>
                                                    <td class="product-remove">

                                                        <button class="" title="Wishlist" type="submit">
                                                            <a><i class="fa fa-pencil"></i></a>
                                                        </button>
                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                    </td>
                                                
                                            </tr> 
                                            @endforeach
                                            @else
                                            <li>Your cart is empty</li>
                                        @endif--}}
                                        
                                        
                                    </tbody>
                                    @if (Session::has('status'))
                                        <div class="alert alert-success">
                                            {{Session::get('status')}}
                                        </div>
                                        
                                    @endif
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="#">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <button>Update Shopping Cart</button>
                                            <a href="#">Clear Shopping Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-lm-30px">
                                <div class="cart-tax">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                    </div>
                                    <div class="tax-wrapper">
                                        <p>Enter your destination to get a shipping estimate.</p>
                                        <div class="tax-select-wrapper">
                                            <div class="tax-select">
                                                <label>
                                                    * Country
                                                </label>
                                                <select class="email s-email s-wid">
                                                    <option>Bangladesh</option>
                                                    <option>Albania</option>
                                                    <option>Åland Islands</option>
                                                    <option>Afghanistan</option>
                                                    <option>Belgium</option>
                                                </select>
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    * Region / State
                                                </label>
                                                <select class="email s-email s-wid">
                                                    <option>Bangladesh</option>
                                                    <option>Albania</option>
                                                    <option>Åland Islands</option>
                                                    <option>Afghanistan</option>
                                                    <option>Belgium</option>
                                                </select>
                                            </div>
                                            <div class="tax-select mb-25px">
                                                <label>
                                                    * Zip/Postal Code
                                                </label>
                                                <input type="text" />
                                            </div>
                                            <button class="cart-btn-2" type="submit">Get A Quote</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-lm-30px">
                                <div class="discount-code-wrapper">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                    </div>
                                    <div class="discount-code">
                                        <p>Enter your coupon code if you have one.</p>
                                        <form>
                                            <input type="text" required="" name="name" />
                                            <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 mt-md-30px">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>
                                    <h5>Total products <span>${{$cart->totalPrice}}</span></h5>
                                    <div class="total-shipping">
                                        <h5>Total shipping</h5>
                                        <ul>
                                            <li><input type="checkbox" id="standard-shipping" /> Standard <span>$20.00</span></li>
                                            <li><input type="checkbox"  id="express-shipping" /> Express <span>$30.00</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="grand-totall-title">Grand Total <span id="grand-total" >${{$cart->totalPrice}}</span></h4>
                                    <a href="/checkout">Proceed to Checkout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function updateTotal() {
                var totalPrice = {{ $cart->totalPrice }};
                var standardShipping = document.getElementById("standard-shipping").checked;
                var expressShipping = document.getElementById("express-shipping").checked;
        
                if (standardShipping) {
                    totalPrice += 20;
                }
        
                if (expressShipping) {
                    totalPrice += 30;
                }
        
                document.getElementById("grand-total").textContent = "$" + totalPrice.toFixed(2);
            }
        </script>
        <!-- Cart Area End -->
    
 {{--end - content--}}
 
 @endsection  