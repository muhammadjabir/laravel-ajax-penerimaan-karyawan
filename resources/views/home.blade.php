@extends('layouts.template')
@section('title','Dahsboard')
@section('content')
<div class="bg-white p-4 shadow mb-4">

<h2 class="text-center mb-4">Informasi Aplikasi</h2>
<hr>
<label>Lowongan Pekerjaan : </label><button id="loker-button" class="btn shadow-sm ml-2 btn-sm {{$loker->status == 0 ? ' btn-success' : ' btn-danger'}}" style="border-radius: 50px">{{$loker->status == 0 ? 'Aktifkan' : 'Matikan'}}</button>
<br>
<br>

    <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-4">
              <div class="card border-left-primary  h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pelamar Baru</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['pelamar']}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card border-left-info  h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Interview Hari Ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['interview']}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-table fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card border-left-danger  h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Karyawan Baru</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['karyawan']}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
    </div>
    <br>
    <br>
<div class="card">
      <div class="card-header py-3 bg-white">
        <h6 class="m-0 font-weight-bold text-dark float-left">Interview Hari ini</h6>
      </div>
          <div class="card-body">
            <table class="table table-striped table-responsive-sm table-hover w-100" id="dataTable" >
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Kelamin</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
          </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
$('#loker-button').on('click',function(){
  $.ajax({
    url: `{{route('loker')}}`,
    method: 'get',
    data: {
    },
    dataType: 'JSON',
    beforeSend: function(){
      $('#loker-button').prop('disabled', true)
    },
    success: function(data){
      if (data.status == true) {
         $('#loker-button').toggleClass('btn-success btn-danger');
         $('#loker-button').text('Matikan');
      }
      else{
        $('#loker-button').toggleClass('btn-danger btn-success');
         $('#loker-button').text('Aktifkan');

      }
    },
    error: function(xhr){
    var pesan = xhr.responseJSON;
    Swal.fire({
      type: 'error',
      title: 'Gagal...',
      text: 'Terjadi Kesalahan!',
    });
    },
    complete: function(){
      $('#loker-button').prop('disabled', false)
    }
  })
})

    $('#dataTable').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: "{{route('data.interview',['filter'=>'ada'])}}",
      columns:[
      {data: 'nik' , name: 'nik'},
      {data: 'nama' , name: 'nama'},
      {data: 'kelamin' , name: 'kelamin'},
      {data: 'status' , name: '',
      render: function ( data, type, row, meta ) {
           if (data == 0) {
              return '<span class="badge badge-dark"> Belum Ditindak</span>'
           }
           else if(data == 1) {
              return '<span class="badge badge-info">Diterima</span>'
           }
           else{
              return '<span class="badge badge-danger">Ditolak</span>'
           }
          }
      },
      {data: 'tindakan' , name: ''}]

    })

    $(document).on('click' ,'.tindakan', function(e) {
      e.preventDefault()
      var id=$(this).data('id'),
        url=$(this).attr('href'),
          tindakan=$(this).data('tindak')
      if (tindakan == 1) {
        var pesan='Terima',
          text="Menerima Pelamar"
      }
      else{
        var pesan='Tolak',
        text="Menolak Pelamar"
      }
       Swal.fire({
        title: 'Apa anda yakin?',
        text: text,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: pesan
      }).then((result) => {
        if (result.value) {

          $.ajax({
            url: url,
            method: 'get',
            data: {
              'id' : id,
              'status' : tindakan 
            },
            dataType: 'JSON',
            beforeSend: function(){
            },
            success: function(data){
              Swal.fire(
                'Success!',
                '',
                'success'
              );
              $('#dataTable').DataTable().ajax.reload()

            },
            error: function(xhr){
            var pesan = xhr.responseJSON;
            Swal.fire({
              type: 'error',
              title: 'Gagal...',
              text: 'Terjadi Kesalahan!',
            });
            },
            complete: function(){
            }
          })

        }
      })


    })
</script>
@endsection