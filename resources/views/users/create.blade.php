<form method="POST" id="form-tambah" action="{{ route('users.store') }}">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>

        <div class="col-md-6">
            <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="username" value="{{ old('name') }}">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" >
        </div>
    </div>

</form>