@extends('layouts.master')

@section('scripts')
    <script src="/js/job_request.js" type="text/javascript"></script>
@stop

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper portal ">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- FORM -->

            @include('partials.page_breadcrumb')

            <div class="wrap-ccf-form">


                {{--{{ csrf_field() }}--}}
                <div class="portlet light bordered">
                    <div class="wrap-ccf-page-title">
                        @if(isset($service_data))
                            <h1 class="ccf-page-title">Edit Job Requests - Constructing</h1>
                        @else
                            <h1 class="ccf-page-title">Create Job Requests - Constructing</h1>
                        @endif
                        <p>Create the job requests you want supplier to quote for:</p>
                    </div>



                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->

                        @if(isset($service_data))
                            <form onsubmit="return formValidationGeneral('services-request-form', '{{route('hirer-portal-services-ajax-validation')}}');" id="services-request-form" method="post" class="form-horizontal" action="{{route('hirer-portal-services-update', $id)}}">
                            <input name="_method" type="hidden" value="PUT">
                        @else
                            <form onsubmit="return formValidationGeneral('services-request-form', '{{route('hirer-portal-services-ajax-validation')}}');" id="services-request-form"  method="post" class="form-horizontal" action="{{route('hirer-portal-services-store')}}">
                        @endif

                            {{ csrf_field() }}
                                <div class="form-body col-md-12 form-fileds-center">
                                    {{--============================================= LOCATION ==================================--}}
                                    <h3>Location</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            {{--===== FILED ====== --}}
                                            <div class="form-group {{ $errors->has('street_address')?'has-error':'' }}">
                                                <label class="control-label">Street<span class="required" aria-required="true"> * </span></label>
                                                <div>
                                                    <input type="text"  class="form-control" placeholder="" name="street_address" value="{{ old("street_address", isset($service_data['street_address'])? $service_data['street_address']: null ) }}">
                                                    @if($errors->has('street_address'))
                                                        <span class="help-block has-error"> {{ $errors->first('street_address') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--===== FILED ====== --}}
                                        </div>
                                        <div class="col-md-4">
                                            {{--===== FILED ====== --}}
                                            <div class="form-group {{ $errors->has('suburb')?'has-error':'' }}">
                                                <label class="control-label">Suburb<span class="required" aria-required="true"> * </span></label>
                                                <div>
                                                    <input type="text"  class="form-control" placeholder="" name="suburb" value="{{ old("suburb", isset($service_data['suburb'])? $service_data['suburb']:null) }}">
                                                    @if($errors->has('suburb'))
                                                        <span class="help-blocsuburbk has-error"> {{ $errors->first('suburb') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--===== FILED ====== --}}
                                        </div>
                                        <div class="col-md-4">
                                            {{--===== FILED ====== --}}
                                            <div class="form-group {{ $errors->has('post_code')?'has-error':'' }}">
                                                <label class="control-label">Post Code<span class="required" aria-required="true"> * </span></label>
                                                <div>
                                                    <input type="text"  class="form-control" placeholder="" name="post_code" value="{{ old("post_code", isset($service_data['post_code'])? $service_data['post_code']: null) }}">
                                                    @if($errors->has('post_code'))
                                                        <span class="help-block has-error"> {{ $errors->first('post_code') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--===== FILED ====== --}}
                                        </div>
                                        <div class="col-md-4">
                                            {{--===== FILED ====== --}}
                                            <div class="form-group {{ $errors->has('state_id')?'has-error':'' }}">
                                                <label class="control-label">State<span class="required" aria-required="true"> * </span></label>
                                                <div>
                                                    <?php
                                                    $state_id = null;
                                                    if(isset($service_data['state_id'])){
                                                        $state_id = $service_data['state_id'];
                                                    }
                                                    ?>
                                                    @include('dynamic.state_drop_down', [ 'states'=> $states, 'selected_val' => old('state_id', $state_id) ])

                                                    @if($errors->has('state_id'))
                                                        <span class="help-block has-error"> {{ $errors->first('state_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--===== FILED ====== --}}
                                        </div>
                                        <div class="col-md-4">
                                            {{--===== FILED ====== --}}
                                            <div class="form-group {{ $errors->has('regions_id')?'has-error':'' }}">
                                                <label class="control-label">Region<span class="required" aria-required="true"> * </span></label>
                                                <div >
                                                    <?php
                                                    $regions_id = null;
                                                    if(isset($service_data['regions_id'])){
                                                        $regions_id = $service_data['regions_id'];
                                                    }
                                                    ?>

                                                    @include('dynamic.regions_drop_down', [ 'regions'=> $regions, 'selected_val' => old('regions_id', $regions_id), 'state_id' => old('state_id', $state_id) ])
                                                    @if($errors->has('regions_id'))
                                                        <span class="help-block has-error"> {{ $errors->first('regions_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--===== FILED ====== --}}
                                        </div>
                                    </div>
                                    {{--============================================= LOCATION ==================================--}}
                                    <hr/>

                                    <div class="row">
                                        <div class="col-md-6">
                                            {{--============================================= DURATION ==================================--}}
                                            <h3>Duration</h3>
                                            <div class="form-group {{ $errors->has('duration')?'has-error':'' }}">
                                                <label class="control-label">Duration<span class="required" aria-required="true"> * </span></label>
                                                <div>
                                                    <?php
                                                    $duration = null;
                                                    if(isset($service_data['duration'])){
                                                        $duration = $service_data['duration'];
                                                    }
                                                    $duration_d = old('duration', $duration);
                                                    ?>
                                                    @include('dynamic.duration_drop_down', [ 'durations'=> $durations, 'selected_val' => old('duration', $duration) ])
                                                    @if($errors->has('duration'))
                                                        <span class="help-block has-error"> {{ $errors->first('duration') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--============================================= DURATION ==================================--}}

                                            {{--============================================= DURATION ==================================--}}
                                            <h3>Expires In</h3>
                                            <div class="form-group {{ $errors->has('expiry_date')?'has-error':'' }}">
                                                <label class="control-label">Expiry Date<span class="required" aria-required="true"> * </span></label>
                                                <div>
                                                    <?php
                                                    $expiry_date = null;
                                                    if(isset($service_data['expiry_date'])){
                                                        $expiry_date = date('m/d/Y', strtotime($service_data['expiry_date']));
                                                    }
                                                    ?>

                                                    <input name="expiry_date" value="{{ old("expiry_date", $expiry_date) }}"  class="form-control form-control-inline  date-picker" size="16" type="text" value="" />
                                                    @if($errors->has('expiry_date'))
                                                        <span class="help-block has-error"> {{ $errors->first('expiry_date') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--============================================= DURATION ==================================--}}
                                        </div>
                                        <div class="col-md-6">
                                            {{--============================================= DESCRIPTION ==================================--}}
                                            <h3>Description</h3>
                                            <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                                                <label class="control-label">Description<span class="required" aria-required="true"> * </span></label>
                                                <div >
                                                    <textarea  name="description" id="" cols="60" rows="8" class="form-control">{{ old("description", isset($service_data['description'])? $service_data['description']:null) }}</textarea>
                                                    @if($errors->has('description'))
                                                        <span class="help-block has-error"> {{ $errors->first('description') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--============================================= DESCRIPTION ==================================--}}

                                        </div>
                                    </div>
                                    <hr/>
                                    {{--============================================= TABLE ==================================--}}
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <h3>Type of Work</h3>
                                            <?php ///dd($service_data);
                                            $property_id = $property_id_d = null;
                                            if(isset($service_data['plant_hire'])){
                                                foreach ($service_data['plant_hire'] as $plant_hire){
                                                    $property_id_d = $plant_hire['properties_id'];
                                                }
                                            }
                                            $property_id = old("property_id", $property_id_d)
                                            ?>
                                            <div class="form-group ">
                                                <select name="property_id" id="constructing_main_property_id" class="form-control">
                                                    <option value="">select</option>
                                                    @foreach( $properties as $property)
                                                        <option value="{{ $property->id }}"
                                                                @if($property_id==$property->id)
                                                                    selected="selected"
                                                                @endif
                                                        >{{ $property->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input value="{{route('services-load-dynamic-properties')}}" type="hidden" name="load_url" id="load_url">

                                            <div class="form-group " id="rest_properties_form">

                                            </div>
                                        </div>
                                    </div>
                                    {{--============================================= TABLE ==================================--}}
                                </div>
                                <div class="form-actions col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 clearfix text-right">
                                                    <span id="validation_message_area" class="help-block has-error" style="display: none; "></span>
                                                    <a href="{{route('my-job-request')}}" class="btn green ">Cancel</a>
                                                    @if(isset($service_data))
                                                        <button type="submit" class="btn green ">Update</button>
                                                    @else
                                                        <button type="submit" class="btn green ">Create</button>
                                                    @endif

                                                    {{-- <button type="button" class="btn default">Cancel</button>--}}
                                                </div>
                                            </div>
                                        </div>
                            </form>
                    </div>
                </div>

            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>



@endsection