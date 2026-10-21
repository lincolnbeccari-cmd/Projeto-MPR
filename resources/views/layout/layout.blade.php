
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Projeto MPR')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/mpr.css') }}">
</head>
<body>

@if (!View::hasSection('auth'))
<header class="topbar">

    <a class="brand" href="{{ route('mpr.dashboard') }}">
        <span class="brand-mark">▱</span>
        <span>Projeto MPR</span>
    </a>

    <nav class="main-nav">
        <a href="{{ route('mpr.dashboard') }}"
           class="{{ request()->routeIs('mpr.dashboard') ? 'active' : '' }}">
            Visão geral
        </a>

        <a href="{{ route('mpr.maintenance.index') }}"
           class="{{ request()->routeIs('mpr.maintenance.*') ? 'active' : '' }}">
            Cadastros
        </a>

        <a href="{{ route('mpr.reports') }}"
           class="{{ request()->routeIs('mpr.reports') ? 'active' : '' }}">
            Relatórios
        </a>
    </nav>

    <div class="profile">
        <span class="help">?</span>
        <span class="avatar">M</span>

        <span class="profile-name">
            Minha conta
            <small>Administrador</small>
        </span>
    </div>

</header>
@endif

<main class="page-shell">

    @if (session('success'))
        <div class="notice success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</main>

<script src="{{ asset('js/mpr.js') }}"></script>
</body>
</html>
