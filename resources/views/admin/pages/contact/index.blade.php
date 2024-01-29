@extends('admin.layouts.master')

@section('title')
    Contact | Index
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
                                        <h4>{{ __('Contact Table') }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table class="table mb-4">
                                        <caption>{{ __('List of all contacts') }}</caption>
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Phone') }}</th>
                                            <th>{{ __('Subject') }}</th>
                                            <th>{{ __('Message') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Delete') }}</th>
                                            <th>{{ __('Update') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contacts as $key => $contact)
                                                <tr>
                                                    <td class="text-center">{{ $contact->id }}</td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->phone }}</td>
                                                    <td>{{ $contact->subject }}</td>
                                                    <td>{{ $contact->message }}</td>
                                                    <td>
                                                        @switch($contact->status)
                                                            @case('Approved')
                                                                <span class=" shadow-none badge outline-badge-success">{{ __('Approved') }}</span>
                                                                @break
                                                            @case('Pending')
                                                                <span class="badge outline-badge-warning">{{ __('Pending') }}</span>
                                                                @break
                                                            @case('Rejected')
                                                                <span class="badge outline-badge-danger">{{ __('Rejected') }}</span>
                                                                @break
                                                            @case('In Progress')
                                                                <span class="badge outline-badge-info">{{ __('In Progress') }}</span>
                                                                @break
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.contact.delete', [base64_encode($contact->id)]) }}" data-confirm-delete="true" class="btn btn-outline-danger">{{ __('Delete') }}</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.contact.edit', [base64_encode($contact->id)]) }}" class="btn btn-outline-warning">{{ __('Update') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {!! $contacts->links() !!}
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
