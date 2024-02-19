@extends('admin.layouts.master')

@section('title')
    Services Terms | {{ (isset($user)) ? 'Update' : 'Create' }}
@endsection

@push('css')
    @if(LaravelLocalization::getCurrentLocale() == 'en')
        <link href="{{ asset('adminAssets/en/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/en/assets/css/forms/theme-checkbox-radio.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/en/assets/css/forms/switches.css') }}">
    @else
        <link href="{{ asset('adminAssets/ar/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/ar/assets/css/forms/theme-checkbox-radio.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/ar/assets/css/forms/switches.css') }}">
    @endif
@endpush

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">

            <div class="container">

                <div class="row layout-top-spacing">

                    <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>{{ isset($service_term) ? __('Update Services Term') : __('Create New Services Term') }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">

                                <form action="{{ isset($service_term) ? route('admin.services.terms.update') : route('admin.services.terms.store') }}" method="post">
                                    @if(isset($service_term))
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $service_term->id }}">
                                    @endif
                                    @csrf
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Services Term English') }}</span>
                                        </div>
                                        <textarea class="form-control" style="direction: ltr;" name="service_en">{{ old('service_en', isset($service_term) ? $service_term->getTranslation('service', 'en') : '') }}</textarea>
                                    </div>

                                    @error('service_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <textarea style="direction: rtl" class="form-control" name="service_ar">{{ old('service_ar', isset($service_term) ? $service_term->getTranslation('service', 'ar') : '') }}</textarea>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Services Term Arabic') }}</span>
                                        </div>
                                    </div>

                                    @error('service_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <button type="submit" class="btn btn-outline-info">{{ isset($service_term) ? __('Update') : __('Create') }}</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection

@push('js')
    @if(LaravelLocalization::getCurrentLocale() == 'en')
        <script src="{{ asset('adminAssets/en/plugins/highlight/highlight.pack.js') }}"></script>
        <script src="{{ asset('adminAssets/en/assets/js/scrollspyNav.js') }}"></script>
    @else
        <script src="{{ asset('adminAssets/ar/plugins/highlight/highlight.pack.js') }}"></script>
        <script src="{{ asset('adminAssets/ar/assets/js/scrollspyNav.js') }}"></script>
    @endif
@endpush
