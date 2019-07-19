@extends('layouts.landing')

@section('content')
<section id="lamaran" class="py-5 bg-light">
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-9 bungkus bg-white shadow-sm py-3">
       
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK anda ketika melamar">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" id="cari" type="button">Cari</button>
          </div>
        </div>
        <hr>
        <input type="hidden" id="url" value="{{route('hasil.seleksi')}}">
        <div class="hasil">
            <h4 class="text-center">Hasil Seleksi</h4>
            <p class="iseng" style="margin-bottom: 200px"></p>
        </div>

        </div>
    </div>
</div>
</section>
@endsection
@section('script')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https:/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).on('click','#cari',function(e){
        e.preventDefault()
        cari()
    })

    $(document).on('keyup',function(e){
        if(e.keyCode===13){
         cari();
        }
    })

    function cari(){
        var nik = $('#nik').val(),
        url=$('#url').val(),
        iseng=$('.iseng')
        $('.data-hasil').remove()

        if (iseng) {
            $('.hasil').append(`<p class="iseng" style="margin-bottom: 200px"></p>`)
        }
        $.ajax({
                 url: url,
                 method: 'get',
                 data: {
                    'nik' : nik
                 },
                 dataType: 'html',
                 beforeSend: function(){
                 $('#cari').prop('disabled',true);
                 },
                 success: function(data){
                   $('.iseng').remove()
                   $('.hasil').append(data)

                 },
                 error: function(xhr){
                 var pesan = xhr.responseJSON;

                 if ($.isEmptyObject(pesan)==false) {
                     $.each(pesan.errors, function(key,value){
                         $('#'+ key).addClass('is-invalid').closest('.col-md-6').append(`<small class="text-danger">` + value[0] +`</small>`);
                         })
                     }
                 },
                 complete: function(){
                       $('#cari').prop('disabled',false);
                 }

               })
    }

</script>
@endsection
