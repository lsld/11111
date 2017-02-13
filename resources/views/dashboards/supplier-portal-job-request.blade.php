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
						<h1 class="ccf-page-title">Job Request</h1>
						<p>View all of your Job Request</p>
					</div>
					<!-- END PAGE TITLE-->
					<div class="portlet-body form ">
						<div class="form-body">
							<a href="javascript:;" class="btn blue"> Create Job Request </a>
						</div>
						<div class="form-body">
                            <div class="input-icon right">
                                <i class="icon-magnifier"></i>
                            <input type="text" class="form-control input-circle" placeholder="search..."> </div>
						</div>

						<div class="form-body">
						    <div class="form-group">

                                <div class="col-md-3">
                                    <input class="form-control form-control-inline  date-picker" size="16" type="text" value="" />
                                </div>

                                <div class="col-md-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">Job Type</option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">Category Type</option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">Hire Type</option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">State</option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">Duration</option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">Created Date</option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">Expiration Date</option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">Status</option>
                                        <option value=""></option>
                                    </select>
                                </div>



                            </div>
                            <div class="form-group clearfix">
                                <div class="col-md-3">
                                    <a href="javascript:;" class="btn blue"> Search </a>
                                </div>
                            </div>
						</div>
                        <div class="form-body row">
                            <div class="col-md-12">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th> Request No </th>
                                                <th> Required Date </th>
                                                <th> Job Type </th>
                                                <th> Category Type </th>
                                                <th> Hire Type </th>
                                                <th> State </th>
                                                <th> Duration </th>
                                                <th> Created Date </th>
                                                <th> Expiry Date </th>
                                                <th> Quotes </th>
                                                <th> Status </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                               <td>R-001</td>
                                               <td>08-04-2016</td>
                                               <td>Plant Hire</td>
                                               <td>Excavator</td>
                                               <td>Dry</td>
                                               <td>NSF</td>
                                               <td>Under 1 week</td>
                                               <td>05-04-2016</td>
                                               <td>05-05-2016</td>
                                               <td>5</td>
                                               <td>pending</td>
                                               <td>
                                                   <a href="">View </a> |
                                                   <a href="">Edit</a> |
                                                   <a href="">Close</a>
                                               </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                               <td>R-001</td>
                                               <td>08-04-2016</td>
                                               <td>Plant Hire</td>
                                               <td>Excavator</td>
                                               <td>Dry</td>
                                               <td>NSF</td>
                                               <td>Under 1 week</td>
                                               <td>05-04-2016</td>
                                               <td>05-05-2016</td>
                                               <td>5</td>
                                               <td>pending</td>
                                               <td>
                                                   <a href="">View </a> |
                                                   <a href="">Edit</a> |
                                                   <a href="">Close</a>
                                               </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                               <td>R-001</td>
                                               <td>08-04-2016</td>
                                               <td>Plant Hire</td>
                                               <td>Excavator</td>
                                               <td>Dry</td>
                                               <td>NSF</td>
                                               <td>Under 1 week</td>
                                               <td>05-04-2016</td>
                                               <td>05-05-2016</td>
                                               <td>5</td>
                                               <td>pending</td>
                                               <td>
                                                   <a href="">View </a> |
                                                   <a href="">Edit</a> |
                                                   <a href="">Close</a>
                                               </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                               <td>R-001</td>
                                               <td>08-04-2016</td>
                                               <td>Plant Hire</td>
                                               <td>Excavator</td>
                                               <td>Dry</td>
                                               <td>NSF</td>
                                               <td>Under 1 week</td>
                                               <td>05-04-2016</td>
                                               <td>05-05-2016</td>
                                               <td>5</td>
                                               <td>pending</td>
                                               <td>
                                                   <a href="">View </a> |
                                                   <a href="">Edit</a> |
                                                   <a href="">Close</a>
                                               </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                               <td>R-001</td>
                                               <td>08-04-2016</td>
                                               <td>Plant Hire</td>
                                               <td>Excavator</td>
                                               <td>Dry</td>
                                               <td>NSF</td>
                                               <td>Under 1 week</td>
                                               <td>05-04-2016</td>
                                               <td>05-05-2016</td>
                                               <td>5</td>
                                               <td>pending</td>
                                               <td>
                                                   <a href="">View </a> |
                                                   <a href="">Edit</a> |
                                                   <a href="">Close</a>
                                               </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                               <td>R-001</td>
                                               <td>08-04-2016</td>
                                               <td>Plant Hire</td>
                                               <td>Excavator</td>
                                               <td>Dry</td>
                                               <td>NSF</td>
                                               <td>Under 1 week</td>
                                               <td>05-04-2016</td>
                                               <td>05-05-2016</td>
                                               <td>5</td>
                                               <td>pending</td>
                                               <td>
                                                   <a href="">View </a> |
                                                   <a href="">Edit</a> |
                                                   <a href="">Close</a>
                                               </td>
                                            </tr>


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

</div>
<!-- END CONTENT -->
@endsection