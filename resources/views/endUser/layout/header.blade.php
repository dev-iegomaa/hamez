<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <meta name="description"
          content="هــمّـز لخدمات التدليك المنزلي، نقدم لكم خدمات التدليك الإسترخائي والعلاجي، بيد خبيرات وبأسعار غير مسبوقة، سارعي بحجز موعدك الآن .">
    <meta name="keywords"
          content="همّز, همز, مساج, تقليدي, مساج تقليدي, راحة, هندسة الاسترخاء, تقنيات التدليك, العلاج التقليدي, العافية الشاملة, تخفيف التوتر, العناية بالجسم, علاج السبا">
    <meta name="author" content="AmmaR">

    <link rel="icon" href="https://hamez.sa/assets/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/plugins/font-awesome/all.min.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/plugins/bootstrap/bootstrap.min.css') }}" type="text/css"/>

    <link rel="stylesheet" href="{{ asset('endUserAssets/css/assets/master.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/assets/header.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/assets/navigation.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/assets/banner.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/assets/footer.css') }}" type="text/css"/>

    <style>
        @if(LaravelLocalization::getCurrentLocale() == 'ar')
        @font-face {
            font-family: "Kahaza-Bold";
            src: url("{{ asset('endUserAssets/fonts/Kahaza-Bold.otf') }}");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Kahaza-Regular";
            src: url("{{ asset('endUserAssets/fonts/Kahaza-Regular.otf') }}");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Harir-light";
            src: url("{{ asset('endUserAssets/fonts/Harir_complete_OTF_Harir.otf') }}");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Harir-Bold";
            src: url("{{ asset('endUserAssets/fonts/Harir_complete_OTF_Harir_Bold.otf') }}");
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: Harir-light;
        }
        @endif

        body {
            direction: @if(LaravelLocalization::getCurrentLocale() == 'ar') rtl @endif;
        }
    </style>
    @stack('css')
</head>
<body>
<!-- Start Header Section -->
<header id="header" class="py-2">
    <div class="container">
        <div class="row">
            <div
                class="col-lg-4 col-md-6 col-sm-12 mb-3 mb-md-0 order-1 d-flex align-items-center justify-content-center justify-content-md-start"
            >
                <i class="fa-regular fa-clock"></i>
                <p class="text-uppercase mb-0 mx-2">{{ __('opening hours') }}:</p>
                <p class="mb-0">
                    @isset($setting)
                        {{ $setting->time_from }} - {{ $setting->time_to }}
                    @endisset
                </p>
            </div>
            <div
                class="col-lg-4 col-sm-12 mb-3 mb-md-0 order-3 order-lg-2 text-center"
            >
                @isset($setting)
                    <a href="{{ $setting->tiktok }}" class="text-decoration-none" style="color: transparent;">
                        <i class="fa-brands fa-tiktok tiktok mx-2"></i>
                    </a>
                    <a href="{{ $setting->facebook }}" class="text-decoration-none" style="color: transparent;">
                        <i class="fa-brands fa-facebook-f facebook mx-2"></i>
                    </a>
                    <a href="{{ $setting->instagram }}" class="text-decoration-none" style="color: transparent;">
                        <i class="fa-brands fa-instagram instagram mx-2"></i>
                    </a>
                    <a href="{{ $setting->snapchat }}" class="text-decoration-none" style="color: transparent;">
                        <i class="fa-brands fa-snapchat snapchat mx-2"></i>
                    </a>
                @endisset
            </div>
            <div
                class="col-lg-4 col-md-6 col-sm-12 mb-3 mb-md-0 order-2 order-lg-3 d-flex align-items-center justify-content-center justify-content-md-end text-uppercase"
            >
                <i class="fa-solid fa-location-dot"></i>
                <p class="mb-0 mx-2">{{ __('location') }}:</p>
                <p class="mb-0">
                    @isset($setting)
                        {{ $setting->getTranslation('location', LaravelLocalization::getCurrentLocale()) }}
                    @endisset
                </p>
            </div>
        </div>
    </div>
</header>
<!-- End Header Section -->

<!-- Start Navigation Bar Section -->
<nav class="navbar navbar-expand-lg py-3 z-3" style="position: sticky; top: -1px;" id="navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ route('endUser.index') }}">
            <img src="{{ $setting->logo }}" style="width: 180px; height: 40px; object-fit: cover;" alt="hamez logo"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav @if(LaravelLocalization::getCurrentLocale() == 'ar') me-auto @else ms-auto @endif text-uppercase mt-3 mt-lg-0">
                <li class="nav-item">
                    <a href="{{ route('endUser.book.index') }}" class="btn d-block fw-lighter text-dark mx-3 text-uppercase px-4 py-2" style="width: fit-content">{{ __('Book Now') }}</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link active" aria-current="page" href="{{ route('endUser.index') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('endUser.about') }}">{{ __('About') }}</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('endUser.service') }}">{{ __('Services') }}</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('endUser.contact.index') }}">{{ __('Contact') }}</a>
                </li>
                <li class="nav-item mx-3">
                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                        <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
                    @else
                        <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">العربية</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navigation Bar Section -->
