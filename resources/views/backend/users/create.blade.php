@extends('layouts.backend')
@section('title', 'Tambah pengguna')
@section('page', 'Tambah pengguna')
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                {{ __('Form tambah pengguna') }}
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sms=-12">
                            <div class="mb-3">
                                <label class="mb-1" for="name">{{ __('Nama') }}</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}">
                                @error('name')
                                <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}">
                                    @error('email')
                                    <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="phone_number">{{ __('No. Hp') }}</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control  @error('phone_number') is-invalid @enderror"
                                    value="{{ old('phone_number', $user->phone_number) }}">
                                    @error('phone_number')
                                    <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div>
                                <button class="me-2 btn btn-primary btn-sm">
                                    <i class="fas fa-save me-2"></i>Simpan
                                </button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="mb-1" for="role">{{ __('Role') }}</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="">--pilih--</option>
                                    <option value="admin" {{ (old('role', $user->role) == 'admin') ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="user" {{ (old('role', $user->role) == 'user') ? 'selected' : '' }}>
                                        User</option>
                                </select>
                                @error('role')
                                <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="address">{{ __('Alamat') }}</label>
                                <textarea name="address" id="address" cols="30" rows="4" class="form-control  @error('address') is-invalid @enderror"
                                    value="{{ old('phone_number', $user->phone_number) }}">{{ old('address', $user->ddress) }}</textarea>
                                    @error('address')
                                    <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
