@extends('endUser.layout.master')

@section('title')
    {{ __('Hamez') }} | {{ __('Home') }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/pages/category.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/pages/about.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/pages/service.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/pages/index.css') }}" type="text/css" />
@endpush

@section('content')
    @include('endUser.layout.loading')

    <!-- Start Slider Section -->
    <section id="slider" class="position-relative text-dark">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                @forelse($sliders as $key => $slider)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" aria-label="Slide {{ ++$key }}"></button>
                @empty

                @endforelse
            </div>
            <div class="carousel-inner">

                @forelse($sliders as $slider)
                    <div class="carousel-item position-relative">
                        <img src="{{ asset($slider->image) }}" class="w-100 h-100 object-fit-cover" alt="slider image">
                        <div class="overlay position-absolute top-0 w-100"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="display-2">{{ $slider->getTranslation('title', LaravelLocalization::getCurrentLocale()) }}</h5>
                        </div>
                    </div>
                @empty

                @endforelse

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true">
                    <i class="fa-solid fa-chevron-left"></i>
                </span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true">
                    <i class="fa-solid fa-chevron-right"></i>
                </span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- End Slider Section -->

    <!-- Start About Us Section -->
    <section id="about" class="py-5">
        <div class="container py-5">
            <div class="row gx-0 justify-content-between">
                <div class="col-md-5 mb-3 mb-md-0">
                    <h2 class="display-5 fw-medium text-uppercase">{{ __('About us') }}</h2>
                    @isset($about)
                        <h3 class="display-5">{{ $about->getTranslation('question', LaravelLocalization::getCurrentLocale()) }}</h3>
                        <p class="my-4" style="font-size: 25px;">
                            {{ $about->getTranslation('answer', LaravelLocalization::getCurrentLocale()) }}
                        </p>
                    @endisset
                    <div class="text-center">
                        <img src="{{ asset('endUserAssets/images/about/pattern2.png') }}" style="width: 90px;" alt="about pattern image">
                        <a href="{{ route('endUser.about') }}" class="btn d-block text-uppercase fw-lighter px-4 py-2 mt-5 m-auto" style="width: fit-content">{{ __('explore more') }}</a>
                    </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                    <img src="{{ asset('endUserAssets/images/about/about2.webp') }}" class="d-block ms-auto img-fluid" alt="about image"/>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->

    <!-- Start Category Section -->
    <section id="category" class="py-5">
        <div class="container py-5">
            <div class="row text-center">

                @forelse($categories as $category)
                    <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                        <figure class="position-relative">
                            <img src="{{ $category->image }}" class="w-100 h-100 object-fit-cover" alt="dr massage image"/>
                            <figcaption class="position-absolute d-flex flex-wrap top-0 text-white z-1">
                                <p class="w-100 align-self-end mb-0"><i class="{{ $category->icon }} fa-4x"></i></p>
                                <p class="w-100 text-capitalize fw-lighter" style="font-size: 2.2rem;">{{ $category->getTranslation('title', LaravelLocalization::getCurrentLocale()) }}</p>
                            </figcaption>
                            <div class="overlay position-absolute top-0 w-100"></div>
                        </figure>
                    </div>
                @empty

                @endforelse

            </div>
        </div>
    </section>
    <!-- End Category Section -->

    <!-- Start Service Section -->
    <section id="service" class="py-5">
        <div class="container py-5 text-center">
            <h2 class="text-capitalize fw-lighter display-5 mb-5">{{ __('our popular services') }}</h2>
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                @forelse($categories as $category)
                <li class="nav-item mx-1" role="presentation">
                    <button class="nav-link text-white text-capitalize" id="pills-{{ strtok($category->getTranslation('title', 'en'), ' ') }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ strtok($category->getTranslation('title', 'en'), ' ') }}" type="button" role="tab" aria-controls="pills-{{ strtok($category->getTranslation('title', 'en'), ' ') }}">{{ $category->getTranslation('title', LaravelLocalization::getCurrentLocale()) }}</button>
                </li>
                @empty

                @endforelse
            </ul>
            <div class="tab-content text-white mt-5 text-start" id="pills-tabContent">
                @forelse($categories as $category)
                    <div class="tab-pane fade p-5" id="pills-{{ strtok($category->getTranslation('title', 'en'), ' ') }}" role="tabpanel" aria-labelledby="pills-{{ strtok($category->getTranslation('title', 'en'), ' ') }}-tab" tabindex="0">
                    <article class="row p-3">
                        @forelse($category->services as $service)
                            <div class="col-md-6 mb-4">
                                <h3 class="text-capitalize fw-normal">{{ $service->getTranslation('title', LaravelLocalization::getCurrentLocale()) }}</h3>
                                <p>{{ $service->getTranslation('description', LaravelLocalization::getCurrentLocale()) }}</p>
                                <p class="text-uppercase">{{ __('sar') }} {{ $service->getTranslation('price', LaravelLocalization::getCurrentLocale()) }} <span class="text-capitalize">({{ __('includes tax & transportation') }})</span></p>
                                <a href="{{ route('endUser.book.index') }}" class="btn px-4 py-2 text-uppercase">{{ __('appointment booking') }}</a>
                            </div>
                        @empty

                        @endforelse
                    </article>
                </div>
                @empty

                @endforelse
            </div>
            <a href="{{ route('endUser.service') }}" class="btn px-4 py-2 text-uppercase mt-5">{{ __('explore more') }}</a>
        </div>
    </section>
    <!-- End Service Section -->
@endsection

@push('js')
    <script>
        const div = document.querySelector('.carousel-item.position-relative:first-of-type');
        const btn = document.querySelector('div.carousel-indicators > button:first-of-type');
        const navigationBtn  = document.querySelector('#pills-tab li:first-child > button');
        const tab_pane = document.querySelector('.tab-pane.fade:first-of-type');

        navigationBtn.classList.add('active');
        tab_pane.classList.add('show');
        tab_pane.classList.add('active');
        div.classList.add('active');
        btn.classList.add('active');
        btn.style.setAttribute('aria-current', 'true');
        navigationBtn.style.setAttribute('aria-current', 'true');
    </script>
@endpush
