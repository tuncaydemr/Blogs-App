@extends('layouts.layout')

@section('content')

    @foreach ($blogs as $blog)

        @if ($blog['active'])

            <div class="card my-4">
                <div class="card-body">
                    <img src="{{ asset('storage/img/Laravel.png') }}" alt="Image" class="img-fluid rounded">
                    <h4 class="card-title mb-4">{{ $blog['title'] }}</h4>
                    <h6>{{ $blog['description'] }}</h6>
                    <p>{{ $blog['likes'] }} likes</p>
                    <p>{{ $blog['timestamp'] }}</p>
                    <p>
                        <a href="/blogs/{{ $blog['id'] }}" class="btn btn-danger px-5 py-2">Details</a>
                    </p>
                </div>
            </div>

        @endif

    @endforeach

@endsection
