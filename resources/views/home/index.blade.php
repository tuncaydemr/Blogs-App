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
            <div class="col social-media py-3">
                <h3>Social Media</h3>
                <div class="d-flex justify-content-evenly">
                    <a href="https://www.linkedin.com/">
                        <img width="70" height="70" src="https://img.icons8.com/fluency/70/linkedin.png" alt="linkedin"/>
                    </a>
                    <a href="https://tr-tr.facebook.com/">
                        <img width="70" height="70" src="https://img.icons8.com/fluency/70/facebook-new.png" alt="facebook"/>
                    </a>
                    <a href="https://www.instagram.com/">
                        <img width="70" height="70" src="https://img.icons8.com/fluency/70/instagram-new.png" alt="instagram"/>
                    </a>
                    <a href="https://www.twitter.com/">
                        <img width="70" height="70" src="https://img.icons8.com/fluency/70/twitter.png" alt="twitter"/>
                    </a>
                    <a href="https://www.youtube.com/">
                        <img width="70" height="70" src="https://img.icons8.com/fluency/70/youtube-play.png" alt="youtube"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content3')
    <div class="container my-4">
        <div class="row">
            <div class="col">

                @foreach ($blogs as $blog)
                
                    @if ($blog['active'])

                        <div class="card my-4">
                            <div class="row">
                                <div class="col-12 col-md-5 col-lg-4">
                                    <img src="{{ asset('img/' . $blog['image']) }}" alt="Image" class="img-fluid rounded-start">
                                </div>
                                <div class="col-8 col-md-4 col-lg-5 d-flex flex-column justify-content-evenly py-3 py-md-0">
                                    <h4 class="card-title">{{ $blog['title'] }}</h4>
                                    <div class="card-description">
                                        <h6 class="text-truncate" id="description">{{ $blog['description'] }}</h6>
                                        <a href="" class="more text-decoration-none" id="more">More...</a>
                                    </div>

                                    @if($blog['likes'] > 1)
                                        <p class="like">{{ $blog['likes'] }} likes</p>
                                    @elseif ($blog['likes'] === 1)
                                        <p class="like">{{ $blog['likes'] }} like</p>
                                    @else
                                        <p class="like">0 like</p>
                                    @endif

                                </div>

                                <div class="col-4 col-md-3 col-lg-3 d-flex flex-column align-items-center justify-content-center">
                                    <a href="{{ route('blogs.like', ['id' => $blog['id']]) }}">
                                        <button type="button" class="btn btn-primary py-1 mb-3">
                                            <i class="bi bi-hand-thumbs-up-fill"></i>
                                            Like
                                        </button>
                                    </a>
                                    <a href="{{ route('blogs.details', ['id' => $blog['id']]) }}" class="btn btn-success blogs-details-btn">Details</a>
                                </div>
                            </div>
                        </div>

                    @endif

                @endforeach

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
