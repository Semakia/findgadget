@extends('layouts.admin')

@section('title')
    <title>Admin Area</title>
@endsection

@section('contenu')
    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Gadgets</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
            <li class="breadcrumb-item">Gadgets</li>
            <li class="breadcrumb-item active"></li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Categories</h5>

                @if (Session::has('status'))
                <div class="alert alert-success">
                    {{Session::get('status')}}
                    {{Session::put('status', null)}}
                </div>
                
                @endif
  
                <!-- Default Table -->
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                      <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>
                          <button class = "btn btn-outline-info" onclick="window.location='{{url('/edit_category/'.$category->id)}}'"><i class="ri-edit-2-fill"></i></button>
                          <a href="{{URL('/deletecategory/'.$category->id)}}" id ="delete" class ="btn btn-outline-danger"><i class="ri-delete-bin-5-fill"></i></a>
                        </td> 
                      </tr>
                        
                    @endforeach
                   
                  </tbody>
                </table>
                <!-- End Default Table Example -->
              </div>
            </div>
  
  
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Gadgets</h5>

                @if (Session::has('status'))
                <div class="alert alert-success">
                    {{Session::get('status')}}
                    {{Session::put('status', null)}}
                </div>
                
                @endif
  
                <!-- Table with stripped rows -->
                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Image</th>
                      <th scope="col">Description</th>
                      <th scope="col">Price</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($gadgets as $gadget)
                        <tr>
                          <th scope="row">{{$gadget->id}}</th>
                          <td>{{$gadget->gadget_name}}</td>
                          <td>{{$gadget->gadget_category}}</td>
                          
                          <th scope="row"><a href=""><img src="/storage/gadget_images/{{$gadget->gadget_image}}" alt="" width="50"></a></th>
                          <td>{{$gadget->description}}</td>
                          <td>{{$gadget->gadget_price}}</td>
                          <td>
                            @if ($gadget->status == 1) 
                                <label class = "badge rounded-pill bg-success">Available</label>
                            @else
                                <label class = "badge rounded-pill bg-danger">Unavailable</label>
                            @endif
                          </td>
                          <td>
                          <button class = "btn btn-outline-info btn-sm" onclick="window.location='{{url('/edit_gadget/'.$gadget->id)}}'"><i class="ri-edit-2-fill"></i></button>
                          <a href="{{URL('/deletegadget/'.$gadget->id)}}" id ="delete" class ="btn btn-outline-danger btn-sm"><i class="ri-delete-bin-5-fill"></i></a>

                          @if ($gadget->status==1)
                            <button class = "btn btn-outline-warning btn-sm" onclick="window.location='{{url('/desactiver_gadget/'.$gadget->id)}}'"><i class="bi bi-exclamation-triangle "></i></button>

                          @else
                          <button class = "btn btn-outline-success btn-sm" onclick="window.location='{{url('/activer_gadget/'.$gadget->id)}}'"><i class="bi bi-check-circle "></i></button>
                          @endif
                        </td>
                        </tr>
                            
                    @endforeach
                    
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
  
            
  
            
  
            
  
          </div>
        </div>
      </section>

    </main>
    
@endsection

@section('scripts')
  <script src="adminfront/assets/js/main.js"></script>
@endsection