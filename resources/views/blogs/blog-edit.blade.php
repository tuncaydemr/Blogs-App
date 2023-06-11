@extends('layouts.layout')

@section('content')

    @if ($active)

    @else

        <div class="alert alert-warning">
            Blog Not Found
        </div>

    @endif
    
@endsection
