<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="@yield('theme', 'light')" data-color-theme="Blue_Theme" data-layout="vertical">
<head>
    @include('layouts.head')
    <title>@yield('title', 'Admin')</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    @yield('css')
    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 99999;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
      
        .spinner-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }
      
        .spinner-border {
            width: 3rem;
            height: 3rem;
            border-width: 0.3em;
            color: #3498db; /* warna bisa diganti sesuai tema */
        }
      </style>
      
</head>
<body class="link-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="spinner-wrapper">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div id="main-wrapper">

        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div>@include('layouts.sidebar')</div>
        </aside>
        <!-- Sidebar End -->

        <div class="page-wrapper">
            <!-- Header Start -->
            <header class="topbar">
                <div class="with-vertical">@include('layouts.header')</div>
                <div class="app-header with-horizontal">@include('layouts.horizontal-header')</div>
            </header>
            <!-- Header End -->
            
            <aside class="left-sidebar with-horizontal">
                @include('layouts.horizontal-sidebar')
            </aside>

            <div class="body-wrapper">
                <div class="container-fluid">
                    @yield('pageContent')
                </div>
            </div>
            @include('layouts.customizer')
        </div>

        <x-headers.dd-searchbar/>
        <x-headers.dd-shopping-cart/>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    @include('layouts.scripts')
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    
    @yield('scripts')
    
    
</body>
</html>
