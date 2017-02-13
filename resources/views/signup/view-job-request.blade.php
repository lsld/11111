@extends('layouts.master')

@section('content')



        <!-- BEGIN CONTENT -->
<div class="page-content-wrapper portal view-job-request ">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- FORM -->

        @include('partials.page_breadcrumb')

        {{-- ================================= TABLE ===================================== --}}
        <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body">
                        <div class="row">
                                    <div class="col-sm-2">
                                        <img class="img-responsive" src="../../../assets/pages/img/download.jpg" alt="compay logo">
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="section-heading clearfix">
                                            <h1 class="ccf-page-title">Company Constructors</h1>
                                            <hr/>
                                        </div>

                                        <div class="heading-company-details">
                                            <h4>Heavy Machinery</h4>
                                            <p>
                                                <label>Service Areas:</label>
                                                <label class="highlighted-box bg-purple-intense">NSW</label>
                                                <label class="highlighted-box bg-purple-intense">CDB Inner</label></p>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>
                                                         <label class="mg-right"><i class="fa fa-phone" aria-hidden="true"></i> (03) 9822 0900</label>
                                                    </p>
                                                    <p><label class="mg-right"><i class="fa fa-phone" aria-hidden="true"></i> (03) 9822 0900</label></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>
                                                        <label><i class="fa fa-envelope" aria-hidden="true"></i> thecrew@safety.com</label>
                                                    </p>
                                                    <p>
                                                        <label><a href="#">www.thecrew#1.com.au</a></label>
                                                    </p>
                                                </div>
                                                </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <img class="img-responsive" src="../../../assets/pages/img/dummy-logo.gif" alt="logo image">
                                    </div>
                                </div>

                                <hr>

                        </div>

                        <div class="wrap-ccf-form">
                            <div class="row">

                                <div class="col-sm-4 time-duration">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Machine Type</p>
                                        </div>
                                        <div class="col-md-6"><p>Excavator</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Option</p>
                                        </div>
                                        <div class="col-md-6"><p>Auger</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Hire Type</p>
                                        </div>
                                        <div class="col-md-6"><p>Dry Hire</p></div>
                                    </div>

                                </div>



                                <div class="col-sm-4 time-duration">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Shifts per day</p>
                                        </div>
                                        <div class="col-md-6"><p>1</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Days per week</p>
                                        </div>
                                        <div class="col-md-6"><p>5</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Size/Weight</p>
                                        </div>
                                        <div class="col-md-6"><p>3t - 5t</p></div>
                                    </div>
                                </div>



                                <div class="col-sm-4 time-duration">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <p>Accessories</p>
                                        </div>
                                        <div class="col-md-7"><p>Mud Bucket, Ripper Tyre</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <p>Bucket width</p>
                                        </div>
                                        <div class="col-md-7"><p>1500mm</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <p>Auger Size</p>
                                        </div>
                                        <div class="col-md-7"><p>150mm</p></div>
                                    </div>

                                </div>

                                <div class="col-sm-12"><hr></div>
                                <div class="col-sm-12"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam debitis dolorem earum, facere fugiat magnam magni modi molestiae natus, nesciunt quaerat tempora tempore veniam voluptas.</p></div>
                            </div>
                            <div class="row time-duration">
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Duration</p>
                                                        </div>
                                                        <div class="col-md-6"><p>16/3/16 - 25/3/16</p></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Request Expires</p>
                                                        </div>
                                                        <div class="col-md-6"><p>10/3/2016</p></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Created By</p>
                                                        </div>
                                                        <div class="col-md-6"><p>User Name</p></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Created Date </p>
                                                        </div>
                                                        <div class="col-md-6"><p>10/3/2016</p></div>
                                                    </div>
                                                </div>

                                            </div>
                        </div>
                        <hr/>
                         <div class="row">
                                    <div class="col-sm-12">
                                       <button class="btn btn-primary">Create Quote</button>
                                    </div>
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