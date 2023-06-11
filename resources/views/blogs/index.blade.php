@extends('layouts.layout')

@section('content')

    @foreach ($blogs as $blog)

        @if ($blog['active'])

            <div class="card my-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">{{ $blog['title'] }}</h5>
                    <p>{{ $blog['description'] }}</p>
                    <p>{{ $blog['likes'] }} likes</p>
                    <p>
                        <a href="/blogs/{{ $blog['id'] }}" class="btn btn-danger px-5 py-2">Details</a>
                    </p>
                </div>
            </div>

        @endif

    @endforeach

@endsection
