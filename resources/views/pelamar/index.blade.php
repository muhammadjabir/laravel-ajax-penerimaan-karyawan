@extends('layouts.template')
@section('title','Data Pelamar')
@section('judul','Data Pelamar')

@section('content')

<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
        <div class="card-header py-3 bg-white">
          <h6 class="m-0 font-weight-bold text-primary float-left">Data Pelamar</h6>
        </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-responsive-sm table-hover w-100" id="dataTable" >
                  <thead>
                      <tr>
                          <th>NIK</th>
                          <th>Nama Lengkap</th>
                          <th>No HP</th>
                          <th>Email</th>
                          <th>Umur</th>
                          <th>Status</th>
                          <th>Berkas</th>
                          <th >Action</th>
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

  $('#dataTable').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: "{{route('data.calon')}}",
    columns:[
    {data: 'nik' , name: 'nik'},
    {data: 'nama' , name: 'nama'},
    {data: 'nohp' , name: 'nohp'},
    {data: 'email' , name: 'email'},
    {data: 'umur' , name: 'umur'},
    {data: 'lamaran.status' , name: '',
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
    {data: 'berkas' , name: ''},
   
    {data: 'action' , name: ''}]

  })

 
</script>


@endsection