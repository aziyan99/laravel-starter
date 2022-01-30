@extends('layouts.backend')
@section('title', 'Pengguna')
@section('page', 'Pengguna')
@section('main')
<div class="row">
    <div class="col-12">
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-2"></i>
            {{ __('Tambah pengguna') }}
        </a>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>{{ __('Foto') }}</th>
                                    <th>{{ __('Nama') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Alamat') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->avatar }}</td>
                                    <td>{{ $user->name }} <br>
                                        <small><code>{{ $user->role }}</code></small>
                                    </td>
                                    <td>{{ $user->email }} <br>
                                        <small><code>{{ $user->phone_number }}</code></small>
                                    </td>
                                    <td>{{ $user->address }}</td>
                                    <td>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
