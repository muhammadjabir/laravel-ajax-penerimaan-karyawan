<form method="POST" id="form-tambah" action="{{ route('interview.store') }}">
    @csrf

    <div class="form-group row">
        <label for="tgl" class="col-md-4 col-form-label text-md-right">Tanggal Interview</label>

        <div class="col-md-6">
            <input id="tgl_interview" type="text" class="form-control @error('name') is-invalid @enderror" name="tgl_interview" value="{{ old('name') }}">
        </div>
        <input type="hidden" name="id_lamaran" id="id_lamaran" value="">
    </div>


</form>