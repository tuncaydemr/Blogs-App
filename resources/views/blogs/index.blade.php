@extends('layouts.layout')

@section('title')
    Blog App
@endsection

@section('content')

    <a href="/blogs/edit" class="btn btn-primary" role="button">Blog Add</a>

    @foreach ($blogs as $blog)

        @if ($blog['active'])

            <div class="card my-4">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ asset('storage/img/' . $blog['image']) }}" alt="Image" class="img-fluid rounded-start" width="325" height="217">
                    </div>
                    <div class="col-9">
                        <h4 class="card-title mb-3 mt-2">{{ $blog['title'] }}</h4>
                        <h6 class="mb-3">{{ $blog['description'] }}</h6>
                        @if ($blog['likes'])
                            <div class="like d-flex align-items-center">
                                <p class="mb-4 me-3 mt-1">{{ $blog['likes'] }} likes</p>

                                <a href="/blogs/{{ $blog['id'] }}/like">
                                    <button type="button" class="btn btn-primary py-1 mb-3">
                                        <i class="bi bi-hand-thumbs-up-fill" style="font-size: 0.9rem;"></i>
                                        Like
                                    </button>
                                </a>
                            </div>
                        @else
                            <button type="button" class="btn btn-primary py-1 mb-3">
                                <i class="bi bi-hand-thumbs-up-fill" style="font-size: 0.9rem;"></i>
                                Like
                            </button>
                        @endif
                        <p class="m-0">
                            <a href="/blogs/{{ $blog['id'] }}" class="btn btn-danger px-5 py-2">Details</a>
                        </p>
                    </div>
                </div>
            </div>

        @endif

    @endforeach

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('js/index.js') }}"></script>
@endpush
