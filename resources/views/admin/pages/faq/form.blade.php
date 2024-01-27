@extends('admin.layouts.master')

@section('title')
    Faq | {{ (isset($user)) ? 'Update' : 'Create' }}
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
                                        <h4>{{ isset($faq) ? 'Update' : 'Create New' }} Faq</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">

                                <form action="{{ isset($faq) ? route('admin.faq.update') : route('admin.faq.store') }}" method="post" enctype="multipart/form-data">
                                    @if(isset($faq))
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $faq->id }}">
                                    @endif
                                    @csrf
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Question English') }}</span>
                                        </div>
                                        <textarea class="form-control" name="question_en">{{ old('question_en', isset($faq) ? $faq->getTranslation('question', 'en') : '') }}</textarea>
                                    </div>

                                    @error('question_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <textarea style="direction: rtl" class="form-control" name="question_ar">{{ old('question_ar', isset($faq) ? $faq->getTranslation('question', 'ar') : '') }}</textarea>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Question Arabic') }}</span>
                                        </div>
                                    </div>

                                    @error('question_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Answer English') }}</span>
                                        </div>
                                        <textarea class="form-control" name="answer_en">{{ old('answer_en', isset($faq) ? $faq->getTranslation('answer', 'en') : '') }}</textarea>
                                    </div>

                                    @error('answer_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <textarea style="direction: rtl" class="form-control" name="answer_ar">{{ old('answer_ar', isset($faq) ? $faq->getTranslation('answer', 'ar') : '') }}</textarea>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Answer Arabic') }}</span>
                                        </div>
                                    </div>

                                    @error('answer_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <button type="submit" class="btn btn-outline-info">{{ isset($faq) ? 'Update' : 'Create' }}</button>
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
