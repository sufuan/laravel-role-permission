<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!-- Link to CSS file -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Link to favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- Font Awesome -->
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Feather Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    <!-- Simple DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.css">
</head>

<body class="nav-fixed">
    @include('backend.layouts.partials.header')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('backend.layouts.partials.sidebar')
        </div>
        <div id="layoutSidenav_content">
            @yield('admin-content')
            @include('backend.layouts.partials.footer')
        </div>
    </div>

    <!-- jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- Local Scripts -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- Simple DataTables -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

    <!-- Feather Icons Initialization -->
    <script>
        feather.replace();
    </script>
</body>

</html>