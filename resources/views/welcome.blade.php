@extends('layouts.landing')
    <!-- SHOWCASE -->
@section('content')
    <section id="showcase" class="py-5">
      <div class="dark-overlay">
        <div class="container">
          <div class="row">
            <div class="col text-center text-white">
              <h1 class="display-3">Kembar <strong class="text-primary">Relaxation</strong></h1>
              <p class="lead">Tempat Pijak Relaksasi Murah Dan Nyaman</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SHOWOFF 1 -->


    <!-- BLOG -->
    <section id="blog" class="py-5 bg-light" data-aos="fade-up">
      <div class="container">
        <div class="row">
          <div class="col text-center" >
            <h1>Produk</h1>
            <hr class="w-25">
            <p class="lead">Produk Kembar Relaxation</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3" data-aos="flip-right">
            <div class="card">
              <img class="card-img-top gambar" src="{{asset('landing/img/blog1.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Refleksi</h5>
                
              </div>
            </div>
          </div>

          <div class="col-md-3" data-aos="flip-right">
           <div class="card">
              <img class="card-img-top gambar" src="{{asset('landing/img/blog2.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Relaksasi</h5>
              </div>
           </div>
          </div>

          <div class="col-md-3" data-aos="flip-right">
           <div class="card">
              <img class="card-img-top gambar" src="{{asset('landing/img/blog3.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Massage</h5>
              </div>
           </div>
          </div> 

          <div class="col-md-3" data-aos="flip-right">
           <div class="card">
              <img class="card-img-top gambar" src="{{asset('landing/img/blog4.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Totok Wajah</h5>
              </div>
           </div>
          </div>

          <div class="col-md-3" data-aos="flip-right">
            <div class="card">
              <img class="card-img-top gambar" src="{{asset('landing/img/blog5.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Kerik</h5>
                
              </div>
            </div>
          </div>

          <div class="col-md-3" data-aos="flip-right">
           <div class="card">
              <img class="card-img-top gambar" src="{{asset('landing/img/blog6.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Kop Angin</h5>
              </div>
           </div>
          </div>

          <div class="col-md-3" data-aos="flip-right">
           <div class="card">
              <img class="card-img-top gambar" src="{{asset('landing/img/blog7.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Bekam</h5>
              </div>
           </div>
          </div> 

          <div class="col-md-3" data-aos="flip-right">
           <div class="card">
              <img class="card-img-top gambar" src="{{asset('landing/img/blog8.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Ear Candle</h5>
              </div>
           </div>
          </div> 
 

        </div><!-- akhir row -->

      </div>
    </section>

    <!-- PRODUCT -->
        <section id="product" class="py-5 bg-white" data-aos="fade-up">
            <div class="container">
              <div class="row">
                <div class="col text-center" >
                  <h1>Visi Dan Misi</h1>
                  <hr class="w-25">
                  <p class="lead">Visi dan Visi Kembar Relaxation</p>
                </div>
              </div>

              <div class="row text-center justify-content-between mt-3">


                  <div class="col-sm-6 col-md-6 p-3">
                    <i class="fas fa-pencil-ruler fa-4x"></i>
                    <h4 class="mt-3">Visi</h4>
                    <p class="">Menjadi jasa refleksi profesional dan terpercaya diseluruh indonesia</p>
                  </div>

                  <div class="col-sm-6 col-md-6 p-3">
                    <i class="fas fa-shield-alt fa-4x"></i>
                    <h4 class="mt-3">Misi</h4>
                    <p class="">Melayani dengan profesionalisme dan sepenuh hati</p>
                    <p class="">Memberikan jaminan kesehatan kepada pelanggan</p>
                  </div>

                </div>
          </div>
        </section>

@endsection

@section('script')

<script src="{{asset('landing/js/bootstrap.js')}}"></script>
<script>
  AOS.init({
    duration: 800, 
  });

  $(document).ready(function(){
    $("a").on('click', function(event) {
  
      if (this.hash !== "") {
        event.preventDefault();
  
        var hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){      
          window.location.hash = hash;
        });
      } 
      
    });
  });

</script>
@endsection