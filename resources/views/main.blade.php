<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo_tab.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    @vite('resources/css/app.css')
</head>

<body class="font-poppins max-w-full">
    @if (!in_array(request()->path(), ['kunjungan', 'login', 'register', 'lupa-password']))
        @include('partials.Navbar.index')
    @endif

    @yield('content')

    @if (!in_array(request()->path(), ['kunjungan', 'login', 'register', 'lupa-password']))
        @include('partials.Footer.index')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="js/home.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/kunjungan.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
</body>



</html>
