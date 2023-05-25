@extends('layouts.admin')

@section('title')
    <title>Add gadget</title>
@endsection

@section('contenu')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Adding form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item">Gadgets</li>
          <li class="breadcrumb-item active">Add gadet</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Enter gadget's infos</h5>
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
                 
                    {!!Form::open(['action' => 'GadgetController@savegadget', 'method' => 'POST', 'class' => 'row g-3', 'enctype' => 'multipart/form-data'])!!}
                     {{csrf_field()}}
                    <div class="col-12">
                        {{Form::label('', 'Gadget'."'".'s Name', ['for' => 'inputNanme4' , 'class' =>'form-label'])}}
                        {{Form::text('gadget_name', '', ['class' => 'form-control' , 'id'=>'inputNanme4'])}}
                     {{--<label for="inputNanme4" class="form-label">Category's Name</label>
                      <input type="text" class="form-control" id="inputNanme4">--}} 
                    </div>

                    <div class="col-12">
                        {{Form::label('', 'Gadget'."'".'s Price', ['for' => 'inputNanme4' , 'class' =>'form-label'])}}
                        {{Form::number('gadget_price', '', ['class' => 'form-control' , 'id'=>'inputNanme4'])}}
                     {{--<label for="inputNanme4" class="form-label">Category's Name</label>
                      <input type="text" class="form-control" id="inputNanme4">--}} 
                    </div>

                    <div class="col-12">
                        {{Form::label('', 'Gadget'."'".'s category')}}
                        {{Form::select('gadget_category',  $categories->pluck('category_name', 'category_name') , null,  ['placeholder' => 'Select category','class' => 'form-control' , 'id'=>'inputNanme4'])}}
                     {{--<label for="inputNanme4" class="form-label">Category's Name</label>
                      <input type="text" class="form-control" id="inputNanme4">--}} 
                    </div>
 
                    <div class="col-12">
                        {{Form::label('', 'Gadget'."'".'s Image', ['for' => 'inputNanme4' , 'class' =>'form-label'])}}
                        {{Form::file('gadget_image',  ['class' => 'form-control' , 'id'=>'inputNanme4'])}}
                     {{--<label for="inputNanme4" class="form-label">Category's Name</label>
                      <input type="text" class="form-control" id="inputNanme4">--}} 
                    </div>

                    <div class="col-12">
                        {{Form::label('', 'Gadget'."'".'s description', ['for' => 'inputNanme4' , 'class' =>'form-label'])}}
                        {{Form::textarea('gadget_description', '', ['class' => 'form-control' , 'id'=>'inputNanme4'])}}
                     {{--<label for="inputNanme4" class="form-label">Category's Name</label>
                      <input type="text" class="form-control" id="inputNanme4">--}} 
                    </div>
                    
                    <div class="text-center">
                            {!!Form::submit('Add', ['class' => 'btn btn-primary'] )!!}
                            
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