<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>@yield('title')</title>
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <x-favico />
        @stack('styles')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
        </script>

        <!-- jQuery -->
        <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>

        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/fc-4.0.1/fh-3.2.1/r-2.2.9/sc-2.0.5/sb-1.3.1/sp-1.4.0/datatables.min.css" />

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js">
        </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js">
        </script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/fc-4.0.1/fh-3.2.1/r-2.2.9/sc-2.0.5/sb-1.3.1/sp-1.4.0/datatables.min.js">
        </script>

    </head>

    <body class="sb-nav-fixed">
        @include('layouts.partials.backend._topbar')
        @include('layouts.partials.backend._sidebar')
        <h1 class="mt-4">@yield('page')</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">@yield('page')</li>
        </ol>
        @yield('main')
        @include('layouts.partials.backend._footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        @stack('scripts')
    </body>

</html>
