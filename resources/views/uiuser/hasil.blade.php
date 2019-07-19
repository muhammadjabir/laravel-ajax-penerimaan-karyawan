<div class="alert bg-light data-hasil" role="alert">
    <div class="row">
        <div class="col-md-4">NIK</div>
        <div class="col-md-8">: {{$calon->nik}}</div>
        <div class="col-md-4">Nama</div>
        <div class="col-md-8">: {{$calon->nama}}</div>
        <div class="col-md-4">Status Lamaran</div>
        <div class="col-md-8">: 
        @if($calon->lamaran->status == 0)
        <span class="badge badge-primary">Sedang Kami Proses</span>
        @elseif($calon->lamaran->status == 1)
        <span class="badge badge-success">Selamat Anda Diterima</span>
        @else
        <span class="badge badge-danger">Mohon Maaf Anda Ditolak</span>
        @endif
        </div>
    </div>
    <br>
    @if($calon->lamaran->status == 0)
    <div class="alert alert-primary text-center">Mohon Tunggu Lamaran Anda Sedang Kami Proses</div>
    @elseif($calon->lamaran->status == 1)
    <div class="alert alert-success text-center">Selamat Anda Telah Kami Terima Karna Anda Telah Memenuhi Kriteria</div>
    @else
    <div class="alert alert-danger text-center">Mohon Maaf Anda Kami Tolak Dikarenakan Belum Memenuhi Kriteria</div>
    @endif
    
</div>