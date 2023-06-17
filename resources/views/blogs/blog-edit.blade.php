@extends('layouts.layout')

@section('title')
    Blog Edit
@endsection

@section('content')

    <form action="/blogs/{{ $id }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="container d-flex justify-content-center align-items-center bg-danger rounded-4" style="height: 80vh;">
            

            <div class="col-6">
                <div class="mb-3">
                    <label for="title" class="form-label text-white">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label text-white">Description</label>
                    <textarea class="form-control" name="description" id="description">{{ $description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label text-white">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @error('image')
                        <div class="text-white mt-1">{{ ucwords($message) }}</div>
                    @enderror
                </div>
                <div class="w-100 d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-primary w-50 p-3">Edit</button>
                </div>
            </div>

            <div class="col-3">&nbsp;</div>
        </div>
    </form>

@endsection

@push('cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush

@push('scripts')
    <script src="{{ asset('js/index.js') }}"></script>
@endpush
