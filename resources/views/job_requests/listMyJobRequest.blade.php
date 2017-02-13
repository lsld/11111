@extends('layouts.master')

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
                        <h1 class="ccf-page-title clearfix">My Job Requests


                            <div class="btn-group pull-right" >
                                <a class="btn btn-primary dropdown-toggle theme-btn" data-toggle="dropdown" href="#">
                                    Create Job Request
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route('hirer-portal-plant-hire-create')}}">Plant Hire</a>
                                    </li>
                                    <li>
                                        <a href="{{route('hirer-portal-services-create')}}">Contracting</a>
                                    </li>
                                    <li>
                                        <a href="{{route('hirer-portal-material-create')}}">Materials</a>
                                    </li>
                                    <li>
                                        <a href="{{route('hirer-portal-fill-create')}}">Fill</a>
                                    </li>
                                </ul>
                            </div>


                        </h1>
                        <p>View all of your job requests</p>
                    </div>
                    <!-- END PAGE TITLE-->
                    <div class="portlet-body form">
                        <form role="form" method="GET" action="{{ url('/my-job-request') }}" name="search">
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


                            @if($jobRequest->count())
                                <div class="col-md-12">

                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_1">


                                            <thead>
                                            <tr>
                                                <th style="display: none;"></th>
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
                                                        <td style="display: none;"></td>
                                                        <td>{{$request->id}}</td>
                                                        <td>{{$request->jobType->name}}</td>
                                                        <td>{{$request->state->short_code}}</td>
                                                        <td>{{$request->regions->name}}</td>
                                                        <td>{{Carbon\Carbon::parse($request->created_at)->format('Y-m-d')}}</td>
                                                        <td>{{$request->expiry_date}}</td>
                                                        <td>{{count($request->quotes)}}</td>
                                                        <td>{{$request->status}}</td>
                                                        <td>
                                                            @php
                                                                $edit_url = $delete_url = null;

                                                                switch ($request->job_type_id){
                                                                    case 1:
                                                                        $edit_url = route('hirer-portal-plant-hire-edit', uid($request->id));
                                                                        $delete_url = route('hirer-portal-plant-hire-destroy', uid($request->id));
                                                                        break;
                                                                    case 2:
                                                                        $edit_url = route('hirer-portal-services-edit', uid($request->id));
                                                                        $delete_url = route('hirer-portal-services-destroy', uid($request->id));
                                                                        break;
                                                                    case 3:
                                                                        $edit_url = route('hirer-portal-material-edit', uid($request->id));
                                                                        $delete_url = route('hirer-portal-material-destroy', uid($request->id));
                                                                        break;
                                                                    case 4:
                                                                        $edit_url = route('hirer-portal-fill-edit', uid($request->id));
                                                                        $delete_url = route('hirer-portal-fill-destroy', uid($request->id));
                                                                        break;
                                                                }
                                                            @endphp

                                                            <a href="{{url('my-job-request/'. uid($request->id))}}">View </a>
                                                            |
                                                            <a href="{{$edit_url}}">Edit</a> |
                                                            <a onclick="return confirm('Are you sure you want to delete?');" href="{{$delete_url}}">Close</a>
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

@endsection