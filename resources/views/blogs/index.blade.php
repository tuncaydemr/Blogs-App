@extends('layouts.layout')

@section('content')

    @foreach ($blogs as $blog)

        @if ($blog['active'])

            <div class="card my-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('storage/img/Laravel.png') }}" alt="Image" class="img-fluid rounded-start" width="300" height="200">
                        </div>
                        <div class="col-9">
                            <h4 class="card-title mb-4">{{ $blog['title'] }}</h4>
                            <h6>{{ $blog['description'] }}</h6>
                            <p>{{ $blog['likes'] }} likes</p>
                            <p>{{ $blog['timestamp'] }}</p>
                            <p>
                                <a href="/blogs/{{ $blog['id'] }}" class="btn btn-danger px-5 py-2">Details</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        @endif

    @endforeach

@endsection
