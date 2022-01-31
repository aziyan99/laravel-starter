@extends('layouts.backend')
@section('title', 'Pengaturan')
@section('page', 'Pengaturan')
@section('main')

<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="card shadow-sm">
            <div class="card-header">
                {{ __('Logo sistem') }}
            </div>
            <div class="card-body">
                <div class="mb-2 text-center">
                    <img src="{{ $setting->logo_path }}" alt="logo" class="img-thumbnail" width="128">
                </div>
                <form action="{{ route('setting.update.logo', $setting) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo"
                            name="logo" required>
                        @error('logo')
                        <small class="invalid-feeback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <small><i>*Resolusi logo 256x256</i></small><br>
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
                {{ __('Informasi sistem') }}
            </div>
            <div class="card-body">
                <form action="{{ route('setting.update.information', $setting) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-2">
                                <label for="name" class="mb-1">{{ __('Nama sistem') }}</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $setting->name) }}">
                                @error('name')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="phone_number" class="mb-1">{{ __('No.HP sistem') }}</label>
                                <input type="text" name="phone_number" id="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ old('phone_number', $setting->phone_number) }}">
                                @error('phone_number')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="email" class="mb-1">{{ __('Email sistem') }}</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $setting->email) }}">
                                @error('email')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-2">
                                <label for="address" class="mb-1">{{ __('Alamat') }}</label>
                                <textarea name="address" id="address"
                                    class="form-control @error('address') is-invalid @enderror" rows="2"
                                    cols="10">{{ old('address', $setting->address) }}</textarea>
                                @error('address')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="facebook" class="mb-1">{{ __('Facebook') }}</label>
                                <input type="text" name="facebook" id="facebook"
                                    class="form-control @error('facebook') is-invalid @enderror"
                                    value="{{ old('facebook', $setting->facebook) }}">
                                @error('facebook')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="instagram" class="mb-1">{{ __('Instagram') }}</label>
                                <input type="text" name="instagram" id="instagram"
                                    class="form-control @error('instagram') is-invalid @enderror"
                                    value="{{ old('instagram', $setting->instagram) }}">
                                @error('instagram')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="twitter" class="mb-1">{{ __('Twitter') }}</label>
                                <input type="text" name="twitter" id="twitter"
                                    class="form-control @error('twitter') is-invalid @enderror"
                                    value="{{ old('twitter', $setting->twitter) }}">
                                @error('twitter')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-1">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save me-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
