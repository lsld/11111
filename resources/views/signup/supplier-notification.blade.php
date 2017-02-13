
@extends('layouts.sign-up')

@section('content')

    <!-- BEGIN CONTENT -->

    <div class="page-content-wrapper supplier-service">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            {{--s-FORM--}}
            <div class="wrap-ccf-form">

                <div class="portlet light">
                    <!-- BEGIN PAGE TITLE-->
                    <h1 class="ccf-page-title">Notifications</h1>

                    <!-- END PAGE TITLE-->

                    <!-- s- WIZARD PAGINATION -->

                @include('partials.wizard-pagination')

                <!-- e- WIZARD PAGINATION -->

                    {{-- s- DESCRIPTION --}}
                    <div class="row">
                        <div class="col-md-10 center-align">
                            <p class="">Select services and locations for which you wish to receive notifications of matching job requests.</p>
                        </div>
                    </div>
                    {{-- e- DESCRIPTION --}}

                <!-- s-FORM HEADING -->
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-md-10 center-align">
                                <div class="caption">
                                    <h3 class="clearfix">
                                        <form action="{{ route("supplier_singup_notifications_skip") }}" method="POST" class="pull-right wrap-btn-skip">

                                            {{ csrf_field() }}
                                            <input type="hidden" name="skip" value="skip">
                                            <button type="submit" class="btn btn-skip theme-btn">Complete Later  <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                            {{-- <button type="button" class="btn default">Cancel</button>--}}
                                        </form>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- e-FORM HEADING -->

                    @if($errors == 0)
                        <form action="{{route('supplier_notifications')}}" class="form-horizontal" method="POST">


                        {{-- s- FORM FILEDS --}}
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="form-actions col-md-12">
                                <div class="row">
                                    <div class="col-md-10 clearfix center-align">
                                        {{csrf_field()}}
                                    <button type="submit" class="btn theme-btn pull-right" >Next</button>
                                    {{--    <button type="submit" class="btn theme-btn pull-right">Next</button>--}}
                                    </div>
                                </div>
                            </div>

                            <div class="form-body col-md-10 form-fileds-center">
                                {{-- s- ROUT FORM--}}
                                <div class="flash-message">
                                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                        @if(Session::has('alert-' . $msg))
                                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            </p>
                                        @endif
                                    @endforeach
                                </div>


                                {{-- s- NOTIFICATION --}}
                                            @include('components.component-notification', ['service_list' => $service_list, 'job_types' => $job_types, 'location_list' => $location_list, 'notifications' => $notifications ])
                                {{-- s- NOTIFICATION --}}

                                {{-- e- ROUT FORM--}}
                            </div>
                            <!-- END FORM-->

                                    <div class="form-actions col-md-12">
                                        <div class="row">
                                            <div class="col-md-10 clearfix center-align">
                                                {{csrf_field()}}
                                            <button type="submit" class="btn theme-btn pull-right">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                        {{-- e- FORM FILEDS --}}
                        @else
                        <div class="portlet-body form">
                            <div class="form-body col-md-6 form-fileds-center">
                                <div class="alert alert-info">
                                    <p> <strong><i class="fa fa-info" aria-hidden="true"></i></strong> Please complete  services and locations to continue.</p>
                                </div>
                            </div>
                        </div>
                        @endif
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->


    </div>
    @endsection

    @section('scripts')
    <script src="/assets/pages/scripts/supplier-services-validations.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });
        });
    </script>
    @endsection


