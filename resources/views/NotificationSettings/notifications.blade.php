
@extends('layouts.master')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper portal supplier-register">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BAR -->


        @include('partials.page_breadcrumb')

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <!-- FORM -->
            <div class="wrap-ccf-form">

                <!-- s-FORM HEADING -->
                @if($errors == 0)

                <form action="{{route('add_supplier_notifications')}}" class="form-horizontal" id="admin_supplier_notification_update" method="POST">

                        {{-- s- FORM FILEDS --}}
                        <div class="portlet light">
                            <!-- BEGIN FORM-->
                            <div class="wrap-ccf-page-title">
                                <h1 class="ccf-page-title">Notifications</h1>
                                <p>Select services and locations for which you wish to receive notifications of matching job requests</p>
                            </div>
                                        @include('components.component-notification', ['service_list' => $service_list, 'job_types' => $job_types, 'location_list' => $location_list, 'notifications' => $notifications ])

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12 clearfix center-align">
                                        {{ csrf_field() }}
                                            <button type="submit" class="btn theme-btn">
                                                @if($notifications->isEmpty())
                                                Add
                                                @else
                                                Update
                                                @endif
                                            </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>

                @else

                    <div class="portlet-body form">
                        <div class="form-body col-md-6 form-fileds-center">
                            <div class="alert alert-info">
                                <p> <strong><i class="fa fa-info" aria-hidden="true"></i></strong> Please complete  services and locations to continue.</p>
                            </div>
                        </div>
                    </div>
                 @endif
            </div>
        </div>
    </div>

@endsection

