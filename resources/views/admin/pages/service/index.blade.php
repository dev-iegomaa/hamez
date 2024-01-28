@extends('admin.layouts.master')

@section('title')
    Service | Index
@endsection

@push('css')
    @if(LaravelLocalization::getCurrentLocale() == 'en')
        <link href="{{ asset('adminAssets/en/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/en/assets/css/forms/theme-checkbox-radio.css') }}">
        <link href="{{ asset('adminAssets/en/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('adminAssets/ar/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/ar/assets/css/forms/theme-checkbox-radio.css') }}">
        <link href="{{ asset('adminAssets/ar/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
    @endif
@endpush

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container-fluid">
            <div class="container-fluid">

                <div class="row layout-top-spacing">

                    <div id="tableCaption" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Service Table</h4>
                                        <a href="{{ route('admin.service.create') }}" class="btn btn-primary">Create New Service</a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table class="table mb-4">
                                        <caption>List of all services</caption>
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Title English</th>
                                            <th>Title Arabic</th>
                                            <th>Description English</th>
                                            <th>Description Arabic</th>
                                            <th>Price English</th>
                                            <th>Price Arabic</th>
                                            <th>Category English</th>
                                            <th>Category Arabic</th>
                                            <th>{{ __('Delete') }}</th>
                                            <th>{{ __('Update') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($services as $key => $service)
                                                <tr>
                                                    <td class="text-center">{{ ++$key }}</td>
                                                    <td>{{ $service->getTranslation('title', 'en') }}</td>
                                                    <td>{{ $service->getTranslation('title', 'ar') }}</td>
                                                    <td>{{ $service->getTranslation('description', 'en') }}</td>
                                                    <td>{{ $service->getTranslation('description', 'ar') }}</td>
                                                    <td>{{ $service->getTranslation('price', 'en') }}</td>
                                                    <td>{{ $service->getTranslation('price', 'ar') }}</td>
                                                    <td>{{ $service->category->getTranslation('title', 'en') }}</td>
                                                    <td>{{ $service->category->getTranslation('title', 'ar') }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.service.delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $service->id }}">
                                                            <input type="submit" class="btn btn-outline-danger" value="{{ __('Delete') }}">
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.service.edit', [base64_encode($service->id)]) }}" class="btn btn-outline-warning">{{ __('Update') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
        <script>
            checkall('todoAll', 'todochkbox');
            $('[data-toggle="tooltip"]').tooltip()
        </script>
    @else
            <script src="{{ asset('adminAssets/ar/plugins/highlight/highlight.pack.js') }}"></script>
            <script src="{{ asset('adminAssets/ar/assets/js/scrollspyNav.js') }}"></script>
            <script>
                checkall('todoAll', 'todochkbox');
                $('[data-toggle="tooltip"]').tooltip()
            </script>
    @endif
@endpush
