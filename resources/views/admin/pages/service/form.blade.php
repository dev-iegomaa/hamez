@extends('admin.layouts.master')

@section('title')
    Service | {{ (isset($setting)) ? 'Update' : 'Create' }}
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
                                        <h4>{{ isset($setting) ? 'Update' : 'Create New' }} Service</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">

                                <form action="{{ isset($service) ? route('admin.service.update') : route('admin.service.store') }}" method="post">
                                    @if(isset($service))
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $service->id }}">
                                    @endif
                                    @csrf
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Title English</span>
                                        </div>
                                        <input type="text" name="title_en" value="{{ old('title_en', isset($service) ? $service->getTranslation('title', 'en') : '') }}" class="@error('title_en') is-invalid @enderror form-control">
                                    </div>

                                    @error('title_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <input type="text" name="title_ar" value="{{ old('title_ar', isset($service) ? $service->getTranslation('title', 'ar') : '') }}" style="direction: rtl" class="@error('title_ar') is-invalid @enderror form-control">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Title Arabic</span>
                                        </div>
                                    </div>

                                    @error('title_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Description English</span>
                                        </div>
                                        <input type="text" name="description_en" value="{{ old('description_en', isset($service) ? $service->getTranslation('description', 'en') : '') }}" class="@error('description_en') is-invalid @enderror form-control">
                                    </div>

                                    @error('description_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <input type="text" name="description_ar" value="{{ old('description_ar', isset($service) ? $service->getTranslation('description', 'ar') : '') }}" style="direction: rtl" class="@error('description_ar') is-invalid @enderror form-control">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Description Arabic</span>
                                        </div>
                                    </div>

                                    @error('description_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Price English</span>
                                        </div>
                                        <input type="text" name="price_en" value="{{ old('price_en', isset($service) ? $service->getTranslation('price', 'en') : '') }}" class="@error('price_en') is-invalid @enderror form-control">
                                    </div>

                                    @error('price_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <input type="text" name="price_ar" value="{{ old('price_ar', isset($service) ? $service->getTranslation('price', 'ar') : '') }}" style="direction: rtl" class="@error('price_ar') is-invalid @enderror form-control">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Price Arabic</span>
                                        </div>
                                    </div>

                                    @error('price_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->getTranslation('title', 'en') }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @error('opening_to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <button type="submit" class="btn btn-outline-info">{{ isset($service) ? 'Update' : 'Create' }}</button>
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
