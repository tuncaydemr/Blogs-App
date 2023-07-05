@extends('layouts.layout')

@section('title')
    Blog Details
@endsection

@section('content')

    @if ($active)

        <div class="card my-4">
            <div class="row">
                <div class="col-12 col-md-3">
                        <img src="{{ asset('img/' . $image) }}" alt="Image" class="img-fluid rounded-start">
                </div>
                <div class="col-8 col-md-6 d-flex flex-column justify-content-between card-body">
                    <h4 class="card-title">{{ $title }}</h4>
                    <h6 class="card-description">{{ $description }}</h6>
                    <div class="like d-flex align-items-center">
                        @if($likes > 1)
                            <p class="mb-1 mb-sm-2 mb-lg-3">{{ $likes }} likes</p>
                        @elseif ($likes === 1)
                            <p class="mb-lg-2">{{ $likes }} like</p>
                        @else
                            <p class="mb-lg-2">0 like</p>
                        @endif


                    </div>
                    <p class="m-3">
                        <a href="{{ route('blogs') }}" class="btn btn-primary px-5 py-2">Back</a>
                    </p>
                </div>
                <div class="col-4 col-md-3 d-flex flex-column align-items-center justify-content-center">
                    <p>
                        <a href="{{ route('blogs.edit', ['id' => $id]) }}" class="btn btn-primary px-4 py-2">Edit</a>
                    </p>
                    <p>
                        <a href="{{ route('blogs.delete', ['id' => $id]) }}" class="btn btn-danger px-3 py-2">Delete</a>
                    </p>
                </div>
            </div>
        </div>

    @else

        <div class="alert alert-warning">
            Blog Not Found
        </div>

    @endif

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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

