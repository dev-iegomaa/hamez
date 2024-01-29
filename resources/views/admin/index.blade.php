@extends('admin.layouts.master')

@section('title')
    Dashboard | Index
@endsection

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-activity-three">

                        <div class="widget-heading">
                            <h5 class="">{{ __('Latest Contacts') }}</h5>
                        </div>

                        <div class="widget-content">

                            <div class="mt-container mx-auto">
                                <div class="timeline-line">

                                    @foreach($latest_contacts as $contact)
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>{{ $contact->name }}</h5>
                                                    <span class="">{{ $contact->created_at }}</span>
                                                </div>
                                                <p>{{ $contact->subject }}</p>
                                                <div class="tags">
                                                    <div class="badge badge-success">{{ __('CLIENT') }}</div>
                                                    @switch($contact->status)
                                                        @case('Approved')
                                                            <div class="badge badge-success">{{ __($contact->status) }}</div>
                                                            @break
                                                        @case('Pending')
                                                            <div class="badge badge-primary">{{ __($contact->status) }}</div>
                                                            @break
                                                        @case('Rejected')
                                                            <div class="badge badge-danger">{{ __($contact->status) }}</div>
                                                            @break
                                                        @case('In Progress')
                                                            <div class="badge badge-info">{{ __($contact->status) }}</div>
                                                            @break
                                                    @endswitch
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-five">
                        <div class="widget-content">

                            <div class="header">
                                <div class="header-body">
                                    <h6>{{ __('Contacts') }}</h6>
                                </div>
                                <div class="task-action">
                                    <div class="dropdown  custom-dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                            <a class="dropdown-item" href="{{ route('admin.contact.index') }}">{{ __('View') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-content">
                                <div class="">
                                    <p class="task-left">{{ $contacts->count() }}</p>
                                    <p class="task-completed"><span>{{ $count_of_approved }} {{ __('Approved') }}</span></p>
                                    <p class="text-primary"><span>{{ $count_of_in_progress }} {{ __('In Progress') }}</span></p>
                                    <p class="text-info"><span>{{ $count_of_pending }} {{ __('Pending') }}</span></p>
                                    <p class="task-hight-priority"><span>{{ $count_of_rejected }} {{ __('Rejected') }}</span></p>
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
