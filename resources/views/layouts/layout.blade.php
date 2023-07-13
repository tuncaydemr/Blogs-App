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

    <header>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container">
                <a href="{{ route('index') }}" class="navbar-brand">
                    <img src="{{ asset('img/FOGO.png') }}" class="img-fluid" alt="FOGO" width="100" height="100">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navMenu" class="collapse navbar-collapse p-5 rounded-4">
                    <ul class="navbar-nav ms-auto flex-row justify-content-center">
                        <li class="nav-item me-5">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item me-5">
                            <a href="{{ route('blogs') }}" class="nav-link">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
                <div id="navMenu" class="collapse navbar-collapse p-5 rounded-4">
                    <ul class="navbar-nav ms-auto mb-2 flex-row justify-content-center">
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signIn">
                                Sign In
                            </button>
                        </li>
                    </ul>
                </div>
                <div id="signIn" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                        <div class="modal-content p-3">
                            <form action="{{ route('signin') }}" method="POST">
                                @csrf

                                <div class="modal-header">
                                    <h3>Sign In</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="modalCloseButton"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                        @error('email')
                                            <div class="text-white mt-1">{{ ucwords($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                        @error('password')
                                            <div class="text-white mt-1">{{ ucwords($message) }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <a class="text-decoration-none me-auto" data-bs-toggle="modal" data-bs-target="#signUp">Sign Up</a>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="modalCloseButton2">Close</button>
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="signUp" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                        <div class="modal-content p-3">
                            <form action="{{ route('signup') }}" method="POST">
                                @csrf

                                <div class="modal-header">
                                    <h3>Sign Up</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="modalCloseButton3"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <a class="text-decoration-none me-auto" data-bs-toggle="modal" data-bs-target="#signIn">Sign In</a>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="modalCloseButton4">Close</button>
                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div class="container mt-3">
                @yield('content')
            </div>
        </section>
    </main>

    @stack('scripts')
</body>
</html>
