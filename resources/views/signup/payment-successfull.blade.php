@extends('layouts.sign-up')

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper payment-success">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="wrap-ccf-form">
                <!-- FORM -->
                <form action="#" method="post" class="form-horizontal">

                    @if($payment['status'])
                        <div class="portlet light bordered  col-md-8 form-fileds-center pay-status pay-success">

                            <div class="portlet-body form ">
                                <!-- BEGIN PAGE TITLE-->
                                <h1 class="check-icon"><i class="fa fa-check" aria-hidden="true"></i></h1>

                                {{--<h1 class="ccf-page-title">Thank you for registering with CivFast.</h1>

                                <p class="txt-center">You will receive an email with the link to activate your account and log in to the system. </p>--}}
                                <!-- END PAGE TITLE-->
                                <p class="txt-center">Thank you for registering with CivFast.</p>
                                <p class="txt-center">You will receive an email with the link to activate your account and log in to the system.</p>
                                <p class="txt-center"> {{$payment['message']}} </p>
                                <p class="txt-center"><a href="/">Back to Login</a></p>

                            </div>

                        </div>
                    @else
                        <div class="portlet light bordered  col-md-8 form-fileds-center pay-status pay-fail ">

                            <div class="portlet-body form ">
                                <!-- BEGIN PAGE TITLE-->
                                <h1 class="check-icon"><i class="fa fa-times" aria-hidden="true"></i></h1>
                                <h1 class="ccf-page-title">Something went wrong</h1>
                                <!-- END PAGE TITLE-->
                                <p class="txt-center"> {{$payment['message']}} </p>
                                <p class="txt-center"><a href="{{ $gatewayLink  }}">Retry</a> | <a href="/">Cancel</a>
                                </p>

                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>

@endsection