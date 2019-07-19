@extends('layouts.template')
@section('title','Jadwal Interview')
@section('judul','Jadwal Interview')

@section('content')

<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
        <div class="card-header py-3 bg-white">
          <h6 class="m-0 font-weight-bold text-primary float-left">Jadwal Interview</h6>
          <a href="{{route('print.jadwal')}}" id="print-jadwal" class="btn btn-sm btn-primary shadow-sm float-right"><i class="fa fa-file"></i>&nbsp;Cetak Jadwal Interview</a>
        </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-responsive-sm table-hover w-100" id="dataTable" >
                  <thead>
                      <tr>
                          <th>NIK</th>
                          <th>Nama Lengkap</th>
                          <th>Kelamin</th>
                          <th>Tanggal Interview</th>
                          <th>Status</th>
                          <th>Tindakan</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
            </div>
      </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close tutup" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm shadow-sm" data-sortir="" data-id="" id="simpan"><i class="fa fa-save"></i>&nbsp;Save changes</button>
        <button type="button" class="btn btn-secondary btn-sm tutup shadow-sm" id="close" >Close</button>
      </div>
    </div>
  </div>
</div>


@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https:/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{asset('js/scrip.js')}}"></script>
 <script src="{{asset('tem/vendor/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('tem/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>


<script type="text/javascript">
$(document).on('click','#print-jadwal', function(e){
  e.preventDefault()
  var url=$(this).attr('href')
  $('#simpan').html(`<i class="fa fa-file"></i>&nbsp;Cetak`)
  $('#simpan').attr('id','cetak')
  $('.modal-body').html('')
  $('.modal-title').text('Cetak Jadwal Interview')
  $('.modal-body').html(`
    <div class="form-group row">
        <label for="tgl" class="col-md-4 col-form-label text-md-right">Tanggal Interview</label>

        <div class="col-md-6">
            <input id="tgl_interview" type="text" class="form-control @error('name') is-invalid @enderror" name="tgl_interview" value="{{ old('name') }}">
        </div>
        <input type="hidden" name="id_lamaran" id="id_lamaran" value="">
    </div>
    `)
  $("#tgl_interview").datepicker({
   dateFormat: "yy-mm-dd",
   autoclose: true,
  })
  $('.modal').show()
  $(document).on('click','#cetak',function(){
    var param = $('#tgl_interview').val()
    window.open(url+'?tgl='+param, '_blank');
  })
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
  $('#dataTable').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: "{{route('data.interview')}}",
    columns:[
    {data: 'nik' , name: 'nik'},
    {data: 'nama' , name: 'nama'},
    {data: 'kelamin' , name: 'kelamin'},
    {data: 'tgl' , name: 'tgl'},
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
    {data: 'tindakan' , name: ''},
   
    {data: 'action' , name: ''}]

  })

 
</script>


@endsection