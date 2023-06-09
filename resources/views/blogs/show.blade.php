@extends('layouts.layout')

@section('content')
    @if ($active)
        <div class="card my-4">
            <div class="card-body">
                <h5 class="card-title mb-4">{{ $title }}</h5>
                <p>{{ $description }}</p>
                <p>{{ $likes }}</p>
                <p>
                    <a href="/blogs" class="link-danger-hover border border-danger rounded px-3 py-1 bg-danger bg-gradient text-white" style="text-decoration: none;">Back</a>
                </p>
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            Blog Not Found
        </div>
    @endif
@endsection
