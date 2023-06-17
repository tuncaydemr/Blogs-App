@extends('layouts.layout')

@section('title')
    Blog Details
@endsection

@section('content')

    @if ($active)

        <div class="card my-4">
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('storage/img/' . $image) }}" alt="Image" class="img-fluid rounded-start" width="325" height="217">
                </div>
                <div class="col-7">
                    <h4 class="card-title mb-4 mt-2">{{ $title }}</h4>
                    <h6 class="mb-3">{{ $description }}</h6>

                    @if($likes > 1)
                        <p class="mb-4 me-3 mt-1">{{ $likes }} likes</p>
                    @elseif ($likes == 1)
                        <p class="mb-4 me-3 mt-1">{{ $likes }} like</p>
                    @else
                        <p class="mb-4">0 like</p>
                    @endif

                    <p class="m-0">
                        <a href="/blogs" class="btn btn-primary px-5 py-2">Back</a>
                    </p>
                </div>
                <div class="col-2 d-flex justify-content-center flex-column align-items-center">
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

@push('cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush

@push('scripts')
    <script src="{{ asset('js/index.js') }}"></script>
@endpush

