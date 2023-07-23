@extends('layouts.index')

@section('title')
    Blog Edit
@endsection

@if (isset($userSession) || isset($adminSession))

    @section('content')

        <form action="{{ route('blogs.edit.submitForm', $id) }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="container d-flex justify-content-center align-items-center bg-dark rounded-4 my-3" style="height: 80vh;">
                <div class="row blog-edit">
                    <h2 class="mb-5 text-center text-white">Blog Edit</h2>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="title" class="form-label text-white">Title</label>
                            <input type="text" class="form-control

                                    @error('title')
                                        is-invalid
                                    @enderror

                                " id="title" name="title" value="{{ $title }}">
                            @error('title')
                                <div class="text-danger mt-1">{{ ucwords($message) }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label text-white">Description</label>
                            <textarea class="form-control

                                    @error('description')
                                        is-invalid
                                    @enderror

                                " name="description" id="description" maxlength="200" rows="5">{{ $description }}</textarea>
                            <div class="d-flex justify-content-between">
                                @error('description')
                                    <div class="text-danger mt-1 w-100">{{ ucwords($message) }}</div>
                                @enderror
                                <p id="letterCount" class="text-white text-end w-100"></p>
                            </div>
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
