@extends('admin.layouts.master')

@section('title')
    User | Index
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
        <div class="container">
            <div class="container">

                <div class="row layout-top-spacing">

                    <div id="tableCaption" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>User Table</h4>
                                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Create New User</a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table class="table mb-4">
                                        <caption>List of all users</caption>
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>{{ __('Delete') }}</th>
                                            <th>{{ __('Update') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $key => $user)
                                                <tr>
                                                    <td class="text-center">{{ ++$key }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.user.delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                                            <input type="submit" class="btn btn-outline-danger" value="{{ __('Delete') }}">
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.user.edit', [base64_encode($user->id)]) }}" class="btn btn-outline-warning">{{ __('Update') }}</a>
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
