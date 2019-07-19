@extends('layouts.landing')

@section('content')
<section id="lamaran" class="py-5 bg-light">
<div class="container">
 @if($loker->status == 1)
    <div class="row justify-content-center">
        <div class="col-md-9 bungkus bg-white shadow-sm py-3">    
        <div class="alert alert-primary" role="alert">
          <h4>Persyaratan :</h4>
          <ol class="persyaratan">
            <li>Usia min 17thn dan max 40thn</li>
            <li>Tidak ada persyaratan ijaza</li>
            <li>Sertakan CV, Pengalaman, dan Sertifikat anda didalam file berformat PDF</li>
            <li>File berkas tidak boleh lebih dari 3mb</li>
            <li>Tunggu minimal 3hari untuk pemanggilan interview setelah melakukan pelamaran</li>
            <li>Setelah melakukan interview dan test silakan cek seleksi</li>
          </ol>
        </div>
            <div class="card">
                <div class="card-header bg-white">Form Lamaran</div>

                <div class="card-body">
                    <form method="POST" id="form-lamaran" action="{{ route('calon.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nik" class="col-md-4 col-form-label text-md-right">NIK</label>

                            <div class="col-md-6">
                                <input id="nik" type="text" class="form-control @error('name') is-invalid @enderror" name="nik" value="{{ old('nik') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('name') is-invalid @enderror" name="nama" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kelamin" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <select class="custom-select" name="kelamin">
                                    <option value="PRIA">Pria</option>
                                    <option value="WANITA">Wanita</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Email</label>
                            
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('name') is-invalid @enderror" name="email" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">No HP</label>

                            <div class="col-md-6">
                                <input id="nohp" type="text" class="form-control @error('name') is-invalid @enderror" name="nohp" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>

                            <div class="col-md-6">
                                <input id="tgl" type="date" class="form-control @error('name') is-invalid @enderror" name="tgl" value="" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Upload Berkas</label>

                            <div class="col-md-6">
                                <input id="berkas" type="file" class="form-control @error('name') is-invalid @enderror" name="berkas" value="" autofocus>
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit" class="btn btn-primary btn-block">
                                    Kirim Lamaran
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-danger" style="margin-bottom: 210px;" role="alert">
      <h4 class="text-center" style=""><strong>Mohon Maaf Saat Ini Lowongan Sedang Kami Tutup..</strong></h4>
    </div>
    @endif
</div>
</section>
@endsection
@section('script')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https:/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).on('submit','#form-lamaran',function(e){
        e.preventDefault()
        var url = $(this).attr('action'),
        data = new FormData(this)
        $('.is-invalid').removeClass('is-invalid')
        $('.text-danger').remove()
        $.ajax({
                 url: url,
                 method: 'POST',
                 data: data,
                 dataType: 'JSON',
                 processData: false,
                 cache:false,
                 contentType:false,
                 beforeSend: function(){
                 $('#submit').prop('disabled',true);
                 },
                 success: function(data){
                   $('.bungkus').html(` <div style="margin-bottom:200px;" class="alert alert-success" role="alert">
                  <h4 class="text-center"><strong>Selamat Anda Telah Berhasil Melamar Pekerjaan</strong></h4>
                  <h5 class="text-center">Mohon Tunggu 3-5 Hari Untuk Mendapatkan Panggilan Interview dan Test</h5>
                </div>`)
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
                       $('#submit').prop('disabled',false);
                 }

               })
    })

</script>
@endsection
