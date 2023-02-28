<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>WMS - Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  {{-- <script src="https://kit.fontawesome.com/25fc1961d2.js" crossorigin="anonymous"></script> --}}
</head>
<body>
<!-- partial:index.partial.html -->
<div class="app">
    <header class="app-header">
            <div class="app-header-logo">
                <div class="logo">
                    <span class="logo-icon">
                        <img src="https://assets.codepen.io/285131/almeria-logo.svg" />
                    </span>
                    <h1 class="logo-title">
                        <span>WMS</span>
                    </h1>
                </div>
            </div>
            @yield('nav')
            <div class="app-header-actions">
                <button class="user-profile">
                    <span>Michał Sałbut</span>
                    {{-- <span>{{ Auth::user()->firstname.' '.Auth::user()->surname }}</span> --}}
                    <span>
                        <img src="https://assets.codepen.io/285131/almeria-avatar.jpeg" />
                    </span>
                </button>
                {{-- <div class="app-header-actions-buttons">
                    <button class="icon-button large">
                        <i class="ph-magnifying-glass"></i>
                    </button>
                    <button class="icon-button large">
                        <i class="ph-bell"></i>
                    </button>
                </div> --}}
            </div>
            <div class="app-header-mobile">
                <button class="icon-button large">
                    <i class="ph-list"></i>
                </button>
            </div>

        </header>
        <div class="app-body">
            <div class="app-body-navigation">
                <nav class="navigation">
                    <a class="{{ (Route::is('dashboard.index')) ? 'route_active' : '' }}" href="{{ route('dashboard.index') }}">
                        <i class="ph-browsers"></i>
                        <span>Dashboard</span>
                    </a>
                    <a class="{{ (Route::is('dashboard.warehouse.*')) ? 'route_active' : '' }}" href="{{ route('dashboard.warehouse.index') }}">
                        <i class="ph-house"></i>
                        <span>Magazyny</span>
                    </a>
                    {{-- <a href="#">
                        <i class="ph-swap"></i>
                        <span>Przyjęcia magazynowe</span>
                    </a>
                    <a href="#">
                        <i class="ph-file-text"></i>
                        <span>Wydania magazynowe</span>
                    </a> --}}
                    <a class="{{ (Route::is('dashboard.releases.*')) ? 'route_active' : '' }}" href="{{ route('dashboard.releases.index') }}">
                        <i class="ph-truck"></i>
                        <span>Wydania</span>
                    </a>
                    <a class="{{ (Route::is('dashboard.receipts.*')) ? 'route_active' : '' }}" href="{{ route('dashboard.receipts.index') }}">
                        <i class="ph-truck"></i>
                        <span>Przyjęcia</span>
                    </a>
                    <a class="{{ (Route::is('dashboard.products.*')) ? 'route_active' : '' }}" href="{{ route('dashboard.products.index') }}">
                        <i class="ph-barcode"></i>
                        <span>Produkty</span>
                    </a>
                    <a class="{{ (Route::is('dashboard.categories.*')) ? 'route_active' : '' }}" href="{{ route('dashboard.categories.index') }}">
                        <i class="ph-folders"></i>
                        <span>Kategorie</span>
                    </a>
                    <a class="{{ (Route::is('dashboard.employees.*')) ? 'route_active' : '' }}" href="{{ route('dashboard.employees.index') }}">
                        <i class="ph-user-list"></i>
                        <span>Pracownicy</span>
                    </a>
                    <a 
                    @if(Route::is('dashboard.roles.*') || (Route::is('dashboard.groups.*'))) 
                    class="route_active"
                    @endif
                    href="{{ route('dashboard.roles.index') }}">
                        <i class="ph-person"></i>
                        <span>Uprawnienia</span>
                    </a>
                </nav>
                {{-- <footer class="footer">
                    <h1>Almeria<small>©</small></h1>
                    <div>
                        Almeria ©<br />
                        All Rights Reserved 2021
                    </div>
                </footer> --}}
        </div>
@yield('content')
</div>
  <script src='https://unpkg.com/phosphor-icons'></script>
</body>
</html>