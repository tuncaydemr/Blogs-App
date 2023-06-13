@extends('layouts.layout')

@section('content')

    <form action="/blogs/{{ $blog->id }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
