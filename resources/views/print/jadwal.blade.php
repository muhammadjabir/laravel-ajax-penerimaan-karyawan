@extends('layouts.print')


@section('laporan')
Jadwal Interview
@endsection

@section('content')
<table class="table table-bordered table-responsive-sm" id="'#users-table'">
    <thead class="text-center">
        <tr>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Umur</th>
            <th>Kelamin</th>
            <th>Tanggal Interview</th>
        </tr>
    </thead>

    <tbody>
   
        @foreach($interview as $interview)
        <tr>
            <td>{{$interview->lamaran->calon->nik}}</td>
            <td>{{$interview->lamaran->calon->nama}}</td>
            <td>{{$interview->lamaran->calon->umur()}}</td>
            <td>{{$interview->lamaran->calon->kelamin}}</td>
            <td>{{$interview->tgl->format('d-m-Y')}}</td>
        </tr>
        @endforeach
       
    </tbody>
           
</table>

@endsection