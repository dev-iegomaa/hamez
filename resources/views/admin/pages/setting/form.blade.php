@extends('admin.layouts.master')

@section('title')
    Setting | {{ (isset($setting)) ? 'Update' : 'Create' }}
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
                                        <h4>{{ isset($setting) ? 'Update' : 'Create New' }} Setting</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">

                                <form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Title English</span>
                                        </div>
                                        <input type="text" name="title_en" value="{{ old('title_en', isset($setting) ? $setting->getTranslation('title', 'en') : '') }}" class="@error('title_en') is-invalid @enderror form-control">
                                    </div>

                                    @error('title_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <input type="text" name="title_ar" value="{{ old('title_ar', isset($setting) ? $setting->getTranslation('title', 'ar') : '') }}" style="direction: rtl" class="@error('title_ar') is-invalid @enderror form-control">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Title Arabic</span>
                                        </div>
                                    </div>

                                    @error('title_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Email</span>
                                        </div>
                                        <input type="text" name="email" value="{{ old('email', $setting->email ?? '') }}" class="@error('email') is-invalid @enderror form-control">
                                    </div>

                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Phone</span>
                                        </div>
                                        <input type="text" name="phone" value="{{ old('phone', $setting->phone ?? '') }}" class="@error('phone') is-invalid @enderror form-control">
                                    </div>

                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Facebook</span>
                                        </div>
                                        <input type="text" name="facebook" value="{{ old('facebook', $setting->facebook ?? '') }}" class="@error('facebook') is-invalid @enderror form-control">
                                    </div>

                                    @error('facebook')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Whatsapp</span>
                                        </div>
                                        <input type="text" name="whatsapp" value="{{ old('whatsapp', $setting->whatsapp ?? '') }}" class="@error('whatsapp') is-invalid @enderror form-control">
                                    </div>

                                    @error('whatsapp')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Instagram</span>
                                        </div>
                                        <input type="text" name="instagram" value="{{ old('instagram', $setting->instagram ?? '') }}" class="@error('instagram') is-invalid @enderror form-control">
                                    </div>

                                    @error('instagram')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Tiktok</span>
                                        </div>
                                        <input type="text" name="tiktok" value="{{ old('tiktok', $setting->tiktok ?? '') }}" class="@error('tiktok') is-invalid @enderror form-control">
                                    </div>

                                    @error('tiktok')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Snapchat</span>
                                        </div>
                                        <input type="text" name="snapchat" value="{{ old('snapchat', $setting->snapchat ?? '') }}" class="@error('snapchat') is-invalid @enderror form-control">
                                    </div>

                                    @error('snapchat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Location English</span>
                                        </div>
                                        <input type="text" name="location_en" value="{{ old('location_en', isset($setting) ? $setting->getTranslation('location', 'en') : '') }}" class="@error('location_en') is-invalid @enderror form-control">
                                    </div>

                                    @error('location_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <input type="text" name="location_ar" value="{{ old('location_ar', isset($setting) ? $setting->getTranslation('location', 'ar') : '') }}" style="direction: rtl" class="@error('location_ar') is-invalid @enderror form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Location Arabic</span>
                                        </div>
                                    </div>

                                    @error('location_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Opening From</label>
                                        <select name="opening_from" class="form-control">
                                            <option value="saturday">Saturday</option>
                                            <option value="sunday">Sunday</option>
                                            <option value="monday">Monday</option>
                                            <option value="tuesday">Tuesday</option>
                                            <option value="wednesday">Wednesday</option>
                                            <option value="thursday">Thursday</option>
                                            <option value="friday">Friday</option>
                                        </select>
                                    </div>

                                    @error('opening_from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>Opening To</label>
                                        <select name="opening_to" class="form-control">
                                            <option value="saturday">Saturday</option>
                                            <option value="sunday">Sunday</option>
                                            <option value="monday">Monday</option>
                                            <option value="tuesday">Tuesday</option>
                                            <option value="wednesday">Wednesday</option>
                                            <option value="thursday">Thursday</option>
                                            <option value="friday">Friday</option>
                                        </select>
                                    </div>

                                    @error('opening_to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Time From</span>
                                        </div>
                                        <input type="time" name="time_from" value="{{ old('time_from', $setting->time_from ?? '') }}" class="@error('time_from') is-invalid @enderror form-control">
                                    </div>

                                    @error('time_from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Time To</span>
                                        </div>
                                        <input type="time" name="time_to" value="{{ old('time_to', $setting->time_to ?? '') }}" class="@error('time_to') is-invalid @enderror form-control">
                                    </div>

                                    @error('time_to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div id="fuSingleFile">
                                        <div>
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Logo</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                                    <label>Upload (Single Image) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file" >
                                                        <input type="file" name="logo" class="@error('logo') is-invalid @enderror custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @error('logo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="btn btn-outline-info">{{ isset($setting) ? 'Update' : 'Create' }}</button>
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
