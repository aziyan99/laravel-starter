@extends('layouts.backend')
@section('title', 'Ubah pengguna')
@section('page', 'Ubah pengguna')
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                {{ __('Form Ubah pengguna') }}
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('backend.users._form')
                    <div>
                        <button class="me-2 btn btn-primary btn-sm">
                            <i class="fas fa-save me-2"></i>Ubah
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
