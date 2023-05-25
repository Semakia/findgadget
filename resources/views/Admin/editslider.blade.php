@extends('layouts.admin')

@section('title')
    <title>Edit slider</title>
@endsection

@section('contenu')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Editing form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item">Gadgets</li>
          <li class="breadcrumb-item active">Edit slider </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Enter slider's infos</h5>
                  @if (Session::has('status'))
                  <div class="alert alert-success">
                      {{Session::get('status')}}
                      {{Session::put('status', null)}}
                  </div>
                  
                  @endif

                  @if(count($errors)>0)
                  <div class = "alert alert-danger">
                    <ul>
                        @foreach($errors -> all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                  </div>
                  @endif
                  <!-- Vertical Form -->
                 
                    {!!Form::open(['action' => 'SliderController@editslider', 'method' => 'POST', 'class' => 'row g-3', 'enctype' => 'multipart/form-data'])!!}
                     {{csrf_field()}}
                    <div class="col-12">
                        {{Form::hidden('id', $slider->id)}}
                        {{Form::label('', 'Description One', ['for' => 'inputNanme4' , 'class' =>'form-label'])}}
                        {{Form::text('description1', $slider->Description_one, ['class' => 'form-control' , 'id'=>'inputNanme4'])}}
                     {{--<label for="inputNanme4" class="form-label">Category's Name</label>
                      <input type="text" class="form-control" id="inputNanme4">--}} 
                    </div>

                    <div class="col-12">
                        {{Form::label('', 'Description Two', ['for' => 'inputNanme4' , 'class' =>'form-label'])}}
                        {{Form::text('description2', $slider->Description_two, ['class' => 'form-control' , 'id'=>'inputNanme4'])}}
                     {{--<label for="inputNanme4" class="form-label">Category's Name</label>
                      <input type="text" class="form-control" id="inputNanme4">--}} 
                    </div>

                  
 
                    <div class="col-12">
                        {{Form::label('', 'Image', ['for' => 'inputNanme4' , 'class' =>'form-label'])}}
                        {{Form::file('slider_image',  ['class' => 'form-control' , 'id'=>'inputNanme4'])}}
                     {{--<label for="inputNanme4" class="form-label">Category's Name</label>
                      <input type="text" class="form-control" id="inputNanme4">--}} 
                    </div>

                    
                    
                    <div class="text-center">
                            {!!Form::submit('Edit', ['class' => 'btn btn-primary'] )!!}
                            
                    </div>
                    
                  {!!Form::close()!!}
                  <!-- Vertical Form -->
    
                </div>
              </div>

        </div>
      </div>

</section >
</main>
    
@endsection



@section('scripts')
    <!-- Vendor JS Files -->
 {{-- <script src="adminfront/assets/vendor/apexcharts/apexcharts.min.js"></script>
 <script src="adminfront/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="adminfront/assets/vendor/chart.js/chart.umd.js"></script>
 <script src="adminfront/assets/vendor/echarts/echarts.min.js"></script>
 <script src="adminfront/assets/vendor/quill/quill.min.js"></script>
 <script src="adminfront/assets/vendor/simple-datatables/simple-datatables.js"></script>
 <script src="adminfront/assets/vendor/tinymce/tinymce.min.js"></script>
 <script src="adminfront/assets/vendor/php-email-form/validate.js"></script>
--}}
  <!-- Template Main JS File -->
  <script src="adminfront/assets/js/main.js"></script>

@endsection