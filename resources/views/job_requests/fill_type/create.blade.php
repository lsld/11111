@extends('layouts.master')

@section('scripts')
    <script src="/js/job_request.js" type="text/javascript"></script>
    <script src="/js/form_validation.js" type="text/javascript"></script>
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
                        @if(isset($fill_data))
                            <h1 class="ccf-page-title">Edit Job Requests - Fill</h1>
                        @else
                            <h1 class="ccf-page-title">Create Job Requests - Fill</h1>
                        @endif
                        <p>Create the job requests you want supplier to quote for:</p>
                    </div>

                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->

                        @if(isset($fill_data))
                            <form onsubmit="return formValidationGeneral('fill-request-form', '{{route('hirer-portal-fill-ajax-validation')}}');" id="fill-request-form" method="post" class="form-horizontal" action="{{route('hirer-portal-fill-update', $id)}}">
                            <input name="_method" type="hidden" value="PUT">
                        @else
                            <form onsubmit="return formValidationGeneral('fill-request-form', '{{route('hirer-portal-fill-ajax-validation')}}');" id="fill-request-form" method="post" class="form-horizontal" action="{{route('hirer-portal-fill-store')}}">
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
                                                            <input type="text"  class="form-control" placeholder="" name="street_address" value="{{ old("street_address", isset($fill_data['street_address'])? $fill_data['street_address']: null ) }}">
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
                                                            <input type="text"  class="form-control" placeholder="" name="suburb" value="{{ old("suburb", isset($fill_data['suburb'])? $fill_data['suburb']:null) }}">
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
                                                            <input type="text"  class="form-control" placeholder="" name="post_code" value="{{ old("post_code", isset($fill_data['post_code'])? $fill_data['post_code']: null) }}">
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
                                                            if(isset($fill_data['state_id'])){
                                                                $state_id = $fill_data['state_id'];
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
                                                            if(isset($fill_data['regions_id'])){
                                                                $regions_id = $fill_data['regions_id'];
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
                                                            if(isset($fill_data['duration'])){
                                                                $duration = $fill_data['duration'];
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
                                                            if(isset($fill_data['expiry_date'])){
                                                                $expiry_date = date('m/d/Y', strtotime($fill_data['expiry_date']));
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
                                                            <textarea  name="description" id="" cols="60" rows="10" class="form-control">{{ old("description", isset($fill_data['description'])? $fill_data['description']:null) }}</textarea>
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
                                                <div class="col-md-6">
                                                    <h3>Date Required</h3>
                                                    <div class="form-group {{ $errors->has('required_date')?'has-error':'' }}">
                                                        <label class="control-label">Required Date<span class="required" aria-required="true"> * </span></label>
                                                        <div>
                                                            <?php
                                                            $required_date = null;
                                                            if(isset($fill_data['fill_rest_data']['required_date'])){
                                                                $required_date = date('m/d/Y', strtotime($fill_data['fill_rest_data']['required_date']));
                                                            }
                                                            ?>

                                                            <input name="required_date" value="{{ old("required_date", $required_date) }}"  class="form-control form-control-inline  date-picker" size="16" type="text" value="" />
                                                            @if($errors->has('required_date'))
                                                                <span class="help-block has-error"> {{ $errors->first('expiry_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h3>Quantity</h3>
                                                    <div class="form-group {{ $errors->has('quantity')?'has-error':'' }}">
                                                        <label class="control-label">Quantity<span class="required" aria-required="true"> * </span></label>
                                                        <div >
                                                            <input type="text"
                                                                   class="form-control" placeholder="Quantity"
                                                                   name="quantity"
                                                                   value="{{ old("quantity", isset($fill_data['fill_rest_data']['quantity'])? $fill_data['fill_rest_data']['quantity']: null) }}">
                                                            @if($errors->has('quantity'))
                                                                <span class="help-block has-error"> {{ $errors->first('quantity') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <h3>Number Of Sites</h3>
                                                    <div class="form-group {{ $errors->has('number_of_sites')?'has-error':'' }}">
                                                        <label class="control-label">Number Of Sites<span class="required" aria-required="true"> * </span></label>
                                                        <div >
                                                            <input type="text"
                                                                   class="form-control" placeholder="Number Of Sites"
                                                                   name="number_of_sites"
                                                                   value="{{ old("number_of_sites", isset($fill_data['fill_rest_data']['number_of_sites'])? $fill_data['fill_rest_data']['number_of_sites']: null) }}">
                                                            @if($errors->has('number_of_sites'))
                                                                <span class="help-block has-error"> {{ $errors->first('number_of_sites') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <h3>Fill Type</h3>
                                                    <div class="form-group {{ $errors->has('fill_type')?'has-error':'' }}">
                                                        <label class="control-label">Fill Type<span class="required" aria-required="true"> * </span></label>
                                                        <div >

                                                            <select name="fill_type" id="" class="form-control" >
                                                                <option value="">select</option>
                                                                <?php
                                                                $fill_types = null;
                                                                if(isset($fill_data['fill_rest_data']['fill_type'])){
                                                                    $fill_types = $fill_data['fill_rest_data']['fill_type'];
                                                                }
                                                                ?>
                                                                @foreach($fill_type as $key => $fd)
                                                                    <option value="{{$fd->id}}" {{ old('fill_type', $fill_types)==$fd->id?'selected':'' }}>{{$fd->name}}</option>
                                                                @endforeach
                                                            </select>

                                                            @if($errors->has('fill_type'))
                                                                <span class="help-block has-error"> {{ $errors->first('fill_type') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <h3>Can load and Carry</h3>
                                                    <div class="form-group {{ $errors->has('can_load_and_carry')?'has-error':'' }}">
                                                        <label class="control-label">Can load and Carry<span class="required" aria-required="true"> * </span></label>
                                                        <div >
                                                            <?php
                                                            $can_load_and_carry = null;
                                                            if(isset($fill_data['fill_rest_data']['can_load_and_carry'])){
                                                                $can_load_and_carry = $fill_data['fill_rest_data']['can_load_and_carry'];
                                                            }
                                                            ?>



                                                                <label class="mt-radio">
                                                                    <input
                                                                           @if(old('can_load_and_carry', $can_load_and_carry)==1)
                                                                                checked="checked"
                                                                           @endif
                                                                           type="radio" value="1" name="can_load_and_carry"> Yes<br>
                                                                    <span></span>
                                                                </label><br>

                                                                <label class="mt-radio">
                                                                    <input
                                                                           @if(old('can_load_and_carry', $can_load_and_carry)==0)
                                                                                checked="checked"
                                                                           @endif
                                                                           type="radio" value="0" name="can_load_and_carry"> No
                                                                    <span></span>
                                                                </label>
                                                                @if($errors->has('can_load_and_carry'))
                                                                    <span class="help-block has-error"> {{ $errors->first('can_load_and_carry') }}</span>
                                                                @endif
                                                        </div>
                                                    </div>

                                                    <div style="display: none;" id="distance_dev_id" class="form-group {{ $errors->has('distance')?'has-error':'' }}">
                                                        <label class="control-label">Distance</label>
                                                        <div >
                                                            <input type="text"
                                                                   class="form-control" placeholder=""
                                                                   name="distance"
                                                                   value="{{ old("distance", isset($fill_data['fill_rest_data']['distance'])? $fill_data['fill_rest_data']['distance']: null) }}">
                                                            @if($errors->has('distance'))
                                                                <span class="help-block has-error"> {{ $errors->first('distance') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <h3>Fill Quality</h3>
                                                    <div class="form-group {{ $errors->has('fill_quality')?'has-error':'' }}">
                                                        <label class="control-label">Fill Quality<span class="required" aria-required="true"> * </span></label>
                                                        <div >
                                                            <input type="text"
                                                                   class="form-control" placeholder=""
                                                                   name="fill_quality"
                                                                   value="{{ old("fill_quality", isset($fill_data['fill_rest_data']['fill_quality'])? $fill_data['fill_rest_data']['fill_quality']: null) }}">

                                                            @if($errors->has('fill_quality'))
                                                                <span class="help-block has-error"> {{ $errors->first('fill_quality') }}</span>
                                                            @endif
                                                        </div>
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
                                                    @if(isset($fill_data))
                                                        <button type="submit" class="btn green ">Update</button>
                                                    @else
                                                        <button type="submit" class="btn green ">Create</button>
                                                    @endif

                                                    {{-- <button type="button" class="btn default">Cancel</button>--}}
                                                </div>
                                            </div>
                                        </div>

                                <div id="response"></div>

                                    </form>
                                    <!-- END FORM-->
                    </div>
                </div>

            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>



@endsection