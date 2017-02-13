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
                            @if(isset($plant_hire_data))
                                <h1 class="ccf-page-title">Edit Job Requests - Plant Hire</h1>
                            @else
                                <h1 class="ccf-page-title">Create Job Requests - Plant Hire</h1>
                            @endif
                            <p>Create the job requests you want supplier to quote for:</p>
                        </div>

                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            @if(isset($plant_hire_data))
                                <form onsubmit="return formValidationGeneral('plant-hire-request-form', '{{route('hirer-portal-plant-hire-ajax-validation')}}');" id="plant-hire-request-form" method="post" class="form-horizontal" action="{{route('hirer-portal-plant-hire-update', $id)}}">
                                    <input name="_method" type="hidden" value="PUT">
                            @else
                                <form onsubmit="return formValidationGeneral('plant-hire-request-form', '{{route('hirer-portal-plant-hire-ajax-validation')}}');" id="plant-hire-request-form" method="post" class="form-horizontal" action="{{route('hirer-portal-plant-hire-store')}}">
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
                                                    <input type="text"  class="form-control" placeholder="" name="street_address" value="{{ old("street_address", isset($plant_hire_data['street_address'])? $plant_hire_data['street_address']: null ) }}">
                                                    @if($errors->has('street_address'))
                                                        <span class="help-block has-error cus-error-block"> This Filed is required.</span>
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
                                                    <input type="text"  class="form-control" placeholder="" name="suburb" value="{{ old("suburb", isset($plant_hire_data['suburb'])? $plant_hire_data['suburb']:null) }}">
                                                    @if($errors->has('suburb'))
                                                        <span class="help-block has-error cus-error-block"> This Filed is required.</span>
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
                                                    <input type="text"  class="form-control" placeholder="" name="post_code" value="{{ old("post_code", isset($plant_hire_data['post_code'])? $plant_hire_data['post_code']: null) }}">
                                                    @if($errors->has('post_code'))
                                                        <span class="help-block has-error"> {{ $errors->first('post_code') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--===== FILED ====== --}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            {{--===== FILED ====== --}}
                                            <div class="form-group {{ $errors->has('state_id')?'has-error':'' }}">
                                                <label class="control-label">State<span class="required" aria-required="true"> * </span></label>
                                                <div>

                                                    <?php
                                                    $state_id = null;
                                                    if(isset($plant_hire_data['state_id'])){
                                                        $state_id = $plant_hire_data['state_id'];
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
                                                <div>
                                                    <?php
                                                    $regions_id = null;
                                                    if(isset($plant_hire_data['regions_id'])){
                                                        $regions_id = $plant_hire_data['regions_id'];
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
                                                    if(isset($plant_hire_data['duration'])){
                                                        $duration = $plant_hire_data['duration'];
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
                                                        if(isset($plant_hire_data['expiry_date'])){
                                                            $expiry_date = date('m/d/Y', strtotime($plant_hire_data['expiry_date']));
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
                                                    <textarea  name="description" id="" cols="60" rows="8" class="form-control">{{ old("description", isset($plant_hire_data['description'])? $plant_hire_data['description']:null) }}</textarea>
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
                                            <h3>Request Item</h3>
                                            <input id="request-item-table-id" value="{{route('request-item-table')}}" type="hidden">
                                            <div class="table-scrollable" id="request_item_table">
                                                @if(isset($item_data))
                                                    @include('job_requests.plant-hire.request_item', [ 'item_data' => $item_data ])
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">

                                                    <a id="add_item_btn" class="btn theme-btn" data-toggle="modal" href="#descModal">Add Item</a>
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
                                            @if(isset($plant_hire_data))
                                                <button type="submit" class="btn theme-btn ">Update</button>
                                            @else
                                                <button type="submit" class="btn theme-btn ">Create</button>
                                            @endif

                                            {{-- <button type="button" class="btn default">Cancel</button>--}}
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>

            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>



    {{-- s-MODAL COMPANY PROFILE--}}
    <div class="modal fade" id="descModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <form onsubmit="return false;" id="plant_hire_adda_item_form" action="{{route('hire-potal-store-add-item')}}" method="post">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add Item</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal">

                            <div class="form-group {{ $errors->has('additem_item')?'has-error':'' }}">
                                <label class="col-md-4">Equipment Type<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                    <select name="property_id" id="main_property_id" class="form-control">
                                        <option value="">select</option>
                                        @foreach( $properties as $property)
                                            <option value="{{ $property->id }}" {{ old('property_id')==$property->id?'selected':'' }}>{{ $property->label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('additem_item'))
                                        <span class="help-block has-error"> {{ $errors->first('additem_item') }}</span>
                                    @endif
                                </div>
                            </div>

                            <input type="hidden" id="load_url" value="{{route("plant-hire-load-dynamic-properties")}}" />
                            <input type="hidden" id="delete_url" value="{{route("hirer-portal-remove-item")}}" />

                            <div id="rest_properties_form">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn theme-btn" id="item_save_button" style="display: none;">Update & Save</button>
                    </div>

                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- e-MODAL COMPANY PROFILE--}}

    {{-- s-MODAL COMPANY PROFILE--}}
    <div class="modal fade" id="editRequestItem" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <form role="form" method="POST" action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Update Request Item</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="form-group {{ $errors->has('additem_item')?'has-error':'' }}">
                                <label class="control-label col-md-4">Lable Name<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                    <select name="" id="" class="form-control">
                                        <option value="">select</option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                    @if($errors->has('additem_item'))
                                        <span class="help-block has-error"> {{ $errors->first('additem_item') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn theme-btn">Update & Save</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- e-MODAL COMPANY PROFILE--}}

@endsection