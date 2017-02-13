@extends('layouts.master')

@section('content')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper portal supplier-portal-company-profile">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">

		<!-- BEGIN PAGE BAR -->
    @include('partials.page_breadcrumb')

		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->
		<div class="wrap-ccf-form">
			<form action="" class="form-horizontal" method="POST">
				<div class="portlet light bordered">
					<!-- BEGIN PAGE TITLE-->
					<div class="wrap-ccf-page-title">
						<h1 class="ccf-page-title">My Job Requests</h1>
						<p>View all of your job requests</p>
					</div>
					<!-- END PAGE TITLE-->
					<div class="portlet-body form ">
                        <div class="filter-section">
						    <div class="form-body">
                                <div class="input-icon right">
                                    <i class="icon-magnifier"></i>
                                    <input type="text" class="form-control input-circle" placeholder="search...">
                                </div>
						    </div>
						    <div class="form-body">
						    <div class="form-group">
						        <div class="row">
						            <div class="col-sm-12">

						            </div>
						        </div>
						        <div class="row">
                                    <div class="col-md-4">
                                    <label class="control-label ">Lable </label>
                                        <input class="form-control form-control-inline  date-picker" size="16" type="text" value="" />
                                    </div>

                                    <div class="col-md-4">
                                    <label class="control-label ">Submitted Date</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Submitted Date</option>
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                    <label class="control-label ">Quote Expiry Date</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Quote Expiry Date</option>
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                    <label class="control-label ">Request Expiry Date</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Request Expiry Date</option>
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                    <label class="control-label ">Created Date</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Created Date</option>
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                 <label class="control-label ">Status</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Status</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="javascript:;" class="btn blue"> Search </a>
                                    </div>
                                </div>
                            </div>
						</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="wrap-ccf-page-title">
                                    <h1 class="ccf-page-title">My Job Requests</h1>
                                </div>
                                <br/>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Request</th>
                                            <th>Required Date</th>
                                            <th>Job Type</th>
                                            <th>Category Type</th>
                                            <th>Hire Type</th>
                                            <th>State</th>
                                            <th>Duration</th>
                                            <th>Created Date</th>
                                            <th>Expiry Date</th>
                                            <th>Quotes</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($jobRequests as $jobRequest)
                                          <script type="text/javascript">
                                          </script>
                                            <tr>
                                                <td>{{$jobRequest->code }}</td>
                                                <td>{{$jobRequest->required_date}}</td>
                                                <td>{{$jobRequest->JobType->name}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{$jobRequest->duration}}</td>
                                                <td>{{$jobRequest->created_at}}</td>
                                                <td>{{$jobRequest->expiry_date}}</td>
                                                <td></td>
                                                <td class="status-shown"><span class="color-view bg-purple-seance bg-font-purple-seance ">{{$jobRequest->status }}</span></td>
                                                <td><a href="{{route('job_requests', $jobRequest->id)}}" class="btn btn-xs btn-default" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
			</form>
		</div>
	</div>
	<!-- END CONTENT BODY -->
    {{--e-MODAL-MATERIAL --}}
</div>
<!-- END CONTENT -->
@endsection