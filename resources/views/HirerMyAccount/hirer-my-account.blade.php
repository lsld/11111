@extends('layouts.master')

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper portal supplier-portal-job-request">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BAR -->
            @include('partials.page_breadcrumb')
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="wrap-ccf-form">
                <div class="portlet light bordered">

                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </p>
                            @endif
                        @endforeach
                    </div>


                    <!-- BEGIN PAGE TITLE-->
                    <div class="wrap-ccf-page-title">
                        <h1 class="ccf-page-title">My Account</h1>
                        <p>View all of your account details</p>
                    </div>
                    <!-- END PAGE TITLE-->
                    <div class="portlet-body form">


                        <div class="form-body row">

                                <div class="table-scrollable">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Company Name</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>{{$userSettings->first_name}}</td>
                                                <td>{{$userSettings->last_name}}</td>
                                                <td>{{$companySettings->name}}</td>
                                                <td>{{$userSettings->username}}</td>
                                                <td>{{$userSettings->email}}</td>
                                                <td>{{$userSettings->phone}}</td>
                                                <td><a onclick="return modalFormEdit('editFormContent', '{{route('view_edit_hirer_my_account')}}');" data-toggle="modal" href="#hirer_my_account_edit"  title="Edit">Edit</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hirer_my_account_edit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true"></button>
                    <h4 class="modal-title">Edit My Account</h4>
                </div>
                <form role="form" {{--onsubmit="return modalSave('{{route('edit_hirer_my_account')}}');"--}} onsubmit="return modalMyAccountFormValidationAndSave('my_account_edit', '{{route('edit_hirer_my_account')}}');" action="{{route('edit_hirer_my_account') }}" name="my_account_edit" id=my_account_edit" method="POST" class="form-horizontal">
                    <div class="modal-body">
                        {{--s- FORM FIELD--}}
                            <div id="editFormContent">
                            </div>
                    </div>

                    <div class="modal-footer">
                        <span id="" class="help-block has-error" style="display: none; "></span>
                        <span id="my_account_edit_validation_message_area" class="help-block has-error" style="display: none; "></span>
                        <button type="button" id="cancel" class="btn dark btn-outline" data-dismiss="modal">Close
                        </button>
                        <button type="submit"   class="btn theme-btn">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection