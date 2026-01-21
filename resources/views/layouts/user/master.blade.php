<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('addCss')
</head>
<body>
    <!-- Add Header -->
    <!-- check if user login -->
    @if (Auth::check())
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="#"><h5>Welcome, {{ Auth::user()->name }}</h5></a>
                </div>
                <ul class="nav d-flex">
                    <li class="nav-item me-3">
                        <a class="nav-link active" href="{{ route('users.index') }}">Users</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </nav>
    @endif
    

    <!-- Add Content -->
    @yield('content')

    <!-- add js -->
    @stack('addJs')
</body>
</html>