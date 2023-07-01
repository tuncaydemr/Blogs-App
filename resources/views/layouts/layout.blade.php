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
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a href="/" class="navbar-brand">
                <img src="{{ asset('img/FOGO.png') }}" class="img-fluid" alt="FOGO" width="100" height="100">
            </a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="/index" class="nav-link active fs-5">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/index" class="nav-link fs-5">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/index" class="nav-link fs-5">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/blogs" class="nav-link fs-5">Blogs</a>
                </li>
                <li class="nav-item">
                    <a href="/contact" class="nav-link fs-5">Contact</a>
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
