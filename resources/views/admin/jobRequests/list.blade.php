@extends('layouts.master-admin')

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper portal supplier-portal-company-profile">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BAR -->

        @include('partials.page_breadcrumb')

        <!-- END PAGE HEADER-->
            <div class="wrap-ccf-form">
                <div class="portlet light bordered">
                    <!-- BEGIN PAGE TITLE-->
                    <div class="wrap-ccf-page-title">
                        <h1 class="ccf-page-title clearfix">Manage Job Requests

                        </h1>
                        <p>View and manage job requests</p>
                    </div>
                    <!-- END PAGE TITLE-->
                    <div class="portlet-body form">
                        <form role="form" method="GET" action="{{ route('admin.jobRequest.list') }}" name="search">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="job_type" id="job_type" class="form-control">
                                                <option value="">Job Type</option>
                                                @foreach( $jobType as $jobTypes)

                                                    <option value="{{ $jobTypes->id }}" @if(isset($_REQUEST['job_type'])?$_REQUEST['job_type'] == $jobTypes->id:""){{'selected'}} @endif>{{ $jobTypes->name }}</option>

                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <select name="states" id="states" class="form-control">
                                                <option value="">State</option>
                                                @foreach( $states as $state)

                                                    <option value="{{ $state->id }}" @if(isset($_REQUEST['states'])?$_REQUEST['states'] == $state->id:""){{'selected'}} @endif>{{ $state->name }}</option>

                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <input class="form-control form-control-inline date-picker"    name="expiry_date" id="expiry_date" size="16" @if(isset($_REQUEST['expiry_date'])) value="{{$_REQUEST['expiry_date']}}" @endif placeholder="Expiry Date"/>
                                        </div>

                                        <div class="col-md-3">
                                            <input class="form-control form-control-inline date-picker"   name="created_date" id="created_date" size="16" @if(isset($_REQUEST['created_date'])) value="{{$_REQUEST['created_date']}}" @endif placeholder="Created Date"/>
                                        </div>

                                        <div class="col-md-3">
                                            <input class="form-control form-control-inline date-picker"    name="required_date" id="required_date" size="16" @if(isset($_REQUEST['required_date'])) value="{{$_REQUEST['required_date']}}" @endif placeholder="Required Date"/>
                                        </div>

                                        <div class="col-md-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Status</option>

                                                <option value="pending" @if(isset($_REQUEST['status'])?$_REQUEST['status'] == "pending":""){{'selected'}} @endif>Pending</option>
                                                <option value="accepted" @if(isset($_REQUEST['status'])?$_REQUEST['status'] == "accepted":""){{'selected'}} @endif>Accepted</option>
                                                <option value="saved" @if(isset($_REQUEST['status'])?$_REQUEST['status'] == "saved":""){{'selected'}} @endif>Saved</option>
                                                <option value="expired" @if(isset($_REQUEST['status'])?$_REQUEST['status'] == "expired":""){{'selected'}} @endif>Expired</option>

                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn theme-btn">Search</button>
                                            {{--<a href="javascript:;" class="btn blue"> Search </a>--}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <div class="form-body row">




                            @if($jobRequest->count())
                                <div class="col-md-12">

                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                        <thead>
                                        <tr>
                                            <th style="display: none;"></th>
                                            <th> Request No </th>
                                            <th> Required Date</th>
                                            <th> Job Type </th>
                                            <th> State </th>
                                            <th> Region </th>
                                            <th> Created Date </th>
                                            <th> Expiry Date </th>
                                            <th> Quotes </th>
                                            <th> Status </th>
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($jobRequest as $request)

                                            <tr class="odd gradeX">
                                                <td style="display: none;"></td>
                                                <td>{{$request->id}}</td>
                                                <td>{{$request->required_date}}</td>
                                                <td>{{$request->jobType->name}}</td>
                                                <td>{{$request->state->short_code}}</td>
                                                <td>{{$request->regions->name}}</td>
                                                <td>{{Carbon\Carbon::parse($request->created_at)->format('Y-m-d')}}</td>
                                                <td>{{$request->expiry_date}}</td>
                                                <td>{{count($request->quotes)}}</td>
                                                <td>{{$request->status}}</td>
                                                <td>
                                                    <a onclick="return modalFormView('job_request', '{{route('admin.jobRequest.view', $request->id)}}');" data-toggle="modal" href="#job_request_view"  title="Edit">View</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <p>Information is not available</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="job_request_view" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true"></button>
                    <h4 class="modal-title">View Job Request</h4>
                </div>
                <div class="modal-body">
                    {{--s- FORM FIELD--}}
                    <form role="form" name="supplier_location_edit" id="supplier_location_edit" method="POST" class="form-horizontal">
                        <div id="job_request">
                        </div>
                    </form>

                    <div class="modal-footer">
                        <span id="supplier_location_edit_validation_message_area" class="help-block has-error" style="display: none; "></span>
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>

@endsection