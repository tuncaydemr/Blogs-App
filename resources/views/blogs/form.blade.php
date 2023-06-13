@extends('layouts.layout')

@section('content')

    <form action="/blogs/{{ $blog->id }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <label for="name">Title:</label>
        <input type="text" id="name" name="name" value="{{ $blog->title }}">

        <label for="email">Description:</label>
        <input type="text" id="email" name="email" value="{{ $blog->description }}">

        <button type="submit">Submit</button>
    </form>

@endsection
