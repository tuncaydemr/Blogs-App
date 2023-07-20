@extends('layouts.index')

@section('title')
    Blog Home
@endsection

@section('content')
    <div class="container-fluid my-4">
        <div class="row blog-banner">
            <div class="col-12">
                <img src="{{ asset('img/blog-banner-1.png') }}" class="img-fluid rounded-2" alt="Blog Banner">
            </div>
            <div class="card p-4 rounded-4">
                <div class="card-body">
                    <h3 class="card-title mb-5">Lorem ipsum dolor sit amet</h3>
                    <p class="card-text mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores amet saepe vitae consequatur labore. Repellat assumenda iste accusamus minima debitis.</p>
                    <a href="#" role="button" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content2')
    <div class="container my-4">
        <div class="row">
            <div class="col social-links py-3">
                <h3>Social Links</h3>
                <div class="d-flex justify-content-evenly">
                    <a href="">
                        <img width="70" height="70" src="https://img.icons8.com/fluency/70/linkedin.png" alt="linkedin"/>
                    </a>
                    <a href="">
                        <img width="70" height="70" src="https://img.icons8.com/fluency/70/facebook-new.png" alt="facebook"/>
                    </a>
                    <a href="">
                        <img width="70" height="70" src="https://img.icons8.com/fluency/70/instagram-new.png" alt="instagram"/>
                    </a>
                    <a href="">
                        <img width="70" height="70" src="https://img.icons8.com/fluency/70/linkedin.png" alt="linkedin"/>
                    </a>
                    <a href="">
                        <img width="70" height="70" src="https://img.icons8.com/fluency/70/linkedin.png" alt="linkedin"/>
                    </a>
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
