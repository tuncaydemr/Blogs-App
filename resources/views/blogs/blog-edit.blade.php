@extends('layouts.layout')

@section('content')

    <div>{{ $blog['title'] }}</div>

    <div>{{ $description }}</div>

    <div>{{ $image }}</div>

@endsection
