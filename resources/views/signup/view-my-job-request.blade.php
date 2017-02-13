@extends('layouts.master')

@section('content')



<!-- BEGIN CONTENT -->
<div class="page-content-wrapper view-my-job-request portal">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        {{-- ================================= BREADCRUMB ================================ --}}

        @include('partials.page_breadcrumb')

        {{-- ================================= HEADING =================================== --}}

        {{-- ================================= MID CONTENTS ============================== --}}
        <div class="wrap-ccf-form">
            {{-- ================== FORM =============== ===--}}
            <div class="portlet light bordered">
                {{-- ============= HEADING SECTION =========== --}}
                <div class="section-heading clearfix">
                    <h1 class="ccf-page-title">Request #</h1>
                    <p class="highlighted bg-green-jungle bg-font-green-jungle">Plant Hire</p>
                    <p class="highlighted bg-yellow bg-font-yellow">Pending</p>
                </div>
                {{-- ============= HEADING SECTION =========== --}}

                {{-- ============= DETAILS =========== --}}
                <div class="portlet light bordered">
                    <div class="row">
                        {{--============================================ COLUMN 1 ================================--}}
                        <div class="col-sm-4 time-duration">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Machine Type:</p>
                                </div>
                                <div class="col-md-6"><p>Excavator</p></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Option:</p>
                                </div>
                                <div class="col-md-6"><p>Auger</p></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Hire Type:</p>
                                </div>
                                <div class="col-md-6"><p>Dry Hire</p></div>
                            </div>

                        </div>
                        {{--============================================ COLUMN 1 ================================--}}

                        {{--============================================ COLUMN 2 ================================--}}
                        <div class="col-sm-4 time-duration">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Shifts per day:</p>
                                </div>
                                <div class="col-md-6"><p>1</p></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Days per week:</p>
                                </div>
                                <div class="col-md-6"><p>5</p></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Size/Weight:</p>
                                </div>
                                <div class="col-md-6"><p>3t - 5t</p></div>
                            </div>
                        </div>
                        {{--============================================ COLUMN 2 ================================--}}

                        {{--============================================ COLUMN 3 ================================--}}
                        <div class="col-sm-4 time-duration">
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Accessories:</p>
                                </div>
                                <div class="col-md-7"><p>Mud Bucket, Ripper Tyre</p></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Bucket width:</p>
                                </div>
                                <div class="col-md-7"><p>1500mm</p></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Auger Size:</p>
                                </div>
                                <div class="col-md-7"><p>150mm</p></div>
                            </div>

                        </div>
                        {{--============================================ COLUMN 3 ================================--}}
                        <div class="col-sm-12"><hr/></div>
                        <div class="col-sm-12"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam debitis dolorem earum, facere fugiat magnam magni modi molestiae natus, nesciunt quaerat tempora tempore veniam voluptas.</p></div>
                    </div>
                    <div class="row time-duration">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Duration:</p>
                                </div>
                                <div class="col-md-6"><p>16/3/16 - 25/3/16</p></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Request Expires: </p>
                                </div>
                                <div class="col-md-6"><p>10/3/2016</p></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Created By:</p>
                                </div>
                                <div class="col-md-6"><p>User Name</p></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Created Date: </p>
                                </div>
                                <div class="col-md-6"><p>10/3/2016</p></div>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- ============= DETAILS =========== --}}
            </div>
            {{-- ================== FORM =============== --}}


        </div>
        {{-- ================================= MID CONTENTS ============================== --}}


        {{-- ================================= TABLE ===================================== --}}
        <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="section-heading clearfix">
                            <h1 class="ccf-page-title">Quotes for Request #</h1>
                        </div>
                        <div class="portlet-body">

                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>Request</th>
                                        <th>Quote</th>
                                        <th>Company Name</th>
                                        <th>Quote Price</th>
                                        <th>Date Submitted</th>
                                        <th>Quote Expiration Date</th>
                                        <th>Quote Expiring in</th>
                                        <th>Request Expiration Date</th>
                                        <th>Request Expiring in</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                       <td>R-012</td>
                                       <td>Q-001</td>
                                       <td>Com-name</td>
                                       <td>$200</td>
                                       <td>08-04-2016</td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td>Pending</td>
                                       <td >
                                       <div class="action-column">
                                            <a href="#" class="btn btn-xs btn-default" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="#" class="btn btn-xs btn-default" title="Reject"><i class="fa fa-times" aria-hidden="true"></i></a>
                                            <a href="#" class="btn btn-xs btn-default" title="Accept"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            <a href="#" class="btn btn-xs btn-default" title="View Supplier Profile"><i class="fa fa-users" aria-hidden="true"></i></a>
                                            </div>
                                       </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                       <td>R-012</td>
                                       <td>Q-001</td>
                                       <td>Com-name</td>
                                       <td>$400</td>
                                       <td>08-04-2016</td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td>Pending</td>
                                       <td><a href="#" class="btn btn-xs btn-default" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                           <a href="#" class="btn btn-xs btn-default" title="Reject"><i class="fa fa-times" aria-hidden="true"></i></a>
                                           <a href="#" class="btn btn-xs btn-default" title="Accept"><i class="fa fa-check" aria-hidden="true"></i></a>
                                           <a href="#" class="btn btn-xs btn-default" title="View Supplier Profile"><i class="fa fa-users" aria-hidden="true"></i></a>
                                       </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        {{-- ================================= TABLE ===================================== --}}
    </div>
    <!-- END CONTENT BODY -->
</div>

@endsection