@extends('admin.layouts.master')

@section('title')
    Category | {{ (isset($slider)) ? 'Update' : 'Create' }}
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
                                        <h4>{{ isset($category) ? __('Update Category') : __('Create New Category') }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">

                                <form action="{{ isset($category) ? route('admin.category.update') : route('admin.category.store') }}" method="post">
                                    @if(isset($category))
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $category->id }}">
                                    @endif
                                    @csrf
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Title English') }}</span>
                                        </div>
                                        <input type="text" name="title_en" style="direction: ltr;" value="{{ old('title_en', isset($category) ? $category->getTranslation('title', 'en') : '') }}" class="@error('title_en') is-invalid @enderror form-control">
                                    </div>

                                    @error('title_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <input type="text" name="title_ar" value="{{ old('title_ar', isset($category) ? $category->getTranslation('title', 'ar') : '') }}" style="direction: rtl" class="@error('title_ar') is-invalid @enderror form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">{{ __('Title Arabic') }}</span>
                                        </div>
                                    </div>

                                    @error('title_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <button type="submit" class="btn btn-outline-info">{{ isset($category) ? __('Update') : __('Create') }}</button>
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
