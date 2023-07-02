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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signIn">
                            Sign in
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signUp">
                            Sign up
                        </button>
                    </li>
                </ul>
            </div>
            <div id="signIn" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="">
                            <div class="modal-header">
                                <h3>Sign In</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="pass" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="pass" id="pass">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="signUp" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="">
                            <div class="modal-header">
                                <h3>Sign In</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="pass" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="pass" id="pass">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
