@extends('layouts.index')

@section('title')
    Blogs
@endsection

@if (Session::has('user') || Session::has('admin'))

    @section('content')

        <div class="container blogs-home">
            <div class="row">

                @if (Session::has('admin'))

                    <div class="col-12 col-md-2 my-2 p-0">
                        <a href="{{ route('blogs.add') }}" class="btn btn-primary d-block d-md-inline-block" role="button">Blog Add</a>
                    </div>
                    <div class="col-8 col-md-7 my-2 ps-0 pe-4 px-md-3">
                        <form method="GET" action="{{ route('search') }}" class="d-flex" role="search">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-danger" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-4 col-md-3 my-2 p-0">
                        <form action="{{ route('sortByRate') }}" method="GET">
                            <select class="form-select" name="sortBy" id="sortBy">
                                <option value="asc">Sort By</option>
                                <option value="desc">Top Rated</option>
                            </select>
                        </form>
                    </div>

                @else

                    <div class="col-12 col-md-8 col-lg-7 my-2 p-0">
                        <form method="GET" action="{{ route('search') }}" class="d-flex" role="search">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-danger" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-12 col-md-3 my-2 ms-auto p-0">
                        <form action="{{ route('sortByRate') }}" method="GET">
                            <select class="form-select" name="sortBy" id="sortBy">
                                <option value="asc">Sort By</option>
                                <option value="desc">Top Rated</option>
                            </select>
                        </form>
                    </div>

                @endif

            </div>

            <div class="row">
                <div class="col p-0">

                    @foreach ($blogs as $blog)

                        @if ($blog->active)

                            <div class="card my-4">
                                <div class="row">
                                    <div class="col-12 col-md-5 col-lg-4">
                                        <img src="{{ asset('img/' . $blog->image) }}" alt="Image" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-8 col-md-4 col-lg-5 d-flex flex-column justify-content-evenly py-3 py-md-0">
                                        <h4 class="card-title">{{ $blog->title }}</h4>
                                        <div class="card-description">
                                            <h6 class="text-truncate" id="description">{{ $blog->description }}</h6>
                                            <a href="{{ route('blogs.details', $blog->id) }}" class="more text-decoration-none" id="more">More...</a>
                                        </div>

                                        @if($blog->likes > 1)
                                            <p class="like">{{ $blog->likes }} likes</p>
                                        @elseif ($blog->likes === 1)
                                            <p class="like">{{ $blog->likes }} like</p>
                                        @else
                                            <p class="like">0 like</p>
                                        @endif

                                    </div>

                                    <div class="col-4 col-md-3 col-lg-3 d-flex flex-column align-items-center justify-content-center">
                                        <a href="{{ route('blogs.like', $blog->id) }}">
                                            <button type="button" class="btn btn-primary py-1 mb-3">
                                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                                Like
                                            </button>
                                        </a>
                                        <a href="{{ route('blogs.details', $blog->id) }}" class="btn btn-success blogs-details-btn">Details</a>
                                    </div>
                                </div>
                            </div>

                        @endif

                    @endforeach

                </div>
            </div>

            <div class="my-5 d-flex justify-content-center">
                <p>{{ $blogs->links() }}</p>
            </div>
        </div>

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

    @if (session()->has('user') || session()->has('admin'))

    @else
        <script>
            $(document).ready(function() {
                openModal();
            });
        </script>
    @endif
@endpush
