@extends('layouts.master')

@section('content')
    <!-- =============================================== BEGIN CONTENT =============================================== -->
    <div class="page-content-wrapper portal page-dashboard">
        <!-- =========================================== BEGIN CONTENT BODY ========================================== -->
        <div class="page-content">

            <!-- ======================================= BREADCRUMB ================================================== -->

        @include('partials.page_breadcrumb')

            <!-- ======================================= HEADING ===================================================== -->

            <!-- ======================================= MID CONTENTS ================================================ -->
            <div class="wrap-ccf-form">
                <!-- =================================== FORM ======================================================== -->
                <div class="portlet light bordered">

                    <!-- =============================== PORTAL PAGE TITLE ============================================-->
                    <div class="wrap-ccf-page-title">
                        <h1 class="ccf-page-title">Dashboard</h1>
                        <p>Welcome to CCF Supplier Portal, <i>David Hasketh</i></p>
                    </div>
                    <!-- =============================== PORTAL PAGE TITLE ============================================-->

                    <!-- =============================== PORTAL PAGE PORTLET BODY =====================================-->
                    <div class="portlet-body form">
                        <!-- =========================== PORTAL PAGE PORTLET FORM BODY ================================-->
                        <div class="form-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">



                                        <div class="dashboard-stat-ccf-v1">
                                            {{--<h1>My Request</h1>--}}
                                             <p class="counter-value"><span data-counter="counterup" data-value="95" >--</span></p>
                                            <p>Pending Request(s)</p>
                                            <a href="javascript:;" class="btn theme-btn">View My Request</a>
                                        </div>

                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat-ccf-v1">
                                            {{--<h1>My Request</h1>--}}
                                            <p class="counter-value"><span data-counter="counterup" data-value="115" >--</span></p>
                                            <p>Pending Quote(s)</p>
                                            <a href="javascript:;" class="btn theme-btn">View My Request</a>
                                        </div>

                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                         <div class="dashboard-stat-ccf-v1 tot-request jelly-bean">
                                           <p class="counter-value"><span data-counter="counterup" data-value="26" >--</span></p>
                                           <p>Total Request(s)</p>
                                           <p class="bottom-date">27/05/2016</p>

                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat-ccf-v1 tot-request princeton-orange">
                                           <p class="counter-value"><span data-counter="counterup" data-value="35" >--</span></p>
                                           <p>Total Request(s)</p>
                                           <p class="bottom-date">27/05/2016</p>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- =========================== PORTAL PAGE PORTLET FORM BODY ================================-->
                    </div>
                    <!-- =============================== PORTAL PAGE PORTLET BODY =====================================-->

                </div>
                <!-- =================================== FORM ======================================================== -->
            </div>
            <!-- ======================================= MID CONTENTS ================================================ -->



        </div>
        <!-- =========================================== END CONTENT BODY   ========================================== -->
    </div>
    <!-- =============================================== END CONTENT   =============================================== -->
@endsection