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


@section('contenu')
	
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-12 text-center">
					<h2 class="breadcrumb-title">Login</h2>
					<!-- breadcrumb-list start -->
					<ul class="breadcrumb-list">
						<li class="breadcrumb-item"><a href="index.html">Home</a></li>
						<li class="breadcrumb-item active">Login</li>
					</ul>
					<!-- breadcrumb-list end -->
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb-area end -->
	<!-- login area start -->
	<div class="login-register-area pt-100px pb-100px">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-7 col-md-12 ml-auto mr-auto">

					<div class="login-register-wrapper">
						<div class="login-register-tab-list nav">
							<a class="active" data-bs-toggle="tab" href="#lg1">
								<h4>login</h4>
							</a>
							<a data-bs-toggle="tab" href="#lg2">
								<h4>register</h4>
							</a>
						</div>
						<div class="tab-content">
							<div id="lg1" class="tab-pane active">
								<div class="login-form-container">
								@if (Session::has('status'))
									<div class="alert alert-success">
										{{Session::get('status')}}
										{{Session::put('status', null)}}
									</div>
								@elseif (count($errors)>0)
									<div class = "alert alert-danger">
									<ul>
										@foreach($errors -> all() as $error)
											<li>{{$error}}</li>
										@endforeach
									</ul>
									</div>
								@endif
									<div class="login-register-form">
										<form action="{{url('/connect_account')}}" method="post">
											{{ csrf_field() }}
											<input name="email" placeholder="Email" type="email" />

											<input type="password" name="user-password" placeholder="Password" />
											<div class="button-box">
												<div class="login-toggle-btn">
													<input type="checkbox" />
													
													<a href="#">Forgot Password?</a>
												</div>
												<button type="submit" ><span>Login</span></button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div id="lg2" class="tab-pane">
								<div class="login-form-container">
									@if (Session::has('status'))
										<div class="alert alert-success">
											{{Session::get('status')}}
											{{Session::put('status', null)}}
										</div>
									@elseif (count($errors)>0)
										<div class = "alert alert-danger">
										<ul>
											@foreach($errors -> all() as $error)
												<li>{{$error}}</li>
											@endforeach
										</ul>
										</div>
									@endif
									<div class="login-register-form">
										<form action="{{url('/create_account')}}" method="post">
											{{ csrf_field() }}
											<input type="text" name="user-name" placeholder="Username" />
											<input type="password" name="user-password" placeholder="Password" />
											<input name="email" placeholder="Email" type="email" />
											<div class="button-box">
												<button type="submit"><span>Register</span></button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection 


