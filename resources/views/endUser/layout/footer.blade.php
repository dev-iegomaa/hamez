<!-- Start Footer Section -->
<footer id="footer" class="pt-5">
    <div class="container text-white">
        <div class="row py-5">
            <div class="col-6 col-lg-2 mb-3 mb-lg-0">
                <img
                    src="{{ asset('endUserAssets/images/footer/pattern1.webp') }}"
                    class="img-fluid"
                    alt="footer image"
                />
            </div>
            @isset($setting)
            <div class="col-6 col-lg mb-3 mb-lg-0 text-end text-lg-center">
                <h2 class="text-capitalize display-5 mb-4">{{ __('working hours') }}</h2>
                <ul class="list-unstyled">
                    <li class="fw-lighter text-capitalize">{{ __($setting->opening_from) }} - {{ __($setting->opening_to) }}</li>
                    <li>{{ $setting->time_from }} - {{ $setting->time_to }}</li>
                </ul>
                <img src="{{ asset('endUserAssets/images/qr.jpeg') }}" alt="qr image" class="img-fluid">
            </div>
            @endisset
            <div class="col-6 col-lg mb-3 mb-lg-0">
                <h2 class="text-capitalize display-5 mb-4">{{ __('contact us') }}</h2>
                <ul class="list-unstyled">

                    @isset($setting)
                    <li class="d-flex align-items-center mb-4">
                        <i class="fa-solid fa-location-dot fa-2x"></i>
                        <div class="mx-4">
                            <span class="text-capitalize mb-2 fw-medium">{{ __('location') }}:</span>
                            <p class="text-capitalize mb-0">{{ $setting->getTranslation('location', LaravelLocalization::getCurrentLocale()) }}</p>
                        </div>
                    </li>
                    @endisset

                    @isset($setting)
                    <li class="d-flex align-items-center mb-4">
                        <i class="fa-solid fa-envelope-open-text fa-2x"></i>
                        <div class="mx-3">
                            <span class="text-capitalize mb-2 fw-medium">{{ __('email address') }}:</span>
                            <p class="text-capitalize mb-0">{{ $setting->email }}</p>
                        </div>
                    </li>
                    @endisset

                    @isset($setting)
                    <li class="d-flex align-items-center">
                        <i class="fa-solid fa-phone fa-2x"></i>
                        <div class="mx-3">
                            <span class="text-capitalize mb-2 fw-medium">{{ __('phone number') }}:</span>
                            <p class="text-capitalize mb-0 text-white">{{ $setting->phone }}</p>
                        </div>
                    </li>
                    @endisset
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3 mb-lg-0 text-end align-self-center">
                <a
                    href="{{ route('endUser.book.index') }}"
                    class="btn fw-lighter d-block ms-auto mb-3 text-uppercase px-4 py-2"
                    style="width: fit-content"
                >{{ __('Book Now') }}</a
                >
                <a
                    href="{{ route('endUser.contact.index') }}"
                    class="btn fw-lighter d-block ms-auto text-uppercase px-4 py-2"
                    style="width: fit-content"
                >{{ __('be a partner') }}</a
                >
            </div>
        </div>
        <section id="copy-right" class="py-4">
            <p class="text-capitalize text-center m-0 py-2">
                {{ __('copyright © 2024 hamez. all rights reserved') }}.
            </p>
        </section>
    </div>
    <!-- Start Scroll To Top -->
    <a id="scroll-to-top" class="d-flex justify-content-center align-items-center rounded-circle text-decoration-none"
       href="#header">
        <i class="fa-solid fa-arrow-up"></i>
    </a>
    <!-- End Scroll To Top -->

    <!-- Start Whatsapp Icon -->
    @isset($setting)
    <a id="whatsapp_chat" class="d-flex justify-content-center align-items-center rounded-circle text-decoration-none"
       href="https://wa.me/{{ $setting->whatsapp }}" target="_blank">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    @endisset
    <!-- End Whatsapp Icon -->
</footer>
<!-- End Footer Section -->

<script src="{{ asset('endUserAssets/js/plugins/bootstrap/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('endUserAssets/js/plugins/font-awesome/all.min.js') }}"></script>
<script src="{{ asset('endUserAssets/js/assets/scroll.js') }}"></script>
<script src="{{ asset('endUserAssets/js/pages/index.js') }}"></script>

@include('sweetalert::alert')
@stack('js')
</body>
</html>
