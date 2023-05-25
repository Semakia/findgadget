@extends('layouts.admin')

@section('title')
    <title>Admin Area</title>
@endsection

@section('contenu')
{{Form::hidden('', $increment=1)}}
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Sliders</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item active">Sliders</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sliders</h5>
              @if (Session::has('status'))
              <div class="alert alert-success">
                  {{Session::get('status')}}
                  {{Session::put('status', null)}}
              </div>
              @endif

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Order </th>
                    <th scope="col">Image</th>
                    <th scope="col">Description 1</th>
                    <th scope="col">Description 2</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sliders as $slider)
                        <tr>
                          <th scope="row">{{$increment}}</th>
                          <th scope="row"><a href=""><img src="/storage/slider_images/{{$slider->slider_image}}" alt="" width="50"></a></th>
                          <td>{{$slider->Description_one}}</td>
                          <td>{{$slider->Description_two}}</td>
                          
                          <td>
                            @if ($slider->status == 1) 
                                <label class = "badge rounded-pill bg-success">Activated</label>
                            @else
                                <label class = "badge rounded-pill bg-danger">disabled</label>
                            @endif
                          </td>
                          <td>
                          <button class = "btn btn-outline-info btn-sm" onclick="window.location='{{url('/edit_slider/'.$slider->id)}}'"><i class="ri-edit-2-fill"></i></button>
                          <a href="{{URL('/deleteslider/'.$slider->id)}}" id ="delete" class ="btn btn-outline-danger"><i class="ri-delete-bin-5-fill"></i></a>

                          @if ($slider->status==1)
                            <button class = "btn btn-outline-warning" onclick="window.location='{{url('/desactiver_slider/'.$slider->id)}}'"><i class="bi bi-exclamation-triangle"></i></button>

                          @else
                          <button class = "btn btn-outline-success " onclick="window.location='{{url('/activer_slider/'.$slider->id)}}'"><i class="bi bi-check-circle"></i></button>
                          @endif
                        </td>
                        </tr>
                       {{Form::hidden('', $increment = $increment + 1)}}     
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