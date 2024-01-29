@extends('admin.layouts.master')

@section('title')
    Slider | {{ (isset($slider)) ? 'Update' : 'Create' }}
@endsection

@push('css')
    @if(LaravelLocalization::getCurrentLocale() == 'en')
        <link href="{{ asset('adminAssets/en/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/en/assets/css/forms/theme-checkbox-radio.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/en/assets/css/forms/switches.css') }}">
        <link href="{{ asset('adminAssets/en/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminAssets/en/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('adminAssets/ar/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/ar/assets/css/forms/theme-checkbox-radio.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/ar/assets/css/forms/switches.css') }}">
        <link href="{{ asset('adminAssets/ar/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminAssets/ar/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
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
                                        <h4>{{ isset($slider) ? __('Update Slider') : __('Create New Slider') }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">

                                <form action="{{ isset($slider) ? route('admin.slider.update') : route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                                    @if(isset($slider))
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $slider->id }}">
                                    @endif
                                    @csrf
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Title English') }}</span>
                                        </div>
                                        <input type="text" style="direction: ltr;" name="title_en" value="{{ old('title_en', isset($slider) ? $slider->getTranslation('title', 'en') : '') }}" class="@error('title_en') is-invalid @enderror form-control">
                                    </div>

                                    @error('title_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-5">
                                        <input type="text" name="title_ar" value="{{ old('title_ar', isset($slider) ? $slider->getTranslation('title', 'ar') : '') }}" style="direction: rtl" class="@error('title_ar') is-invalid @enderror form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">{{ __('Title Arabic') }}</span>
                                        </div>
                                    </div>

                                    @error('title_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div id="fuSingleFile">
                                        <div>
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>{{ __('Slider Image') }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                                    <label>Upload (Single Image) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file" >
                                                        <input type="file" name="image" class="@error('image') is-invalid @enderror custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="btn btn-outline-info">{{ isset($slider) ? __('Update') : __('Create') }}</button>
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
        <script src="{{ asset('adminAssets/en/plugins/blockui/jquery.blockUI.min.js') }}"></script>
        <script src="{{ asset('adminAssets/en/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    @else
        <script src="{{ asset('adminAssets/ar/plugins/highlight/highlight.pack.js') }}"></script>
        <script src="{{ asset('adminAssets/ar/assets/js/scrollspyNav.js') }}"></script>
        <script src="{{ asset('adminAssets/ar/plugins/blockui/jquery.blockUI.min.js') }}"></script>
        <script src="{{ asset('adminAssets/ar/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    @endif
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage')
    </script>
@endpush
