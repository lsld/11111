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
                        <h1 class="ccf-page-title clearfix">Manage Quotes
                        </h1>
                        <p>View and manage quotes</p>
                    </div>
                    <!-- END PAGE TITLE-->
                    <div class="portlet-body form">
                        <form role="form" method="GET" action="{{ route('admin.quotes.list') }}" name="search">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <input class="form-control form-control-inline date-picker"   name="submitted_date" id="submitted_date" size="16" @if(isset($_REQUEST['submitted_date'])) value="{{$_REQUEST['submitted_date']}}" @endif placeholder="Submitted Date"/>
                                        </div>


                                        <div class="col-md-3">
                                            <input class="form-control form-control-inline date-picker"    name="q_expiry_date" id="q_expiry_date" size="16" @if(isset($_REQUEST['q_expiry_date'])) value="{{$_REQUEST['q_expiry_date']}}" @endif placeholder="Quote Expiry Date"/>
                                        </div>

                                        <div class="col-md-3">
                                            <input class="form-control form-control-inline date-picker"    name="r_expiry_date" id="r_expiry_date" size="16" @if(isset($_REQUEST['r_expiry_date'])) value="{{$_REQUEST['r_expiry_date']}}" @endif placeholder="Request Expiry Date"/>
                                        </div>

                                        <div class="col-md-3">
                                            <input class="form-control form-control-inline date-picker"    name="required_date" id="required_date" size="16" @if(isset($_REQUEST['required_date'])) value="{{$_REQUEST['required_date']}}" @endif placeholder="Required Date"/>
                                        </div>

                                        <div class="col-md-3">
                                            <input class="form-control form-control-inline date-picker"   name="created_date" id="created_date" size="16" @if(isset($_REQUEST['created_date'])) value="{{$_REQUEST['created_date']}}" @endif placeholder="Created Date"/>
                                        </div>

                                        <div class="col-md-3">
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Status</option>
                                            <option value="0"  @if(isset($_REQUEST['status'])?$_REQUEST['status'] == "0":""){{'selected'}} @endif>Pending</option>
                                            <option value="1"  @if(isset($_REQUEST['status'])?$_REQUEST['status'] == "1":""){{'selected'}} @endif>Accepted</option>
                                            <option value="2"  @if(isset($_REQUEST['status'])?$_REQUEST['status'] == "2":""){{'selected'}} @endif>Rejected</option>
                                            <option value="3"  @if(isset($_REQUEST['status'])?$_REQUEST['status'] == "3":""){{'selected'}} @endif>Withdraw</option>
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
                            @if($quotes->count())
                                <div class="col-md-12">

                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                            <thead>
                                            <tr>
                                                <th style="display: none;"></th>
                                                <th> Request </th>
                                                <th> Quote</th>
                                                <th> Quote Price </th>
                                                <th> Company Name </th>
                                                <th> Date Submitted </th>
                                                <th> Quote Expiration Date </th>
                                                <th> Request Expiration Date </th>
                                                <th> Status </th>
                                                <th> Action </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($quotes as $quote)

                                                    <tr class="odd gradeX">
                                                        <td style="display: none;"></td>
                                                        <td>{{$quote->JobRequest->id}}</td>
                                                        <td>{{$quote->code}}</td>
                                                        <td>{{$quote->price}}</td>
                                                        <td>{{$quote->company->name}}</td>
                                                        <td>{{date('Y-m-d', strtotime($quote->created_at))}}</td>
                                                        <td>{{$quote->expiry_date}}</td>
                                                        <td>{{$quote->JobRequest->expiry_date}}</td>
                                                        <td class="status-shown"><span class="color-view bg-purple-seance bg-font-purple-seance status-{{$quote->status}}">{{$quote->status}}</span></td>

                                                        <td>
                                                        <a onclick="return modalFormView('quote', '{{route('admin.quotes.view', $quote->id)}}');" data-toggle="modal" href="#quote_view"  title="Edit">View</a>
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


    <div class="modal fade" id="quote_view" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true"></button>
                    <h4 class="modal-title">View Quote</h4>
                </div>
                <div class="modal-body">
                    {{--s- FORM FIELD--}}
                    <form role="form" name="supplier_location_edit" id="supplier_location_edit" method="POST" class="form-horizontal">
                        <div id="quote">
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