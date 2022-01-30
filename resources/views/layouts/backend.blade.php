<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>@yield('title')</title>
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        @stack('styles')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
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
