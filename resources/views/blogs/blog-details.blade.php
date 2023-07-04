@extends('layouts.layout')

@section('title')
    Blog Details
@endsection

@section('content')

    @if ($active)

        <div class="card my-4">
            <div class="row">
                <div class="col-4">
                        <img src="{{ asset('img/' . $image) }}" alt="Image" class="img-fluid rounded-start">
                </div>
                <div class="col-4">
                    <h4 class="card-title mb-1 mb-sm-2 mb-md-3 mb-lg-4 mt-2">{{ $title }}</h4>
                    <h6 class="mb-1 mb-sm-2 mb-lg-3">{{ $description }}</h6>

                    @if($likes > 1)
                        <p class="mb-1 mb-sm-2 mb-lg-3">{{ $likes }} likes</p>
                    @elseif ($likes == 1)
                        <p class="mb-lg-2">{{ $likes }} like</p>
                    @else
                        <p class="mb-lg-2">0 like</p>   
                    @endif

                    <p class="m-0">
                        <a href="/blogs" class="btn btn-primary px-5 py-2">Back</a>
                    </p>
                </div>
                <div class="col-4 d-flex justify-content-center flex-column align-items-center">
                    <p>
                        <a href="/blogs/{{ $id }}/edit" class="btn btn-primary px-4 py-2">Edit</a>
                    </p>
                    <p>
                        <a href="/blogs/{{ $id }}/delete" class="btn btn-danger px-3 py-2">Delete</a>
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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

