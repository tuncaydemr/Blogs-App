@extends('layouts.index')

@section('title')
    My Account
@endsection

@if (Session::has('user'))

    @section('content')

        @foreach ($users as $user)

            <form action="{{ route('my.account.edit', $user->id) }}" method="POST" novalidate>
                @csrf

                <div class="container d-flex justify-content-center align-items-center bg-dark rounded-4 mb-3" style="height: 90vh;">
                    <div class="row my-account">
                        <h2 class="mb-5 text-center text-white">My Account</h2>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="username" class="form-label text-white">Username</label>
                                <input type="text" class="form-control

                                    @error('username')
                                        is-invalid
                                    @enderror

                                " id="username" name="username" value="{{ $user->username }}">
                                @error('username')
                                    <div class="text-white mt-1">{{ ucwords($message) }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label text-white">Email</label>
                                <input type="email" class="form-control

                                    @error('email')
                                        is-invalid
                                    @enderror

                                " id="email" name="email" value="{{ $user->email }}">
                                @error('email')
                                    <div class="text-white mt-1">{{ ucwords($message) }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-white">Password</label>
                                <input type="password" class="form-control

                                    @error('password')
                                        is-invalid
                                    @enderror

                                " id="password" name="password" value="{{ $user->password }}">
                                @error('password')
                                    <div class="text-white mt-1">{{ ucwords($message) }}</div>
                                @enderror
                            </div>
                            <div class="w-100 d-flex justify-content-center mt-5">
                                <button type="submit" class="btn btn-primary w-50 p-3">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        @endforeach

    @endsection

@endif

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
@endpush

@push('cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('js/index.js') }}"></script>
@endpush
