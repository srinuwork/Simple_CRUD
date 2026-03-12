<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <!-- Navigation -->
        <nav>
            <div class="nav-container">
                <a href="{{ url('/') }}" class="logo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    Simple CRUD App
                </a>
                <ul class="nav-links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('login') }}">Log in</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </div>
        </nav>

        <main>
            <div class="form-container">
                {{ $slot }}
            </div>
        </main>

        <footer>
            <div class="footer-content">
                <div class="footer-text">&copy; {{ date('Y') }} Simple CRUD Dashboard. All rights reserved.</div>
            </div>
        </footer>
    </body>
</html>
