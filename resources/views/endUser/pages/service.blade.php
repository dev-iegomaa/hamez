@extends('endUser.layout.master')

@section('title')
    {{ __('Hamez') }} | {{ __('Service') }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/pages/service.css') }}" type="text/css" />
@endpush

@section('content')
    @include('endUser.layout.loading')

    <!-- Start Slider Section -->
    <section id="banner" class="text-center">
        <h1 class="mb-0 text-white display-2 text-capitalize">{{ __('our services') }}</h1>
    </section>
    <!-- End Slider Section -->

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
