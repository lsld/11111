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
                    <!-- BEGIN PAGE TITLE-->
                    <div class="wrap-ccf-page-title">
                        <h1 class="ccf-page-title">Job Requests</h1>
                        <p>View all of your job requests</p>
                    </div>
                    <!-- END PAGE TITLE-->
                    <div class="portlet-body form">
                        <form role="form" method="GET" action="{{ url('/job-request') }}" name="search">
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
                            @if($jobRequest)
                                <div class="col-md-12">


                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                            <tr>
                                                <th style="display: none;">

                                                </th>
                                                <th> Request No </th>
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
                                                            <td style="display: none;">

                                                            </td>
                                                            <td>{{$request->id}}</td>
                                                            <td>{{$request->jobType->name}}</td>
                                                            <td>{{$request->state->short_code}}</td>
                                                            <td>{{$request->regions->name}}</td>
                                                            <td>{{Carbon\Carbon::parse($request->created_at)->format('Y-m-d')}}</td>
                                                            <td>{{$request->expiry_date}}</td>
                                                            <td>{{count($request->quotes)}}</td>
                                                            <td>{{$request->status}}</td>
                                                            <td>
                                                                <a href="{{url('job-request/'. $request->id)}}">View </a>
                                                            </td>
                                                        </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                </div>
                            @else
                                <div class="col-md-12">
                                    Information is not available
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>

@endsection