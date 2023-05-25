@extends('layouts.admin')

@section('title')
    <title>Admin Area</title>
@endsection
{{Form::hidden('', $increment=1)}}
@section('contenu')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item active">Orders</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              @if (Session::has('error'))
                <div class="alert alert-danger">
                  {{ Session::get('error')}}
                </div>
              @endif
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Client's Firstname</th>
                    <th scope="col">Client's Lastname</th>
                    <th scope="col">Shipping Adress</th>
                    <th scope="col">Panier</th>
                    <th scope="col">Payment id</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($commande as $commande)
                  <tr>
                    <th scope="row">{{$increment}}</th>
                    <td>{{$commande->client_firstname}}</td>
                    <td>{{$commande->client_lastname}}</</td>
                    <td>{{$commande->adresse}}</td>
                    <td>
                      @foreach($commande->panier->items as $item)
                        {{$item['product_name'].' , '}}
                      @endforeach
                    </td>
                    <td>{{$commande->payment_id}}</td>
                    <td>
                      <button class = "btn btn-outline-success btn-sm"  onclick="window.location='{{url('/voir_pdf/'.$commande->id)}}'"><i class="bi bi-eye-fill"></i></button>
                     
                    </td>
                  </tr>
                  {{Form::hidden('', $increment=$increment+1)}}
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