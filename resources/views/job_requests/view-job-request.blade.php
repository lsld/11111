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
                                        <img class="img-responsive" src="{{$companyProfile->logo?$companyProfile->logo:"/uploads/logos/logo-silhouette.jpg"}}" alt="company logo">
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="section-heading clearfix">
                                            <h1 class="ccf-page-title"><a data-toggle="modal" href="#companyprofilepopup" class="jc-reload">{{isset($companyProfile->name)?$companyProfile->name:""}}</a></h1>
                                            <hr/>
                                        </div>

                                        <div class="heading-company-details">
                                            {{--<h4>Heavy Machinery</h4>--}}
                                                <p>
                                                    @if(isset($jobRequest['state']['short_code']))
                                                    <label>Service Areas:</label>
                                                    <label class="highlighted-box bg-purple-intense"> {{$jobRequest['state']['short_code']}}</label>
                                                    @endif
                                                </p>

                                            <hr/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>
                                                        @if(isset($companyProfile->phone_1))
                                                            <label class="mg-right"><i class="fa fa-phone" aria-hidden="true"></i> {{$companyProfile->phone_1}}</label>
                                                        @endif
                                                    </p>
                                                    <p>
                                                        @if(isset($companyProfile->phone_2))
                                                            <label class="mg-right"><i class="fa fa-phone" aria-hidden="true"></i> {{$companyProfile->phone_2}}</label>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>
                                                        @if(isset($companyProfile->email))
                                                            <label><i class="fa fa-envelope" aria-hidden="true"></i> {{$companyProfile->email}}</label>
                                                        @endif
                                                    </p>
                                                    <p>
                                                        <label><a href="#"> {{isset($companyProfile->website)?$companyProfile->website:""}}</a></label>
                                                    </p>
                                                </div>
                                                </div>

                                        </div>
                                    </div>
                                </div>

                                <hr>
                            <div class="col-sm-4 time-duration">
                                <div class="row">
                                    @if(isset($jobRequest['job_type']['name']))
                                        <div class="col-md-6">
                                            <p>Request #</p>
                                        </div>
                                        <div class="col-md-6"><p>{{$jobRequest['job_type']['name']}}  <label>( {{$jobRequest['status']}} )</label></p></div>
                                    @endif
                                </div>
                            </div>
                                <hr>
                            <div class="row">
                                <div class="col-sm-4 time-duration">
                                    @if(isset($jobRequest['state']['name']))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>State:</p>
                                            </div>
                                            <div class="col-md-6"><p>{{$jobRequest['state']['name']}}</p></div>
                                        </div>
                                    @endif
                                    @if(isset($jobRequest['suburb']))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Suburb:</p>
                                            </div>
                                            <div class="col-md-6"><p>{{$jobRequest['suburb']}}</p></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-4 time-duration">
                                    @if(isset($jobRequest['regions']['name']))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Region:</p>
                                            </div>
                                            <div class="col-md-6"><p>{{$jobRequest['regions']['name']}}</p></div>
                                        </div>
                                    @endif
                                    @if(isset($jobRequest['post_code']))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Post Code:</p>
                                            </div>
                                            <div class="col-md-6"><p>{{$jobRequest['post_code']}}</p></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-4 time-duration">
                                    @if(isset($jobRequest['street_address']))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Street:</p>
                                            </div>
                                            <div class="col-md-6"><p>{{$jobRequest['street_address']}}</p></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                                <hr>

                        </div>

                        <div class="wrap-ccf-form">
                            <div class="row">
                                @if(isset($jobRequest['plant_hire']))
                                    @foreach($jobRequest['plant_hire'] as $requestItem)
                                    <div class="col-sm-4 time-duration">
                                                <div class="row">
                                                    @if(isset($requestItem['equipment_type']['label']))
                                                        <div class="col-md-6">
                                                            <p>Machine Type</p>
                                                        </div>
                                                        <div class="col-md-6"><p>{{$requestItem['equipment_type']['label']}}</p></div>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    @if(isset($requestItem['work_type']['label']))
                                                        <div class="col-md-6">
                                                            <p>Work Type</p>
                                                        </div>
                                                        <div class="col-md-6"><p>{{$requestItem['work_type']['label']}}</p></div>
                                                    @endif
                                                </div>
                                    </div>

                                            @foreach($requestItem['properties'] as $property)
                                                @if($property['type'] == "text")
                                                    <div class="col-sm-4 time-duration">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>{{isset($property['dynamic_property']['label'])?$property['dynamic_property']['label']:""}}</p>
                                                                <p>{{isset($property['service_dynamic_property']['label'])?$property['service_dynamic_property']['label']:""}}</p>
                                                            </div>
                                                            <div class="col-md-6"><p>{{isset($property['text']['value'])?$property['text']['value']:""}}</p></div>
                                                        </div>
                                                    </div>
                                                @endif
                                                    @if($property['type'] == "RB")
                                                        <div class="col-sm-4 time-duration">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p>{{isset($property['dynamic_property']['label'])?$property['dynamic_property']['label']:""}}</p>
                                                                    <p>{{isset($property['service_dynamic_property']['label'])?$property['service_dynamic_property']['label']:""}}</p>
                                                                </div>
                                                                @if(isset($property['radio_button']['option']))
                                                                        <div class="col-md-6"><p>{{isset($property['radio_button']['option']['option'])?$property['radio_button']['option']['option']:""}}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if($property['type'] == "DD")
                                                        <div class="col-sm-4 time-duration">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p>{{isset($property['dynamic_property']['label'])?$property['dynamic_property']['label']:""}}</p>
                                                                    <p>{{isset($property['service_dynamic_property']['label'])?$property['service_dynamic_property']['label']:""}}</p>
                                                                </div>
                                                                @if(isset($property['dropdown']['option']['option']))
                                                                        <div class="col-md-6"><p>{{isset($property['dropdown']['option']['option'])?$property['dropdown']['option']['option']:""}}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if($property['type'] == "MS")
                                                        <div class="col-sm-4 time-duration">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p>{{isset($property['dynamic_property']['label'])?$property['dynamic_property']['label']:""}}</p>
                                                                    <p>{{isset($property['service_dynamic_property']['label'])?$property['service_dynamic_property']['label']:""}}</p>
                                                                </div>
                                                                @if(isset($property['multi_select']))
                                                                    <div class="col-md-6">
                                                                        @foreach($property['multi_select'] as $option)
                                                                            <p>{{isset($option['option']['option'])?$option['option']['option'].",":""}}</p>
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                            @endforeach
                                        @endforeach
                                @endif

                                    @if(isset($jobRequest['material_rest_data']))
                                        @if(isset($jobRequest['material_rest_data']['material_type']))
                                            <div class="col-sm-4 time-duration">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Resource type</p>
                                                    </div>
                                                    <div class="col-md-6"><p>{{isset($jobRequest['material_rest_data']['material_type']['name'])?$jobRequest['material_rest_data']['material_type']['name']:""}}</p></div>
                                                </div>
                                            </div>
                                        @endif
                                            @if(isset($jobRequest['material_rest_data']['condition']))
                                                <div class="col-sm-4 time-duration">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Condition</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            @if($jobRequest['material_rest_data']['condition'] == 1)
                                                                <p>{{"Apply"}}</p>
                                                            @else
                                                                <p>{{"Not Apply"}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if(isset($jobRequest['material_rest_data']['quantity']))
                                                <div class="col-sm-4 time-duration">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Quantity</p>
                                                        </div>
                                                        <div class="col-md-6"><p>{{isset($jobRequest['material_rest_data']['quantity'])?$jobRequest['material_rest_data']['quantity']:""}}</p></div>
                                                    </div>
                                                </div>
                                            @endif
                                    @endif

                                    @if(isset($jobRequest['fill_rest_data']))
                                        @if(isset($jobRequest['fill_rest_data']['required_date']))
                                            <div class="col-sm-4 time-duration">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Required Date</p>
                                                    </div>
                                                    <div class="col-md-6"><p>{{isset($jobRequest['fill_rest_data']['required_date'])?$jobRequest['fill_rest_data']['required_date']:""}}</p></div>
                                                </div>
                                            </div>
                                        @endif
                                            @if(isset($jobRequest['fill_rest_data']['number_of_sites']))
                                                <div class="col-sm-4 time-duration">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Number Of Sites</p>
                                                        </div>
                                                        <div class="col-md-6"><p>{{isset($jobRequest['fill_rest_data']['number_of_sites'])?$jobRequest['fill_rest_data']['number_of_sites']:""}}</p></div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if(isset($jobRequest['fill_rest_data']['can_load_and_carry']))
                                                <div class="col-sm-4 time-duration">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Can load and Carry</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            @if($jobRequest['fill_rest_data']['can_load_and_carry'] == 1)
                                                                <p>{{"yes"}}</p>
                                                            @else
                                                                <p>{{"No"}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($jobRequest['fill_rest_data']['can_load_and_carry'] == 1)
                                                    <div class="col-sm-4 time-duration">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Distance</p>
                                                            </div>
                                                            <div class="col-md-6"><p>{{isset($jobRequest['fill_rest_data']['distance'])?$jobRequest['fill_rest_data']['distance']:""}}</p></div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                            @if(isset($jobRequest['fill_rest_data']['quantity']))
                                                <div class="col-sm-4 time-duration">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Quantity</p>
                                                        </div>
                                                        <div class="col-md-6"><p>{{isset($jobRequest['fill_rest_data']['quantity'])?$jobRequest['fill_rest_data']['quantity']:""}}</p></div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if(isset($jobRequest['fill_rest_data']['fill_type']))
                                                <div class="col-sm-4 time-duration">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Fill Type</p>
                                                        </div>
                                                        <div class="col-md-6"><p>{{isset($jobRequest['fill_rest_data']['fill_type']['name'])?$jobRequest['fill_rest_data']['fill_type']['name']:""}}</p></div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if(isset($jobRequest['fill_rest_data']['fill_quality']))
                                                <div class="col-sm-4 time-duration">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Fill Quality</p>
                                                        </div>
                                                        <div class="col-md-6"><p>{{isset($jobRequest['fill_rest_data']['fill_quality'])?$jobRequest['fill_rest_data']['fill_quality']:""}}</p></div>
                                                    </div>
                                                </div>
                                            @endif
                                    @endif

                                <div class="col-sm-12"><hr></div>
                                <div class="col-sm-12"><p>{{isset($jobRequest['description'])?$jobRequest['description']:""}}</p></div>
                            </div>
                            <div class="row time-duration">
                                                <div class="col-md-4">
                                                    @if(isset($jobRequest['duration']))
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Duration</p>
                                                            </div>
                                                            <div class="col-md-6"><p>{{isset($jobRequest['duration'])?$jobRequest['duration']:""}}</p></div>
                                                        </div>
                                                    @endif
                                                    @if(isset($jobRequest['expiry_date']))
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Request Expires</p>
                                                            </div>
                                                            <div class="col-md-6"><p>{{isset($jobRequest['expiry_date'])?$jobRequest['expiry_date']:""}}</p></div>
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Created By</p>
                                                        </div>
                                                        <div class="col-md-6"><p>{{$jobRequest['users']['first_name']}} {{$jobRequest['users']['last_name']}}</p></div>
                                                    </div>
                                                    @if(isset($jobRequest['created_at']))
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Created Date</p>
                                                            </div>
                                                            <div class="col-md-6"><p>{{isset($jobRequest['created_at'])?Carbon\Carbon::parse($jobRequest['created_at'])->format('Y-m-d'):""}}</p></div>
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                        </div>
                        <hr/>
                        @if($check->isEmpty())

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="clearfix">
                                        <a data-toggle="modal" href="#quoates" class="btn btn-primary">Create Quote</a>
                                    </div>
                                </div>
                            </div>

                        @else

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="clearfix">
                                        <p> Quote is already available for this job request.</p>
                                    </div>
                                </div>
                            </div>

                        @endif
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        {{-- ================================= TABLE ===================================== --}}


        <!-- ================================= COMPANY PROFILE MODAL ===================== -->
            <div class="modal fade view-company-details-popup" id="companyprofilepopup" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form role="form" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Company Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-horizontal">
                                    <div class="form-group ">
                                        <div class="wrap-logo-heading">
                                            <div class="row">
                                                <div class="col-xs-12 clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 xol-xs-12">
                                                        <h3>
                                                            <img src="{{$companyProfile->logo ? $companyProfile->logo: "/uploads/logos/logo-silhouette.jpg"}}" alt="" class="img-responsive"/>{{$companyProfile->name}}
                                                            <div>
                                                                @foreach($companyProfile->industryCertification as $path)
                                                                    <img src="/uploads/logos/{{$path->path}}" alt="{{$companyProfile->name}}" class="img-responsive"/>
                                                                @endforeach
                                                            </div>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- ========================================================== COMPANY ABOUT/SERVICE/PROJECT ==================================== --}}
                                        <div class="wrap-company-service-project">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="component-section">
                                                        <div class="component-heading">
                                                            <h3>About Company</h3>
                                                        </div>
                                                        <div class="component-body">
                                                            <p> {{ $companyProfile->about }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="component-section">
                                                        <div class="component-heading">
                                                            <h3>COMPANY SERVICES</h3>
                                                        </div>
                                                        <div class="component-body">
                                                            <p> {{ $companyProfile->services }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="component-section">
                                                        <div class="component-heading">
                                                            <h3>COMPANY PROJECTS</h3>
                                                        </div>
                                                        <div class="component-body">
                                                            <p> {{ $companyProfile->projects }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- ========================================================== COMPANY ABOUT/SERVICE/PROJECT ==================================== --}}

                                        {{-- ========================== INDUSTRY CERTIFICATION / CONTACT DETAILS / OPERATING LOCATIONS =================================== --}}
                                        <div class="wrap-company-service-project">
                                            <div class="row">

                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="component-section">
                                                        <div class="component-heading">
                                                            <h3>CONTACT DETAILS</h3>
                                                        </div>
                                                        <div class="component-body">
                                                            @if(isset($companyProfile->email))
                                                            <p><i class="fa fa-envelope-o" aria-hidden="true"></i> {{$companyProfile->email}}</p>
                                                            @endif
                                                            @if(isset($companyProfile->phone_1))
                                                            <p><i class="fa fa-phone" aria-hidden="true"></i> {{$companyProfile->phone_1}}</p>
                                                            @endif
                                                            @if(isset($companyProfile->phone_2))
                                                            <p><i class="fa fa-phone" aria-hidden="true"></i> {{$companyProfile->phone_2}}</p>
                                                            @endif
                                                            @if(isset($companyProfile->website))
                                                            <p><i class="fa fa-globe" aria-hidden="true"></i> {{$companyProfile->website}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="component-section">
                                                        <div class="component-heading">
                                                            <h3>OPERATING LOCATIONS</h3>
                                                        </div>
                                                        <div class="component-body">
                                                            @foreach($companyProfile->locations as $location)
                                                                <p class="clearfix">
                                                                    <span class="loc-icon">
                                                                        <i class="fa fa-pencil-square" aria-hidden="true"> {{ $location->name }} </i>
<!--                                                                        <i class="fa fa-map-marker" aria-hidden="true"> {{ $location->street_address_1 }} {{ $location->street_address_2 }}</i>-->
                                                                    </span>
                                                                    <span class="desc"><br /> {{ $location->phone }} {{ $location->email }}
                                                                    </span>
                                                                </p>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

<!--                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="component-section">
                                                        <div class="component-heading">
                                                            <h3>INDUSTRY CERTIFICATION</h3>
                                                        </div>
                                                        <div class="component-body">
                                                            <p> At neque asperiores fugiat, pariatur? Sit magnam lorem nihil rerum repudiandae fuga. Nisi nesciunt.</p>
                                                        </div>
                                                    </div>
                                                </div>-->

                                            </div>
                                        </div>
                                        {{-- ========================== INDUSTRY CERTIFICATION / CONTACT DETAILS / OPERATING LOCATIONS =================================== --}}

                                        {{-- ========================================================== GALLERY ========================================================== --}}
                                        @if($companyProfile->gallery->count())
                                        <div class="wrap-gallery">
                                            <div class="row">
                                                <div class="col-md-12 clearfix">
                                                    <div class="col-md-12">
                                                    <div class="wrapper">
                                                        <div class="jcarousel-wrapper">
                                                                <div class="jcarousel" data-jcarousel="true">
                                                                    <ul>
                                                                        @foreach($companyProfile->gallery as $gallery)
                                                                            <li><img src="{{$gallery->url}}" alt="{{$gallery->name}}"></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>

                                                                <a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true">‹</a>
                                                                <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true">›</a>
                                                            </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        {{-- ========================================================== GALLERY ========================================================== --}}

                                        
                                        
                                        {{-- ========================================================== DOCUMENT ========================================================== --}}
                                        <div class="wrap-document">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="component-section">
                                                        <div class="component-body">
                                                            <div class="component-heading" id="docs">
                                                                <h3>Document</h3>
                                                            </div>


                                                            <div class="component-body">
                                                                <div class="row">
                                                                    @foreach($companyProfile->documents as $document)
                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                            <div class="documents clearfix">
                                                                                <div class="doc-details">
                                                                                    <div class="doc-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
                                                                                    <div class="file-details">
                                                                                        <a data-toggle="modal" href="#documentPreviewModal_0">{{$document->name}}</a>
                                                                                        <br>
                                                                                        <small>{{$document->size/1024}}KB</small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- ========================================================== DOCUMENT ========================================================== --}}

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- ================================= COMPANY PROFILE MODAL ===================== -->



    </div>
    <!-- END CONTENT BODY -->
