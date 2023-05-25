<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  @yield('title')

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{--<link href="{{asset("adminfront/assets/img/favicon.png")}}" rel="icon">
  <link href="{{asset("adminfront/assets/img/apple-touch-icon.png")}}" rel="apple-touch-icon">--}}

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset("adminfront/assets/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("adminfront/assets/vendor/bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet">
  <link href="{{asset("adminfront/assets/vendor/boxicons/css/boxicons.min.css")}}" rel="stylesheet">
  <link href="{{asset("adminfront/assets/vendor/quill/quill.snow.css")}}" rel="stylesheet">
  <link href="{{asset("adminfront/assets/vendor/quill/quill.bubble.css")}}" rel="stylesheet">
  <link href="{{asset("adminfront/assets/vendor/remixicon/remixicon.css")}}" rel="stylesheet">
  <link href="{{asset("adminfront/assets/vendor/simple-datatables/style.css")}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset("adminfront/assets/css/style.css")}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>


<body>

    <!-- ======= Header ======= -->

        {{--Start navbar1--}}

        @include('include.navbar1')

        {{--End navbar1--}}


    <!-- End Header -->


  
    {{--Start navbar2--}}

    @include('include.navbar2')

    {{--End navbar2--}}



  <!--Start content-->

  @yield('contenu')

  <!--end content-->



 <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright 2023 <strong><span>CoolAdmin</span></strong>. 
      </div>
      
    </footer><!-- End Footer -->
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{asset("adminfront/assets/vendor/apexcharts/apexcharts.min.js")}}"></script>
    <script src="{{asset("adminfront/assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("adminfront/assets/vendor/chart.js/chart.umd.js")}}"></script>
    <script src="{{asset("adminfront/assets/vendor/echarts/echarts.min.js")}}"></script>
    <script src="{{asset("adminfront/assets/vendor/quill/quill.min.js")}}"></script>
    <script src="{{asset("adminfront/assets/vendor/simple-datatables/simple-datatables.js")}}"></script>
    <script src="{{asset("adminfront/assets/vendor/tinymce/tinymce.min.js")}}"></script>
    <script src="{{asset("adminfront/assets/vendor/php-email-form/validate.js")}}"></script>
    <script src="{{asset("adminfront/assets/vendor/bootbox/bootbox.min.js")}}"></script>
    
    <!-- Template Main JS File -->
    @yield('scripts')

    
<script>
  $(document).on("click", "#delete", function(e){
  e.preventDefault();
  var link = $(this).attr("href");
  bootbox.confirm("Do you really want to delete this element ?", function(confirmed){
    if (confirmed){
        window.location.href = link;
      };
    });
  });
</script>

    
  </body>
  
  </html>