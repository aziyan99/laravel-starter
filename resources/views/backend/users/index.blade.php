@extends('layouts.backend')
@section('title', 'Pengguna')
@section('page', 'Pengguna')
@section('main')
<div class="row">
    <div class="col-12">
        <div class="col-12 text-start">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm my-4">
                <i class="fas fa-plus me-2"></i>
                {{ __('Tambah pengguna') }}
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data pengguna') }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="users">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">{{ __('Foto') }}</th>
                                    <th>{{ __('Nama') }}</th>
                                    <th>{{ __('Kontak') }}</th>
                                    <th>{{ __('Alamat') }}</th>
                                    <th width="120">{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('Foto') }}</th>
                                    <th>{{ __('Nama') }}</th>
                                    <th>{{ __('Kontak') }}</th>
                                    <th>{{ __('Alamat') }}</th>
                                    <th>{{ __('Aksi') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    .dt-buttons {
        margin-bottom: 30px;
    }
</style>

@endpush
@push('scripts')
<script>
    $(function () {
        $('#users tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Cari ' + title + '" />');
        });

        var table = $('#users').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf', 'print'
            ],
            lengthMenu: [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],
            // fixedHeader: true,
            // scrollY: 400,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'avatar',
                    name: 'avatar'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'kontak',
                    name: 'kontak'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'Aksi',
                    name: 'Aksi',
                    orderable: true,
                    searchable: true
                },
            ],
            initComplete: function () {
                // Apply the search
                this.api().columns().every(function () {
                    var that = this;

                    $('input', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            }
        });
    });
</script>
@endpush
