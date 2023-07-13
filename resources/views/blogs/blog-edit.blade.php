@extends('layouts.layout')

@section('title')
    Blog Edit
@endsection

@section('content')

    <form action="{{ route('blogs.edit.submitForm', ['id' => $id]) }}" method="POST" novalidate enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="container d-flex justify-content-center align-items-center bg-dark rounded-4 mb-3" style="height: 80vh;">
            <div class="row blog-edit">
                <h2 class="mb-5 text-center text-white">Blog Edit</h2>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="title" class="form-label text-white">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $title }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label text-white">Description</label>
                        <textarea class="form-control" name="description" id="description" maxlength="200">{{ $description }}</textarea>
                        <p id="letterCount" class="text-white text-end"></p>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label text-white">Image</label>
                        <input class="form-control" type="file" id="image" name="image" accept=".png, .jpeg, .jpg">
                        <input type="hidden" name="old_image" value="{{ $image }}">
                    </div>
                    <div class="w-100 d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-primary w-50 p-3">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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

    @if (!session()->has('user'))
        <script>
            $(document).ready(function() {
                openModal();
            });
        </script>
    @endif
@endpush
