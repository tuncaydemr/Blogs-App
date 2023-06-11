@extends('layouts.layout')

@section('content')
    @if ($active)
        <div class="card my-4">
            <div class="card-body">
                <h5 class="card-title mb-4">{{ $title }}</h5>
                <p>{{ $description }}</p>
                <p>{{ $likes }}</p>
                <p>
                    <a href="/blogs" class="btn btn-danger px-5 py-2">Back</a>
                </p>
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            Blog Not Found
        </div>
    @endif
@endsection
