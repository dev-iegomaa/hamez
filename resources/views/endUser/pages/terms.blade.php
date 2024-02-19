@extends('endUser.layout.master')

@section('title')
    {{ __('Hamez') }} | {{ __('Services Terms') }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/pages/service.css') }}" type="text/css" />
@endpush

@section('content')
    @include('endUser.layout.loading')

    <!-- Start Slider Section -->
    <section id="banner" class="text-center">
        <h1 class="mb-0 text-white display-2 text-capitalize">{{ __('services terms') }}</h1>
    </section>
    <!-- End Slider Section -->

    <!-- Start Service Section -->
    <section id="service" class="py-5">
        <div class="container py-5">
            <h2 class="text-capitalize fw-lighter display-5 mb-5 text-center">{{ __('The client acknowledges and accepts the following general terms and conditions:') }}</h2>
            <ul style="list-style-type: decimal;">
                @forelse($services_terms as $service_term)
                    <li>{{ $service_term->getTranslation('service', LaravelLocalization::getCurrentLocale()) }}</li>
                @empty

                @endforelse
            </ul>
        </div>
    </section>
    <!-- End Service Section -->
@endsection
