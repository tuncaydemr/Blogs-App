@extends('layouts.layout')

@section('title')
    Blog Create
@endsection

@section('content')

    <form action="/blogs/create" method="POST" novalidate enctype="multipart/form-data">
        @csrf

        <div class="container d-flex justify-content-center align-items-center bg-danger rounded-4" style="height: 80vh;">
            <div class="row w-50">
                <h2 class="mb-5 text-center text-white"><ins>Blog Create</ins></h2>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="title" class="form-label text-white">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                        @error('title')
                            <div class="text-white mt-1">{{ ucwords($message) }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label text-white">Description</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                        @error('description')
                            <div class="text-white mt-1">{{ ucwords($message) }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label text-white">Image</label>
                        <input class="form-control" type="file" id="image" name="image" accept=".png, .jpeg, .jpg">
                        @error('image')
                            <div class="text-white mt-1">{{ ucwords($message) }}</div>
                        @enderror
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="active" name="active" value="1">
                        <label class="form-check-label text-white" for="active">Active</label>
                    </div>
                        @error('active')
                            <div class="text-white mt-1">{{ ucwords($message) }}</div>
                        @enderror
                    <div class="w-100 d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-primary w-50 p-3">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
