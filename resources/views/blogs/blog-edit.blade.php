@extends('layouts.layout')

@section('content')

    <form action="{{ route('blog-form') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">

        <button type="submit">Submit</button>
    </form>

@endsection
