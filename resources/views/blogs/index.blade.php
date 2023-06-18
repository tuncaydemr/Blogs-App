@extends('layouts.layout')

@section('title')
    Blog App
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3">
                <a href="/blogs/add" class="btn btn-primary" role="button">Blog Add</a>
            </div>
            <div class="col-6">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($blogs as $blog)

        @if ($blog['active'])

            <div class="card my-4">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ asset('storage/img/' . $blog['image']) }}" alt="Image" class="img-fluid rounded-start" width="325" height="217">
                    </div>
                    <div class="col-6 d-flex flex-column justify-content-between my-2">
                        <h4 class="card-title mb-3 mt-2">{{ $blog['title'] }}</h4>
                        <h6 class="mb-3">{{ $blog['description'] }}</h6>
                        <div class="like d-flex align-items-center">

                            @if($blog['likes'] > 1)
                                <p class="mb-4 me-3 mt-1">{{ $blog['likes'] }} likes</p>
                            @elseif ($blog['likes'] <= 1)
                                <p class="mb-4 me-3 mt-1">{{ $blog['likes'] }} like</p>
                            @else
                                <p class="mb-4">0 like</p>
                            @endif

                            <a href="/blogs/{{ $blog['id'] }}/like">
                                <button type="button" class="btn btn-primary py-1 mb-3">
                                    <i class="bi bi-hand-thumbs-up-fill" style="font-size: 0.9rem;"></i>
                                    Like
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <p>
                            <a href="/blogs/{{ $blog['id'] }}" class="btn btn-danger px-5 py-2">Details</a>
                        </p>
                    </div>
                </div>
            </div>

        @endif

    @endforeach

@endsection

@push('cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush

@push('scripts')
    <script src="{{ asset('js/index.js') }}"></script>
@endpush
