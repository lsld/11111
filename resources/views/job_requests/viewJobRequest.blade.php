@extends('layouts.master')

@section('content')



        <!-- BEGIN CONTENT -->
<div class="page-content-wrapper portal view-job-request">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <!-- =================================================== BREADCRUMB =================================================== -->

    @include('partials.page_breadcrumb')

        <!-- =================================================== CCF FORM ===================================================== -->
        <div class="wrap-ccf-form">
            <!-- =============================================== CONTENT CONTAINER ============================================ -->
            <div class="portlet light">
                <!-- =========================================== CCF PAGE TITLE =============================================== -->
                <div class="wrap-ccf-page-title">
                    <h1 class="ccf-page-title">View Job Request</h1>
                </div>
                <!-- =========================================== CCF PAGE TITLE =============================================== -->

                <!-- =========================================== CCF FORM BODY =============================================== -->
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img class="img-responsive" src="{{($companyProfile->logo)?$companyProfile->logo:"../../../assets/pages/img/download.jpg"}}" alt="company logo">
                                </div>
                                <div class="col-sm-5">
                                    <div class="section-heading clearfix">
                                        <h1 class="ccf-page-title">{{isset($companyProfile->name)?$companyProfile->name:""}}</h1>
                                        <hr/>
                                    </div>

                                    <div class="heading-company-details">
                                        {{--<h4>Heavy Machinery</h4>--}}

                                        @if(isset($jobRequest['state']['short_code']))
                                            <p>
                                                <label><strong>Service Areas:</strong></label>
                                                <br/>
                                                <label class="highlighted-box bg-purple-intense">{{$jobRequest['state']['short_code']}}</label>
                                                <label class="highlighted-box bg-purple-intense">{{$jobRequest['state']['short_code']}}</label>
                                            </p>
                                        @endif

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


                                    <p>
                                        @if(isset($companyProfile->phone_1))
                                            <label class="mg-right"><i class="fa fa-phone" aria-hidden="true"></i>{{$companyProfile->phone_1}}</label>
                                        @endif
                                        @if(isset($companyProfile->email))
                                            <label><i class="fa fa-envelope" aria-hidden="true"></i>{{$companyProfile->email}}</label>
                                        @endif
                                    </p>
                                    <p>
                                        @if(isset($companyProfile->phone_2))
                                            <label class="mg-right"><i class="fa fa-phone" aria-hidden="true"></i>{{$companyProfile->phone_2}}</label>
                                        @endif
                                        <label><a href="#">{{isset($companyProfile->website)?$companyProfile->website:""}}</a></label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =========================================== CCF FORM BODY =============================================== -->
            </div>
            <!-- =============================================== CONTENT CONTAINER ============================================ -->
        </div>
        <!-- =================================================== CCF FORM ===================================================== -->


        <hr>

        <div class="row">
        <div class="col-sm-6">
            @if(isset($jobRequest['job_type']['name']))
                <label class="mg-right"><strong>Request # </strong></label> <label class="mg-right">{{$jobRequest['job_type']['name']}}</label> <label> {{$jobRequest['status']}}</label>
            @endif
        </div>
    </div>

        <div class="row">
            <div class="col-sm-4">
                @if(isset($jobRequest['state']['name']))
                    <p><strong>State:</strong> {{$jobRequest['state']['name']}}</p>
                @endif
                @if(isset($jobRequest['suburb']))
                    <p><strong>Suburb:</strong> {{$jobRequest['suburb']}}</p>
                @endif
            </div>
            <div class="col-sm-4">
                @if(isset($jobRequest['regions']['name']))
                    <p><strong>Region:</strong> {{$jobRequest['regions']['name']}}</p>
                @endif
                @if(isset($jobRequest['post_code']))
                    <p><strong>Post Code:</strong> {{$jobRequest['post_code']}}</p>
                @endif
            </div>
            <div class="col-sm-4">
                @if(isset($jobRequest['street_address']))
                    <p><strong>Street:</strong> {{$jobRequest['street_address']}}</p>
                @endif
            </div>
        </div>
        @if(isset($jobRequest['plant_hire']))
        @foreach($jobRequest['plant_hire'] as $requestItem)
            <div class="row">
                <div class="col-sm-4">
                    @if(isset($requestItem['equipment_type']['label']))
                        <p><strong>Machine Type:</strong> {{$requestItem['equipment_type']['label']}}</p>
                    @endif
                    @if(isset($requestItem['work_type']['label']))
                        <p><strong>Work Type:</strong> {{$requestItem['work_type']['label']}}</p>
                    @endif
                </div>
            </div>
{{--        {{dd($requestItem['properties'])}}--}}
            @foreach($requestItem['properties'] as $property)
                <div class="row">
                    <div class="col-sm-4">
                        @if($property['type'] == "text")
                            <p><strong>{{isset($property['dynamic_property']['label'])?$property['dynamic_property']['label']:""}}:</strong>
                                {{isset($property['text']['value'])?$property['text']['value']:""}}
                            </p>
                        @endif
                        @if($property['type'] == "RB")
                            <p><strong>{{isset($property['dynamic_property']['label'])?$property['dynamic_property']['label']:""}}:</strong>
                                @if(isset($property['radio_button']['option']))
                                    @foreach($property['radio_button']['option'] as $option)
                                        {{isset($option['option'])?$option['option']:""}}
                                    @endforeach
                                @endif
                            </p>
                        @endif
                        @if($property['type'] == "DD")
                            <p><strong>{{isset($property['dynamic_property']['label'])?$property['dynamic_property']['label']:""}}:</strong>
                                @if(isset($property['dropdown']['option']))
                                    @foreach($property['dropdown']['option'] as $option)
                                        {{isset($option['option'])?$option['option']:""}}
                                    @endforeach
                                @endif
                            </p>
                        @endif
                        @if($property['type'] == "MS")
                            <p><strong>{{isset($property['dynamic_property']['label']) ? $property['dynamic_property']['label']:" "}}:</strong>

                            @if(isset($property['multi_select']))
                                    @foreach($property['multi_select'] as $option)
                                        {{isset($option['option'][0]['option'])?$option['option'][0]['option']."/":""}}
                                    @endforeach
                                @endif
                            </p>
                        @endif
                    </div>
                </div>
             @endforeach
        @endforeach
        @endif

        @if(isset($jobRequest['material_rest_data']))
            <div class="row">
                <div class="col-sm-4">
                    @if(isset($jobRequest['material_rest_data']['material_type']))
                        <p><strong>Resource type:</strong>
                            {{isset($jobRequest['material_rest_data']['material_type']['name'])?$jobRequest['material_rest_data']['material_type']['name']:""}}
                        </p>
                    @endif
                    @if(isset($jobRequest['material_rest_data']['condition']))
                        <p><strong>Condition:</strong>
                        @if($jobRequest['material_rest_data']['condition'] == 1)
                            {{"Apply"}}
                        @else
                            {{"Not Apply"}}
                        @endif
                        </p>
                    @endif
                    @if(isset($jobRequest['material_rest_data']['quantity']))
                       <p><strong>Quantity:</strong>
                           {{isset($jobRequest['material_rest_data']['quantity'])?$jobRequest['material_rest_data']['quantity']:""}}
                       </p>
                    @endif
                </div>
            </div>
        @endif

        @if(isset($jobRequest['fill_rest_data']))
            <div class="row">
                <div class="col-sm-4">
                    @if(isset($jobRequest['fill_rest_data']['required_date']))
                        <p><strong>Required Date:</strong>
                            {{isset($jobRequest['fill_rest_data']['required_date'])?$jobRequest['fill_rest_data']['required_date']:""}}
                        </p>
                    @endif
                    @if(isset($jobRequest['fill_rest_data']['number_of_sites']))
                        <p><strong>Number Of Sites:</strong>
                            {{isset($jobRequest['fill_rest_data']['number_of_sites'])?$jobRequest['fill_rest_data']['number_of_sites']:""}}
                        </p>
                    @endif
                    @if(isset($jobRequest['fill_rest_data']['can_load_and_carry']))
                        <p><strong>Can load and Carry:</strong>
                            @if($jobRequest['fill_rest_data']['can_load_and_carry'] == 1)
                                {{"yes"}}
                                <strong>Distance:</strong>
                                {{isset($jobRequest['fill_rest_data']['distance'])?$jobRequest['fill_rest_data']['distance']:""}}
                            @else
                                {{"No"}}
                            @endif
                        </p>

                    @endif
                </div>
                <div class="col-sm-4">
                    @if(isset($jobRequest['fill_rest_data']['quantity']))
                        <p><strong>Quantity:</strong>
                            {{isset($jobRequest['fill_rest_data']['quantity'])?$jobRequest['fill_rest_data']['quantity']:""}}
                        </p>
                    @endif
                    @if(isset($jobRequest['fill_rest_data']['fill_type']))
                        <p><strong>Fill Type:</strong>
                            {{isset($jobRequest['fill_rest_data']['fill_type']['name'])?$jobRequest['fill_rest_data']['fill_type']['name']:""}}
                        </p>
                    @endif
                    @if(isset($jobRequest['fill_rest_data']['fill_quality']))
                        <p><strong>Fill Quality:</strong>
                            {{isset($jobRequest['fill_rest_data']['fill_quality'])?$jobRequest['fill_rest_data']['fill_quality']:""}}
                        </p>
                    @endif
                </div>
            </div>
        @endif

        <p>{{isset($jobRequest['description'])?$jobRequest['description']:""}}</p>

        <div class="row">
            <div class="col-sm-12">
                @if(isset($jobRequest['duration']))
                    <div class="pull-left mg-right"><strong><i class="fa fa-clock-o" aria-hidden="true"></i> Duration:</strong>{{isset($jobRequest['duration'])?$jobRequest['duration']:""}}</div>
                @endif
                @if(isset($jobRequest['expiry_date']))
                    <div class="pull-left"><strong><i class="fa fa-clock-o" aria-hidden="true"></i> Request Expires:</strong>{{isset($jobRequest['expiry_date'])?$jobRequest['expiry_date']:""}}</div>
                @endif
            </div>
        </div>

        <hr>

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
    <!-- END CONTENT BODY -->
</div>

        <div class="modal fade" id="quoates" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <form role="form" name="quoates" id="quoates" method="POST" action="{{ route('supplier_quotes') }}" class="form-horizontal">
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
                                    <input type="text" class="form-control" placeholder="" id="price" name="price" value="{{ old("price") }}">
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
                            <input type="hidden" name="is_drafted" id="is_drafted" value="">

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">
            $('#save').click(function(){
                $('#is_drafted').val('1');
                $('#quoates').submit();
            });

            $('#submit').click(function(){
                $('#is_drafted').val('0');
                $('#quoates').submit();
            });
        </script>
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
