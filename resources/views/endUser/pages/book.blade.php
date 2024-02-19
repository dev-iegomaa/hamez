@extends('endUser.layout.master')

@section('title')
    {{ __('Hamez') }} | {{ __('Book') }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('endUserAssets/css/pages/book.css') }}" type="text/css" />
@endpush

@section('content')
    @include('endUser.layout.loading')

    <!-- Start Slider Section -->
    <section id="banner" class="text-center">
        <h1 class="mb-0 text-white display-2 text-capitalize">{{ __('book now') }}</h1>
    </section>
    <!-- End Slider Section -->

    <!-- Start Contact Section -->
    <section id="contact" class="pb-5 text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-9 col-md-7
                col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                    <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                        <form id="form" action="{{ route('endUser.book.store') }}" method="post">
                            @csrf
                            <ul id="progressbar" class="text-capitalize d-flex">
                                <li class="active" id="step1">
                                    <strong>{{ __('basic info') }}</strong>
                                </li>
                                <li id="step2"><strong>{{ __('massage type') }}</strong></li>
                                <li id="step3"><strong>{{ __('available times') }}</strong></li>
                                <li id="step4"><strong>{{ __('Personal data') }}</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div> <br>
                            <fieldset class="px-5 py-4">
                                <h2 class="text-capitalize">{{ __('basic info') }}:</h2>
                                <div class="input-group flex-nowrap my-3 @error('date') is-invalid @enderror">
                                    <span class="input-group-text text-capitalize" id="addon-wrapping">{{ __('date') }}</span>
                                    <input type="date" value="{{ old('date') }}" name="date" class="form-control">
                                </div>
                                @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="input-group flex-nowrap my-3 @error('place') is-invalid @enderror">
                                    <span class="input-group-text text-capitalize" id="addon-wrapping">{{ __('place') }}</span>
                                    <select class="form-select" name="place" aria-label="Default select example">
                                        <option selected></option>
                                        <option value="حي النزهة" @if(old('place') === "حي النزهة") selected @endif>حي النزهة</option>
                                        <option value="حي الربوة" @if(old('place') === "حي الربوة") selected @endif>حي الربوة</option>
                                        <option value="حي الشاظئ" @if(old('place') === "حي الشاظئ") selected @endif>حي الشاظئ</option>
                                        <option value="حي المرؤه" @if(old('place') === "حي المرؤه") selected @endif>حي المرؤه</option>
                                        <option value="حي المرجان" @if(old('place') === "حي المرجان") selected @endif>حي المرجان</option>
                                        <option value="حي البحيرات" @if(old('place') === "حي البحيرات") selected @endif>حي البحيرات</option>
                                    </select>
                                </div>

                                @error('place')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="button" name="next-step"
                                       class="next-step btn d-block ms-auto" value="{{ __('Next') }}" />
                            </fieldset>
                            <fieldset class="px-5 py-4">
                                <h2 class="text-capitalize">{{ __('massage type') }}:</h2>
                                <div class="input-group flex-nowrap my-3 @error('category_id') is-invalid @enderror">
                                    <span class="input-group-text text-capitalize" id="addon-wrapping">{{ __('category') }}</span>
                                    <select class="form-select" name="category_id" id="category-select" aria-label="Default select example">
                                        <option selected></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->getTranslation('title', LaravelLocalization::getCurrentLocale()) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="input-group flex-nowrap mb-3 @error('service_id') is-invalid @enderror">
                                    <span class="input-group-text text-capitalize" id="addon-wrapping">{{ __('service') }}</span>
                                    <select class="form-select" name="service_id" id="service-select" aria-label="Default select example" disabled>
                                        <option selected></option>
                                    </select>
                                </div>
                                @error('service_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <input type="button" name="previous-step"
                                       class="previous-step btn btn-secondary"
                                       value="{{ __('Previous') }}" />
                                <input type="button" name="next-step"
                                       class="next-step btn" value="{{ __('Next') }}" />
                            </fieldset>
                            <fieldset class="px-5 py-4">
                                <h2 class="text-capitalize">{{ __('available times') }}:</h2>
                                <ul id="available_times" class="list-unstyled mb-2 mt-3 @error('available_time') is-invalid @enderror">
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="05:30 PM">05:30 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="05:45 PM">05:45 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="06:00 PM">06:00 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="06:15 PM">06:15 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="06:30 PM">06:30 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="06:45 PM">06:45 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="07:00 PM">07:00 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="07:15 PM">07:15 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="07:30 PM">07:30 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="07:45 PM">07:45 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="08:00 PM">08:00 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="08:15 PM">08:15 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="08:30 PM">08:30 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="08:45 PM">08:45 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="09:00 PM">09:00 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="09:15 PM">09:15 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="09:30 PM">09:30 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="09:45 PM">09:45 PM</li>
                                    <li class="btn btn-outline-secondary mb-2 opacity-50" data-time="10:00 PM">10:00 PM</li>
                                </ul>
                                @error('available_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <input type="hidden" name="available_time" value="">
                                <input type="button" name="previous-step"
                                       class="previous-step btn btn-secondary"
                                       value="{{ __('Previous') }}" />
                                <input type="button" name="next-step"
                                       class="next-step btn" value="{{ __('Next') }}" />
                            </fieldset>
                            <fieldset class="px-5 py-4">
                                <div class="finish">
                                    <h2 class="text-capitalize mb-3">{{ __('Personal data') }}:</h2>
                                    <p>{{ __('Please enter your information so we can confirm your reservation and contact you if we have any questions') }}</p>
                                </div>
                                <div class="row g-3">
                                    <div class="col-12 col-lg-6">
                                        <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" placeholder="{{ __('Full Name') }}">
                                    </div>
                                    @error('full_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="col-12 col-lg-6">
                                        <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="{{ __('Phone Number') }}">
                                    </div>
                                    @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="col-12">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="col-12">
                                        <label>{{ __('Birth Date') }}</label>
                                        <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror">
                                    </div>
                                    @error('birth_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <p class="mb-0">{{ __('Do you have any medical condition or chronic disease?') }}</p>

                                    <div class="col-12">
                                        <div class="input-group mb-3 @error('subject') is-invalid @enderror">
                                            <span class="input-group-text text-capitalize">{{ __('subject') }}</span>
                                            <textarea class="form-control" style="resize: none;" name="subject" rows="3" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>
                                    @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <p>{{ __('We may need to speak to you by telephone if we have any questions regarding your booking request and preferences') }}</p>

                                    <p class="m-0">{{ __('I confirm that I meet the current coronavirus requirements for this booking.') }}</p>

                                    <a href="{{ route('endUser.services.terms') }}">{{ __('I agree to the terms and conditions of Hamza') }}</a>

                                    <div class="mb-3">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                    </div>

                                </div>
                                <input type="button" name="previous-step"
                                       class="previous-step btn btn-secondary"
                                       value="{{ __('Previous') }}" />
                                <input type="submit" class="btn btn-primary" value="{{ __('Send') }}" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
@endsection

@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="{{ asset('endUserAssets/js/pages/book.js') }}"></script>
    <script>
        const list = document.querySelectorAll('#available_times > li');
        const available_time_input = document.querySelector('input[name="available_time"]');
        list.forEach(function (item) {
            item.addEventListener('click', function () {
                list.forEach(function (item) {
                    item.classList.remove('active_time');
                });

                console.log(item.getAttribute('data-time'));
                item.classList.add('active_time');
                available_time_input.value = item.getAttribute('data-time');

            });
        });


        $(document).ready(function(){
            $('#category-select').change(function(){
                var categoryId = $(this).val();
                $('#service-select').prop('disabled', false);
                console.log(categoryId);
                $.ajax({
                    url: "{{ route('endUser.book.services', ['id' => ':categoryId']) }}".replace(':categoryId', categoryId),
                    type: 'GET',
                    success: function(data){
                        $('#service-select').empty();
                        $('#service-select').append('<option></option>');
                        $.each(data, function(index, service){
                            $('#service-select').append('<option value="' + service.id + '">' + service.title.<?= LaravelLocalization::getCurrentLocale() ?>  + '</option>');
                        });
                    }
                });
            });
        });

    </script>
@endpush
