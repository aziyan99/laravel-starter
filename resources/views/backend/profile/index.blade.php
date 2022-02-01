@extends('layouts.backend')
@section('title', 'Profile')
@section('page', 'Profile')
@section('main')

<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="card shadow-sm">
            <div class="card-header">
                {{ __('Foto profile') }}
            </div>
            <div class="card-body">
                <div class="mb-2 text-center">
                    <img src="{{ $user->avatar_path }}" alt="logo" class="img-thumbnail" width="128">
                </div>
                <form action="{{ route('profile.update.avatar', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="avatar" class="form-label">{{ __('Avatar') }}</label>
                        <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="avatar"
                            name="avatar" required>
                        @error('avatar')
                        <small class="invalid-feeback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <small><i>{{ __('*Resolusi foto 256x256') }}</i></small><br>
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-save me-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-12">
        <div class="card shadow-sm">
            <div class="card-header">
                {{ __('Informasi pribadi') }}
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update.information', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('backend.profile._form')
                    <div>
                        <button class="me-2 btn btn-primary btn-sm">
                            <i class="fas fa-save me-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-12 m-3">
        <div class="card shadow-sm">
            <div class="card-header">{{ __('Update password') }}</div>
            <div class="card-body">
                <form action="{{ route('profile.update.password', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password baru') }}</label>
                        <div class="input-group mb-3">
                            <input id="password" type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password baru"
                                aria-label="Password baru" aria-describedby="newPassword">
                            <button class="btn btn-outline-secondary" type="button" id="newPassword"><i
                                    class="fas fa-eye"></i></button>
                            @error('password')
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('Ulangi password baru') }}</label>
                        <div class="input-group mb-3">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Ulangi password baru" aria-label="Ulangi password baru"
                                aria-describedby="newPasswordConfirmation">
                            <button class="btn btn-outline-secondary" type="button" id="newPasswordConfirmation"><i
                                    class="fas fa-eye"></i></button>
                            @error('password_confirmation')
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm" type="submit">
                            <i class="fas fa-key me-2"></i>{{__('Simpan')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    var passwordBtn = document.querySelector("#newPassword");
    var passworConfirmationBtn = document.querySelector("#newPasswordConfirmation");
    passwordBtn.addEventListener("click", function () {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    });

    passworConfirmationBtn.addEventListener("click", function () {
        var x = document.getElementById("password_confirmation");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    });

</script>
@endpush
