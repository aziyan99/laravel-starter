@extends('layouts.backend')
@section('title', 'Detail pengguna')
@section('page', 'Detail pengguna')
@section('main')
<div class="row">
    <div class="col-12">
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm mb-3">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
        <div class="card shadow-sm">
            <div class="card-header">
                {{ __('Data Detail pengguna') }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-12 text-center">
                        <img src="{{ $user->avatar }}" class="img-thumbnail" width="128" alt="avatar">
                        <table class="table table-bordered table-sm mt-3">
                            <tr>
                                <th>Tanggal terdaftar</th>
                            </tr>
                            <tr>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <table class="table table-sm table-bordered">
                            <tr>
                                <th>{{ __('Nama') }}</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Email') }}</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('No.HP') }}</th>
                                <td>{{ $user->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Role') }}</th>
                                <td>{{ $user->role }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Alamat') }}</th>
                                <td>{{ $user->address }}</td>
                            </tr>
                        </table>
                        <div>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-secondary btn-sm mt-2">
                                <i class="fas fa-edit me-2"></i>Ubah
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-secondary btn-sm mt-2" onclick="return confirm('Hapus pengguna ini?' )" type="submit">
                                    <i class="fas fa-trash-alt me-2"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
