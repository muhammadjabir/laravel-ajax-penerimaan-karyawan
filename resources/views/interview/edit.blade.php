<form method="POST" id="form-edit" action="{{ route('interview.update',['id'=>$interview->id]) }}">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group row">
        <label for="tgl" class="col-md-4 col-form-label text-md-right">Tanggal Interview</label>

        <div class="col-md-6">
            <input id="tgl_interview" type="text" class="form-control @error('name') is-invalid @enderror" name="tgl_interview" value="{{ $interview->tgl->format('Y-m-d') }}">
        </div>
    </div>
</form>