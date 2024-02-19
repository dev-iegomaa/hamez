@extends('endUser.layout.master')

@section('title')
    {{ __('Hamez') }} | {{ __('About') }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/pages/about.css') }}" type="text/css" />
@endpush

@section('content')
    @include('endUser.layout.loading')

    <!-- Start Slider Section -->
    <section id="banner" class="text-center">
        <h1 class="mb-0 text-white display-2 text-capitalize">{{ __('About us') }}</h1>
    </section>
    <!-- End Slider Section -->

    <!-- Start About Us Section -->
    <section id="about" class="py-5">
        <div class="container py-5">
            <div class="row gx-0 justify-content-between">
                <div class="col-md-5 mb-3 mb-md-0">
                    @forelse($faqs as $faq)
                        <h3 class="display-5">{{ $faq->getTranslation('question', LaravelLocalization::getCurrentLocale()) }}</h3>
                        <p class="my-4" style="font-size: 25px;">{{ $faq->getTranslation('answer', LaravelLocalization::getCurrentLocale()) }}</p>
                    @empty

                    @endforelse
                    <div class="text-center">
                        <img src="{{ asset('endUserAssets/images/about/pattern2.png') }}" style="width: 90px;" alt="about pattern image">
                        <a href="#" class="btn d-block text-uppercase fw-lighter px-4 py-2 mt-5 m-auto" style="width: fit-content">{{ __('explore more') }}</a>
                    </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                    <img src="{{ asset('endUserAssets/images/about/about2.webp') }}" class="d-block ms-auto img-fluid" alt="about image"/>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->
@endsection