</div>
        <div class="modal fade" id="quoates" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <form role="form" name="quoatesAdd" id="quoatesAdd" method="POST" onsubmit="return modalFormValidationAndSave('quoatesAdd', '{{route('supplier_quotes')}}');"{{-- action="{{ route('supplier_quotes') }}" --}}class="form-horizontal">
{{--
   <form onsubmit="return modalFormValidationAndSave('quoatesAdd', '{{route('supplier_quotes')}}');"  role="form" action="{{ route('supplier_location') }}" name="supplier_location" id="supplier_location" method="POST" class="form-horizontal">
--}}


                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true"></button>
                            <h4 class="modal-title">Create Quote</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group {{ $errors->has('price')?'has-error':'' }}">
                                <label class="control-label col-md-4">Price<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="" id="price" name="price">
                                    @if($errors->has('price'))
                                        <span class="help-block has-error"> {{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('expiry_date')?'has-error':'' }}">
                                <label class="control-label col-md-4">Expiry Date<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                    <input class="form-control form-control-inline  date-picker" size="16" type="text" name="expiry_date" id="expiry_date" value="" />
                                    @if($errors->has('expiry_date'))
                                        <span class="help-block has-error"> {{ $errors->first('expiry_date') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Quote Description<span class="required" aria-required="true">  </span></label>
                                <div class="col-md-8">
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old("description") }}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="is_drafted" id="is_drafted" value="0">

                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="job_request_id" value="{{$jobRequest['id']}}">

                        </div>
                        <div class="modal-footer">
                            <!-- <button type="submit" name="save" id="save" class="btn yellow">Save</button> -->
                            <button type="submit" name="submit" id="submit" class="btn green">Submit</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
     {{--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">
            $('#save').click(function(){
                $('#is_drafted').val('1');
                $('#quoates').submit();
            });

            $('#submit').click(function(){
                $('#is_drafted').val('0');
                $('#quoates').submit();
            });
        </script>--}}
        {{--e-MODAL-MATERIAL --}}
@endsection

@section('scripts')
    <script src="/assets/pages/scripts/supplier-job-request-validations.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });
        });
    </script>
@endsection
