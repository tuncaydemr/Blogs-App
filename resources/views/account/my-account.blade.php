@extends('layouts.index')

@section('title')
    My Account
@endsection

@if (Session::has('user'))

    @section('content')

        <form action="{{ route('my.account.edit') }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf

            <div class="container d-flex justify-content-center align-items-center bg-dark rounded-4 mb-3" style="height: 90vh;">
                <div class="row blog-create">
                    <h2 class="mb-5 text-center text-white">Blog Create</h2>
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
                            <textarea class="form-control" name="description" id="description" maxlength="200"></textarea>
                            <p id="letterCount" class="text-white text-end"></p>
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
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="active" name="active">
                            <label class="form-check-label text-white" for="active">Disable</label>
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
@endpush
