<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @stack('cdn')
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
        <div class="container">
            <a href="/" class="navbar-brand">
                <img src="" alt="">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="/index" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/blogs" class="nav-link">Blogs</a>
                </li>
                <li class="nav-item">
                    <a href="/contact" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
