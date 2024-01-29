@extends('admin.layouts.master')

@section('title')
    Contact | Update
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
                                        <h4>{{ __('Update Contact') }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">

                                <form action="{{ route('admin.contact.update') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $contact->id }}">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Name') }}</span>
                                        </div>
                                        <input readonly type="text" name="name" value="{{ $contact->name }}" class="@error('name') is-invalid @enderror form-control">
                                    </div>

                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Email') }}</span>
                                        </div>
                                        <input readonly type="text" name="email" value="{{ $contact->email }}" class="@error('email') is-invalid @enderror form-control">
                                    </div>

                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Phone') }}</span>
                                        </div>
                                        <input readonly type="text" name="phone" value="{{ $contact->phone }}" class="@error('phone') is-invalid @enderror form-control">
                                    </div>

                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Subject') }}</span>
                                        </div>
                                        <input readonly type="text" name="subject" value="{{ $contact->subject }}" class="@error('subject') is-invalid @enderror form-control">
                                    </div>

                                    @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ __('Message') }}</span>
                                        </div>
                                        <textarea readonly class="@error('message') is-invalid @enderror form-control" name="message">{{ $contact->message }}</textarea>
                                    </div>

                                    @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group mb-4">
                                        <label>{{ __('Status') }}</label>
                                        <select name="status" class="form-control">
                                            <option value="Approved" {{ $contact->status === 'Approved' ? 'selected' : '' }}>{{ __('Approved')  }}</option>
                                            <option value="Pending" {{ $contact->status === 'Pending' ? 'selected' : '' }}>{{ __('Pending')  }}</option>
                                            <option value="Rejected" {{ $contact->status === 'Rejected' ? 'selected' : '' }}>{{ __('Rejected')  }}</option>
                                            <option value="In Progress" {{ $contact->status === 'In Progress' ? 'selected' : '' }}>{{ __('In Progress')  }}</option>
                                        </select>
                                    </div>

                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <button type="submit" class="btn btn-outline-info">{{ __('Update') }}</button>
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
