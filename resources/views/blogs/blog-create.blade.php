@extends('layouts.layout')

@section('content')

    <form action="/blogs/create" method="GET" novalidate>
        @csrf

        <div class="container d-flex justify-content-center align-items-center bg-danger rounded-4" style="height: 80vh;">
            <div class="row">
                
            </div>
        </div>
    </form>

@endsection
