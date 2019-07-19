@extends('layouts.print')


@section('laporan')
Data Karyawan Baru Periode {{$awal}} sd {{$akhir}}
@endsection

@section('content')
<table class="table table-bordered table-responsive-sm" id="'#users-table'">
    <thead class="text-center">
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
   
        @foreach($karyawan as $karyawan)
        <tr>
            <td>{{$karyawan->calon->nik}}</td>
            <td>{{$karyawan->calon->nama}}</td>
            <td>{{$karyawan->calon->kelamin}}</td>
            <td>{{$karyawan->calon->nohp}}</td>
            <td>{{$karyawan->calon->email}}</td>
            <td>{{$karyawan->calon->tgl_lahir->format('d-m-Y')}}</td>
        </tr>
        @endforeach
       
    </tbody>
           
</table>

@endsection