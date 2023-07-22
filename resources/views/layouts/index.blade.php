@php
    $userId = Session::get('user');
@endphp

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
                <div id="navMenu" class="collapse navbar-collapse py-5 rounded-4">
                    <ul class="navbar-nav mx-auto flex-row justify-content-center mb-5 mb-lg-0">
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
                    <ul class="navbar-nav flex-row justify-content-center mb-3 mb-lg-0">

                        @if (Session::has('user'))
                            <li class="nav-item me-4">
                                <a href="{{ route('my.account', ['id' => $userId->id]) }}" class="btn btn-primary" role="button">My Account</a>
                            </li>

                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-primary">Logout</button>
                                </form>
                        @else
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">
                                    Login
                                </button>
                            </li>
                        @endif
                    </ul>
                </div>
                <div id="login" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                        <div class="modal-content p-3">
                            <form action="{{ route('login') }}" method="POST" novalidate>
                                @csrf

                                <div class="modal-header">
                                    <h3>Login</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="modalCloseButton"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3 form-group">
                                        <label for="loginEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control
                                            @error('loginEmail')
                                                is-invalid
                                            @enderror
                                        " name="loginEmail" id="loginEmail">
                                        @error('loginEmail')
                                            <div class="text-danger p-2 rounded invalid-feedback">{{ ucfirst($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="loginPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control
                                            @error('loginPassword')
                                                is-invalid
                                            @enderror
                                        " name="loginPassword" id="loginPassword">
                                        @error('loginPassword')
                                            <div class="invalid-feedback p-2 rounded">
                                                <div class="text-danger">1- Minimum 8 characters.</div>
                                                <div class="text-danger">2- At least one uppercase letter.</div>
                                                <div class="text-danger">3- At least one lowercase letter.</div>
                                                <div class="text-danger">4- At least one number.</div>
                                                <div class="text-danger">5- At least one special character.</div>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <a class="text-decoration-none me-auto" data-bs-toggle="modal" data-bs-target="#register">Register</a>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="modalCloseButton2">Close</button>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="register" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                        <div class="modal-content p-3">
                            <form action="{{ route('register') }}" method="POST" novalidate>
                                @csrf

                                <div class="modal-header">
                                    <h3>Register</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="modalCloseButton3"></button>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="registerUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control
                                            @error('registerUsername')
                                                is-invalid
                                            @enderror
                                        " name="registerUsername" id="registerUsername">
                                        @error('registerUsername')
                                            <div class="text-danger p-2 rounded invalid-feedback">{{ ucfirst($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="registerEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control
                                            @error('registerEmail')
                                                is-invalid
                                            @enderror
                                        " name="registerEmail" id="registerEmail">
                                        @error('registerEmail')
                                            <div class="text-danger p-2 rounded invalid-feedback">{{ ucfirst($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="registerPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control
                                            @error('registerPassword')
                                                is-invalid
                                            @enderror
                                        " name="registerPassword" id="registerPassword">
                                        @error('registerPassword')
                                            <div class="invalid-feedback p-2 rounded">
                                                <div class="text-danger">1- Minimum 8 characters.</div>
                                                <div class="text-danger">2- At least one uppercase letter.</div>
                                                <div class="text-danger">3- At least one lowercase letter.</div>
                                                <div class="text-danger">4- At least one number.</div>
                                                <div class="text-danger">5- At least one special character.</div>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <a class="text-decoration-none me-auto" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="modalCloseButton4">Close</button>
                                    <button type="submit" class="btn btn-primary">Register</button>
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
            @yield('content')
        </section>
        <section>
            @yield('content2')
        </section>
        <section>
            @yield('content3')
        </section>
    </main>

    @stack('scripts')
</body>
</html>
