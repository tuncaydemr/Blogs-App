@extends('layouts.index')

@section('title')
    Blog Home
@endsection

@section('content')
    <div class="container-fluid my-3">
        <div class="row blog-banner">
            <div class="col-12">
                <img src="{{ asset('img/blog-banner-1.png') }}" class="img-fluid" alt="Blog Banner">
            </div>
        </div>
    </div>
@endsection

@section('content2')
    <div class="container my-3">
        <div class="row">
            <div class="col social-media py-md-3">
                <h3>Social Media</h3>
                <div class="d-flex justify-content-evenly">
                    <a href="https://www.linkedin.com/">
                        <img src="{{ asset('img/social-media/linkedin.png') }}" alt="linkedin"/>
                    </a>
                    <a href="https://tr-tr.facebook.com/">
                        <img src="{{ asset('img/social-media/facebook.png') }}" alt="facebook"/>
                    </a>
                    <a href="https://www.instagram.com/">
                        <img src="{{ asset('img/social-media/instagram.png') }}" alt="instagram"/>
                    </a>
                    <a href="https://www.twitter.com/">
                        <img src="{{ asset('img/social-media/twitter.png') }}" alt="twitter"/>
                    </a>
                    <a href="https://www.youtube.com/">
                        <img src="{{ asset('img/social-media/youtube.png') }}" alt="youtube"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content3')
    <div class="container latest-articles my-5">
        <div class="row">
            <div class="col-12">
                <h3>Latest Articles</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex">

                @foreach ($blogs as $blog)

                    @if ($blog->active)

                        <div class="card mx-1 mx-md-2 mx-xl-3">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('img/' . $blog->image) }}" alt="Image" class="img-fluid rounded-top">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 py-md-3">
                                    <h4 class="card-title m-md-3">{{ $blog->title }}</h4>
                                    <div class="card-description">
                                        <h6 class="text-truncate m-md-3" id="description">{{ $blog->description }}</h6>
                                        <a href="{{ route('blogs.details', $blog->id) }}" class="more m-md-3 text-decoration-none" id="more">More...</a>
                                    </div>

                                    @if($blog->likes > 1)
                                        <p class="like m-md-3">{{ $blog->likes }} likes</p>
                                    @elseif ($blog->likes === 1)
                                        <p class="like m-md-3">{{ $blog->likes }} like</p>
                                    @else
                                        <p class="like m-md-3">0 like</p>
                                    @endif

                                </div>
                            </div>
                        </div>

                    @endif

                @endforeach

            </div>
        </div>
    </div>
@endsection

@section('content4')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <img src="{{ asset('img/technology-1.jpg') }}" class="img-fluid" alt="Technology">
            </div>
            <div class="col">
                <img src="{{ asset('img/technology-2.jpg') }}" class="img-fluid" alt="Technology">
            </div>
            <div class="col">
                <img src="{{ asset('img/technology-3.jpg') }}" class="img-fluid" alt="Technology">
            </div>
            <div class="col">
                <img src="{{ asset('img/technology-4.jpg') }}" class="img-fluid" alt="Technology">
            </div>
            <div class="col">
                <img src="{{ asset('img/technology-5.jpg') }}" class="img-fluid" alt="Technology">
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
