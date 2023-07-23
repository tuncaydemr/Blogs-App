@extends('layouts.index')

@section('title')
    Blog Contact
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center my-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24532.794599935532!2d-105.00186320145498!3d39.77110361451773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c7911c3c8d1ab%3A0xa636654edbb0b5b1!2sNorth%20Denver%2C%20Denver%2C%20Colorado%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1688650863948!5m2!1str!2str" width="1200" height="600" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <div class="container bg-dark rounded-4 my-5 col-md-11 py-5">
        <div class="row">
            <div class="col-11 col-md-8 d-flex flex-column justify-content-center my-3 mx-auto">
                <h1 class="text-center my-5 text-white">Contact Us</h1>
                <form action="{{ route('send.email') }}" method="POST" novalidate>
                    @csrf

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="name" class="form-label text-white">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label text-white">Phone</label>
                            <input type="tel" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="subject" class="form-label text-white">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <label for="message" class="form-label text-white">Message</label>
                            <textarea class="form-control" name="message" id="message" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary my-5 w-25 mx-auto py-2 px-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
@endpush

@push('cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('js/index.js') }}"></script>
@endpush
