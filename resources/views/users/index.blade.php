@extends('layouts.template')
@section('title','Kelola Admin')
@section('judul','Kelola Admin')

@section('content')

<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
          <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary float-left">Data Admin</h6>
            <a href="{{route('users.create')}}" class="btn btn-sm btn-info float-right shadow-sm" id="tambah-data">Tambah Data Admin</a>
          </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-responsive-sm table-hover w-100" id="dataTable" >
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Role</th>
                            <th width="120px">Action</th>
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


<script type="text/javascript">
  $('#dataTable').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: "{{route('data.users')}}",
    columns:[
    {data: 'username' , name: 'username'
    },
    {data: 'role' , name: 'role',
    render: function ( data, type, row, meta ) {
         if (data == 'ADMIN') {
            return '<span class="badge badge-success">' + data + '</span>'
         }
         else{
            return '<span class="badge badge-info">' + data + '</span>'
         }
        }
    },
    {data: 'action' , name: ''}]

  })

 
</script>
<script type="text/javascript" src="{{asset('js/scrip.js')}}"></script>
@endsection