@extends('layouts.layout')

@section('content')

    <a href="/blogs/edit" class="btn btn-primary" role="button">Blog Add</a>

    @foreach ($blogs as $blog)

        @if ($blog['active'])

            <div class="card my-4">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ asset('storage/img/' . $blog['image']) }}" alt="Image" class="img-fluid rounded-start" width="325" height="217">
                    </div>
                    <div class="col-9">
                        <h4 class="card-title mb-3 mt-2">{{ $blog['title'] }}</h4>
                        <h6 class="mb-3">{{ $blog['description'] }}</h6>
                        <p class="mb-4 me-3 mt-1">{{ $blog['likes'] }} likes</p>
                        <p class="m-0">
                            <a href="/blogs/{{ $blog['id'] }}" class="btn btn-danger px-5 py-2">Details</a>
                        </p>
                    </div>
                </div>
            </div>

        @endif

    @endforeach

@endsection
