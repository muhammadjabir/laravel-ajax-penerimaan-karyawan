<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Print @yield('title')</title>

    <style type="text/css">
    footer {

  left: 0;
  bottom: 0;
  width: 100%;
}
table{
    font-size: 10px !important ;
}
</style>
  </head>
  <body>
<div class="contaier ">
<div class="tombol text-right">
</div>
 

<div class="row justify-content-center">
        <div class="col-md-12">
        <div class="header-wrapper text-center">
          <h2 class="text-primary">Kembar Relaxation</h2>
          <p>Mal Season City, Lt GF 2 Blok A 11 No 2</p>
          <hr>

        </div>
<div class="text-center mb-2">
    <h5>Laporan @yield('laporan')</h5>
</div>
        @yield('content')
         
                </div>
            </div>
        </div>

        
    </div>
</div>
  


<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <span class="text-primary">Kembar Relaxation</span>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
   
  </body>

</html>