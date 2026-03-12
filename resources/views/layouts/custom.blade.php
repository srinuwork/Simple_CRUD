<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel Project'))</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Custom Navigation -->
    <nav>
        <div class="nav-container">
            <a href="{{ url('/') }}" class="logo">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                Simple CRUD
            </a>
            
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                @auth
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <a href="javascript:void(0)" onclick="this.closest('form').submit()">Logout</a>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Log in</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Custom Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-text">&copy; {{ date('Y') }} Simple CRUD Dashboard. All rights reserved.</div>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Contact Us</a>
            </div>
        </div>
    </footer>
</body>
</html>
