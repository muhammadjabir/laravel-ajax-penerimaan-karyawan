@extends('layouts.template')
@section('title','Data Karyawan Baru')
@section('judul','Data Karyawan Baru')

@section('content')

<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
        <div class="card-header py-3 bg-white">
          <h6 class="m-0 font-weight-bold text-primary float-left">Data Karyawan Baru</h6>
          <a href="{{route('print.karyawan')}}" id="print-karyawan" class="btn btn-sm btn-primary shadow-sm float-right"><i class="fa fa-file"></i>&nbsp;Cetak Data</a>
        </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-responsive-sm table-hover w-100" id="dataTable" >
                  <thead>
                      <tr>
                          <th>NIK</th>
                          <th>Nama Lengkap</th>
                          <th>Kelamin</th>
                          <th>No HP</th>
                          <th>Email</th>
                          <th>Tanggal Lahir</th>
                          
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
        <div class="form-group row">
            <label for="tgl" class="col-md-4 col-form-label text-md-right">Dari</label>

            <div class="col-md-6">
                <input id="awal" type="date" class="form-control @error('name') is-invalid @enderror" name="awal" value="{{ old('name') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="tgl" class="col-md-4 col-form-label text-md-right">Hingga</label>

            <div class="col-md-6">
                <input id="akhir" type="date" class="form-control @error('name') is-invalid @enderror" name="akhir" value="{{ old('name') }}">
            </div>
        </div>
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
 <script src="{{asset('tem/vendor/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('tem/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>


<script type="text/javascript">

  $('#dataTable').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: "{{route('data.karyawan')}}",
    columns:[
    {data: 'calon.nik' , name: 'calon.nik'},
    {data: 'calon.nama' , name: 'calon.nama'},
    {data: 'calon.kelamin' , name: 'calon.kelamin'},
    {data: 'calon.nohp' , name: 'calon.nohp'},
    {data: 'calon.email' , name: 'calon.email'},
    {data: 'calon.tgl_lahir' , name: 'calon.tgl_lahir'}
   ]

  })
  $(document).on('click','.tutup',function(){
  
    $('.modal').hide();
})
  $(document).on('click','#print-karyawan', function(e){
    e.preventDefault()
    $('#simpan').html(`<i class="fa fa-file"></i>&nbsp;Cetak`)
    $('.modal-title').text('Cetak Data Karyawan Baru')
    $('.modal').show()
  })

   $(document).on('click','#simpan',function(){
      var awal = $('#awal').val(),
      url=$('#print-karyawan').attr('href')
      akhir = $('#akhir').val()
      window.open(url+'?awal='+awal+'&akhir='+akhir, '_blank');
    })

 
</script>


@endsection