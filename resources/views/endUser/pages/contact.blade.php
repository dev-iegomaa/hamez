@extends('endUser.layout.master')

@section('title')
    {{ __('Hamez') }} | {{ __('Contact') }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/pages/contact.css') }}" type="text/css" />
@endpush

@section('content')
    @include('endUser.layout.loading')

    <!-- Start Slider Section -->
    <section id="banner" class="text-center">
        <h1 class="mb-0 text-white display-2 text-capitalize">{{ __('contact us') }}</h1>
    </section>
    <!-- End Slider Section -->

    <!-- Start Category Section -->
    <section id="category" class="py-5">
        <div class="container py-5">
            <div class="row text-center">
                <div class="col-lg mb-3 mb-lg-0">
                    <article class="py-5">
                        <i class="fa-solid fa-headset fa-4x"></i>
                        <p class="w-100 align-self-end mb-0 text-capitalize mt-3 mb-3 text-white">{{ __('phone number') }}</p>
                        <p class="w-100 text-capitalize fw-medium">+93601548613</p>
                    </article>
                </div>
                <div class="col-lg mb-3 mb-lg-0">
                    <article class="py-5">
                        <i class="fa-solid fa-envelope-open-text fa-4x"></i>
                        <p class="w-100 align-self-end mb-0 text-capitalize mt-3 mb-3 text-white">{{ __('email address') }}</p>
                        <p class="w-100 text-capitalize fw-medium">info@hamez.sa</p>
                    </article>
                </div>
                <div class="col-lg mb-3 mb-lg-0">
                    <article class="py-5">
                        <i class="fa-solid fa-map-location-dot fa-4x"></i>
                        <p class="w-100 align-self-end mb-0 text-capitalize mt-3 mb-3 text-white">{{ __('main location') }}</p>
                        <p class="w-100 text-capitalize fw-medium">relaxing</p>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- End Category Section -->

    <!-- Start Contact Section -->
    <section id="contact" class="py-5 text-center">
        <div class="container">
            <form action="{{ route('endUser.contact.store') }}" method="post" class="py-5 mx-0 mx-md-5 my-5">
                @csrf
                <h2 class="text-uppercase fw-lighter mt-4">{{ __('contact us') }}</h2>
                <p class="text-capitalize fs-4 text-white">{{ __('send us message') }}</p>
                <div class="row mx-5 justify-content-center">
                    <div class="col-lg">
                        <input class="bg-transparent text-white w-100 mb-3 px-3 py-2 @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Full Name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg">
                        <input class="bg-transparent text-white w-100 mb-3 px-3 py-2 @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg">
                        <input class="bg-transparent text-white w-100 mb-3 px-3 py-2 @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone') }}" placeholder="{{ __('Phone Number') }}">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <input class="bg-transparent text-white w-100 mb-3 px-3 py-2 @error('subject') is-invalid @enderror" type="text" name="subject" value="{{ old('subject') }}" placeholder="{{ __('Subject') }}">
                        @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <textarea class="bg-transparent text-white w-100 mb-3 px-3 py-2 @error('message') is-invalid @enderror" rows="7" name="message" type="text" placeholder="{{ __('Message') }}">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}

                </div>
                <button type="submit" class="btn fw-lighter px-4 py-2 text-uppercase">{{ __('send us message') }}</button>
            </form>
        </div>
    </section>
    <!-- End Contact Section -->
@endsection
