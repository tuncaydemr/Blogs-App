@extends('layouts.index')

@section('title')
    Blog Home
@endsection

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('img/blog-banner-1.png') }}" class="img-fluid opacity-75 rounded-2 z-0 position-relative" alt="Blog Banner" width="100%" style="height: 80vh;">
            </div>
            <div class="card w-25 position-absolute z-1 p-4 banner-card">
                <div class="card-body">
                    <h3 class="card-title mb-5">Lorem ipsum dolor sit amet</h3>
                    <p class="card-text mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores amet saepe vitae consequatur labore. Repellat assumenda iste accusamus minima debitis.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
@endsection

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
