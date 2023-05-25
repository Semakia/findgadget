@extends('layouts.admin')

@section('title')
    <title>Admin Area</title>
@endsection

@section('contenu')
    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Users</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Admin</a></li>
            <li class="breadcrumb-item active">Users</li>
            
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">All Users</h5>
  
                <!-- Default Table -->
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Password</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $users)

                    <tr>
                      <th scope="row">{{$users->id}}</th>
                      <td> {{$users->name}}</td>
                      <td>{{$users->email}}</td>
                      <td>{{$users->password}}</td>
              
                    </tr>
                        
                    @endforeach
                    
                    
                  </tbody>
                </table>
                <!-- End Default Table Example -->
              </div>
            </div>
  
            
  
            
  
           
  
            
  
          </div>
  
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Recent Users</h5>
  
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Password</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($usersbyTd as $usersbyTd)

                    <tr>
                      <th scope="row">{{$usersbyTd->id}}</th>
                      <td> {{$usersbyTd->name}}</td>
                      <td>{{$usersbyTd->email}}</td>
                      <td>{{$usersbyTd->password}}</td>
              
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