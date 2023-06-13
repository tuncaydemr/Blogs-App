@extends('layouts.layout')

@section('content')

    <form action="/blogs/{{ $blog->id }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="container d-flex justify-content-center align-items-center bg-danger rounded-4" style="height: 80vh;">
            <div class="col-3">&nbsp;</div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="title" class="form-label text-white">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label text-white">Description</label>
                    <textarea class="form-control" name="description" id="description">{{ $blog->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label text-white">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="w-100 d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-primary w-50 p-3">Submit</button>
                </div>
            </div>

            <div class="col-3">&nbsp;</div>
        </div>
    </form>

@endsection
