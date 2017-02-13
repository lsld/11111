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
<!--                                        <h1 class="ccf-page-title"><a data-toggle="modal" href="#companyprofilepopup" class="jc-reload">{{isset($companyProfile->name)?$companyProfile->name:""}}</a></h1>-->
                                        <h1 class="ccf-page-title">{{isset($companyProfile->name)?$companyProfile->name:""}}</h1>
                                        <hr/>
                                    </div>

                                    <div class="heading-company-details">
                                        {{--<h4>Heavy Machinery</h4>--}}
                                        <div class="row">
                                            @if(isset($jobRequest['state']['short_code']))

                                               <div class="col-md-4">
                                                    <h5><strong>Service Areas:</strong></h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><span class="ghost-box outline-box cg-blue">{{$jobRequest['state']['short_code']}}</span></p>
                                                </div>

                                            @endif
                                        </div>

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
                                                    <label><i class="fa fa-globe" aria-hidden="true"></i> <a href="#"> {{isset($companyProfile->website)?$companyProfile->website:""}}</a></label>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-4 time-duration">
                                    <div class="row">
                                        @if(isset($jobRequest['job_type']['name']))
                                            <div class="col-md-6">
                                                <p>Request # {{$id}}</p>
                                            </div>
                                            <div class="col-md-6"><p>{{$jobRequest['job_type']['name']}}  <label>( {{$jobRequest['status']}} )</label></p></div>
                                        @endif
                                    </div>
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
                                            @if($property['type'] == "CB")
                                                    <div class="col-sm-4 time-duration">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>{{isset($property['dynamic_property']['label'])?$property['dynamic_property']['label']:""}}</p>
                                                                <p>{{isset($property['service_dynamic_property']['label'])?$property['service_dynamic_property']['label']:""}}</p>
                                                            </div>
                                                            @if(isset($property['check_box']))
                                                                <div class="col-md-6">
                                                                    @if($property['check_box']['checked'])
                                                                        yes
                                                                    @else
                                                                        no
                                                                    @endif
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
                                                    <p>Resource type</p>
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

                        {{-- ====================================== TABLE ============================= --}}


                        <div class="form-body">

                            @if(!($quoteByJobRequest->isEmpty()))
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Request</th>
                                        <th>Quote</th>
                                        <th>Company Name</th>
                                        <th>Quote Price</th>
                                        <th>Date Submitted</th>
                                        <th>Quote Expiration Date</th>
                                        <th>Request Expiration Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>

                                        <tbody>
                                        @foreach($quoteByJobRequest as $quote)
                                            <script type="text/javascript">
                                            </script>
                                            <tr>
                                                <td>{{$quote->JobRequest->id }}</td>
                                                <td>{{$quote->code }}</td>
                                                <td>{{isset($companyProfile->name)?$companyProfile->name:""}}</td>
                                                <td>{{$quote->price }}</td>
                                                <td>{{$quote->created_at }}</td>
                                                <td>{{$quote->expiry_date }}</td>
                                                <td>{{$quote->JobRequest->expiry_date }}</td>

                                                <td class="status-shown"><span class="color-view bg-purple-seance bg-font-purple-seance status-{{$quote->status}}">{{$quote->status}}</span></td>

                                                <td>
{{--
                                                    <a  href="{{ route('view-quote', [$quote->tenant_id,$quote->id ])}}"  class="btn btn-xs btn-default" title="View" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i></a>
--}}
                                                    <a  href="{{ route('view-quote', $quote->id )}}"  class="btn btn-xs btn-default" title="View" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                </table>
                            </div>
                            @else
                                <div class="col-md-12">
                                    Information Is Not Available.
                                </div>
                            @endif
                        </div>



                        {{-- ====================================== TABLE ============================= --}}




                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            {{-- ================================= TABLE ===================================== --}}



        </div>
        <!-- END CONTENT BODY -->
    </div>

@endsection
