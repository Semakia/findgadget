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



<div class="breadcrumb-area">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-12 text-center">
				<h2 class="breadcrumb-title">Checkout</h2>
				<!-- breadcrumb-list start -->
				<ul class="breadcrumb-list">
					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item active">Checkout</li>
				</ul>
				<!-- breadcrumb-list end -->
			</div>
		</div>
	</div>
</div>
<!-- breadcrumb-area end -->
<!-- checkout area start -->
<div class="checkout-area pt-100px pb-100px">
	
	<div class="container">
		<div class="row">
			
				<div class="col-lg-7">
					<div class="billing-info-wrap">
						@if (Session::has('status'))
						<div class="alert alert-success">
							{{Session::get('status')}}
							{{Session::put('status', null)}}
						</div>
						@elseif (Session::has('error'))
							<div class="alert alert-danger">
								{{ Session::get('error')}}
							</div>
						@endif
						
						<form action="{{url('/to_pay')}}" class=" row g-3" id="checkout-form" method="POST">
							{{ csrf_field() }}
							
							<h3>Billing Details</h3>
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="billing-info mb-4">
										<label for = "firstname">First Name</label>
										<input type="text" name="firstname" />
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="billing-info mb-4">
										<label for="lastname">Last Name</label>
										<input type="text" name="lastname" />
									</div>
								</div>
								<div class="col-lg-12">
									<div class="billing-info mb-4">
										<label for="company_name">Company Name</label>
										<input type="text" name="company_name" />
									</div>
								</div>
								<div class="col-lg-12">
									<div class="billing-select mb-4">
										<label for="country">Country</label>
										<select name="country">
											<option>Select a country</option>
											<option>Azerbaijan</option>
											<option>Bahamas</option>
											<option>Bahrain</option>
											<option>Bangladesh</option>
											<option>Barbados</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="billing-info mb-4">
										<label for = "Street">Street Address</label>
										<input class="billing-address" placeholder="House number and street name" type="text" name="Street"/>
										<input placeholder="Apartment, suite, unit etc." type="text" name="apartment"/>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="billing-info mb-4">
										<label for = "city">Town / City</label>
										<input type="text" name="city"/>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="billing-info mb-4">
										<label for = "state">State / County</label>
										<input type="text" name="state"/>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="billing-info mb-4">
										<label for="postcode">Postcode / ZIP</label>
										<input type="text" name="postcode"/>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="billing-info mb-4">
										<label  for="phone">Phone</label>
										<input type="text" name="phone"/>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="billing-info mb-4">
										<label for="email">Email Address</label>
										<input type="text" name="email" />
									</div>
								</div>
								<div class="col-lg-12">
									<div class="billing-select mb-4">
									  <label>Type de carte</label>
									  <select id="card-type" name="card-type">
										<option value="">Sélectionnez un type de carte</option>
										<option value="visa">Visa</option>
										<option value="mastercard">Mastercard</option>
										<option value="amex">American Express</option>
									  </select>
									</div>
								  </div>
								<div class="col-lg-12">
									<div class="billing-info mb-4">
										
										<label>Name on Card</label>
										<input type="text" class="form-control" id="card-name" name="card-name"/>
									</div>
								</div>

								<div class="col-lg-12">
									<div class="billing-info mb-4">
										
										<label>Number</label>
										<input type="text" class="form-control" id="card-number"/>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="billing-info mb-4">
										
										<label>Expiration Month</label>
										<input type="text" class="form-control" id="card-expiry-month"/>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="billing-info mb-4">
										<label>Expiration Year</label>
										<input type="text" id="card-expiry-year" class="form-control" />
									</div>
								</div>
								<div class=" col-md-6">
									<div class="billing-info mb-4">
										<label>CVC</label>
										<input type="text" id="card-cvc" class="form-control" />
									</div>
								</div>
							</div>

						
							
							{{--<div class="checkout-account mb-30px">
								<input class="checkout-toggle2 w-auto h-auto" type="checkbox" />
								<label>Create an account?</label>
							</div>
							<div class="checkout-account-toggle open-toggle2 mb-30">
								<input placeholder="Email address" type="email" />
								<input placeholder="Password" type="password" />
								<button class="btn-hover checkout-btn" type="submit">register</button>
							</div>--}}
							<div class="additional-info-wrap">
								<h4>Additional information</h4>
								<div class="additional-info">
									<label>Order notes</label>
									<textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="message"></textarea>
								</div>
							</div>
							<div class="checkout-account mt-25">
								<input class="checkout-toggle w-auto h-auto" type="checkbox" />
								<label for="ship_different_address">Ship to a different address?</label>
							</div>
						
							
							<div class="different-address open-toggle mt-30px">
								<div class="row">
									<div class="col-lg-6 col-md-6">
										<div class="billing-info mb-4">
											<label for = "firstname1">First Name</label>
											<input type="text" name="firstname1" />
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="billing-info mb-4">
											<label for="lastname1">Last Name</label>
											<input type="text" name="lastname1" />
										</div>
									</div>
									<div class="col-lg-12">
										<div class="billing-info mb-4">
											<label for="company_name1">Company Name</label>
											<input type="text" name="company_name1" />
										</div>
									</div>
									<div class="col-lg-12">
										<div class="billing-select mb-4">
											<label for="country1">Country</label>
											<select name="country1">
												<option>Select a country</option>
												<option>Azerbaijan</option>
												<option>Bahamas</option>
												<option>Bahrain</option>
												<option>Bangladesh</option>
												<option>Barbados</option>
											</select>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="billing-info mb-4">
											<label for = "Street1">Street Address</label>
											<input class="billing-address" placeholder="House number and street name" type="text" name="Street1" />
											<input placeholder="Apartment, suite, unit etc." type="text" name="appart1" />
										</div>
									</div>
									<div class="col-lg-12">
										<div class="billing-info mb-4">
											<label for = "city1">Town / City</label>
											<input type="text" name="city1" />
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="billing-info mb-4">
											<label for="state1">State / County</label>
											<input type="text" name="state1" />
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="billing-info mb-4">
											<label for="postcode1">Postcode / ZIP</label>
											<input type="text"  name="postcode1"/>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="billing-info mb-4">
											<label for="phone1">Phone</label>
											<input type="text" name="phone1" />
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="billing-info mb-4">
											<label for="email1">Email Address</label>
											<input type="text" name="email1"/>
										</div>
									</div>

									{{--<div class="col-lg-12">
										<div class="billing-info mb-4">
											<label>Name on Card</label>
											<input type="text" class="form-control" id="card-name" name="card-name"/>
										</div>
									</div>
			
									<div class="col-lg-12">
										<div class="billing-info mb-4">
											<label>Number</label>
											<input type="text" class="form-control" id="card-number"/>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="billing-info mb-4">
											<label>Expiration Month</label>
											<input type="text" class="form-control" id="card-expiry-month"/>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="billing-info mb-4">
											<label>Expiration Year</label>
											<input type="text" id="card-expiry-year" class="form-control" />
										</div>
									</div>
									<div class=" col-md-6">
										<div class="billing-info mb-4">
											<label>CVC</label>
											<input type="text" id="card-cvc" class="form-control" />
										</div>
									</div>--}}
								</div>
								
							</div>
							<div class="Place-order mt-25">
								<input type="submit" id="card-cvc" class="btn-hover text-center text-white" value="Place Order" style="background-color: #012970 ">
							</div>
						</form>
					</div>
						
			
				

				</div>
				<div class="col-lg-5 mt-md-30px mt-lm-30px ">
					<div class="your-order-area">
						<h3>Your order</h3>
						<div class="your-order-wrap gray-bg-4">
							<div class="your-order-product-info">
								<div class="your-order-top">
									<ul>
										<li>Product</li>
										<li>Total</li>
									</ul>
								</div>
								<div class="your-order-middle">
									<ul>
										@if ($product != null)
										@foreach ($product as $productItem)
										<li><span class="order-middle-left">{{$productItem['product_name']}} X {{ $productItem['qty'] }}</span> <span
											class="order-price">${{$productItem['product_price']*$productItem['qty']}} </span></li>
				
										@endforeach
										@endif
									</ul>
								</div>
								{{--<div class="your-order-bottom">
									<ul>
										<li class="your-order-shipping">Shipping</li>
										<li>Free shipping</li>
									</ul>
								</div>--}}
								<div class="your-order-total">
									<ul>
										<li class="order-total">Total</li>
										<li>{{Session::get('cart')->totalPrice}}</li>
									</ul>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
			
		</div>
		
	</div>
	
</div>

@endsection 