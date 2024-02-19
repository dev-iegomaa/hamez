@extends('admin.layouts.master')

@section('title')
    Book | Index
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
                                        <h4>{{ __('Book Table') }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table class="table mb-4">
                                        <caption>{{ __('List of all books') }}</caption>
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Birth Date') }}</th>
                                            <th>{{ __('Phone') }}</th>
                                            <th>{{ __('Subject') }}</th>
                                            <th>{{ __('Available Time') }}</th>
                                            <th>{{ __('Category') }}</th>
                                            <th>{{ __('Service') }}</th>
                                            <th>{{ __('Place') }}</th>
                                            <th>{{ __('Date') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($books as $key => $book)
                                                <tr>
                                                    <td class="text-center">{{ $book->id }}</td>
                                                    <td>{{ $book->full_name }}</td>
                                                    <td>{{ $book->email }}</td>
                                                    <td>{{ $book->birth_date }}</td>
                                                    <td>{{ $book->phone_number }}</td>
                                                    <td>{{ $book->subject }}</td>
                                                    <td>{{ $book->available_time }}</td>
                                                    <td>{{ $book->category->getTranslation('title', LaravelLocalization::getCurrentLocale()) }}</td>
                                                    <td>{{ $book->service->getTranslation('title', LaravelLocalization::getCurrentLocale()) }}</td>
                                                    <td>{{ $book->place }}</td>
                                                    <td>{{ $book->date }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {!! $books->links() !!}
                                    </div>
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
