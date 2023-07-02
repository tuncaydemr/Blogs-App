<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @stack('styles')
    @stack('cdn')
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a href="/" class="navbar-brand">
                <img src="{{ asset('img/FOGO.png') }}" class="img-fluid" alt="FOGO" width="100" height="100">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navMenu" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto flex-row justify-content-center">
                    <li class="nav-item me-5">
                        <a href="/index" class="nav-link fs-5">Home</a>
                    </li>
                    <li class="nav-item me-5">
                        <a href="/blogs" class="nav-link fs-5">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link fs-5">Contact</a>
                    </li>
                </ul>
            </div>
            <div id="navMenu" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto mb-2 flex-row justify-content-center">
                    <li class="nav-item me-3">
                        <a href="/blogs" class="nav-link fs-5">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link fs-5">Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
