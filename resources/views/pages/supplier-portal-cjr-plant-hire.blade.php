@extends('layouts.master')

@section('content')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper portal ">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        @include('partials.page_breadcrumb')

        <div class="wrap-ccf-form">
            <form action="" class="form-horizontal" method="POST">

                {{--{{ csrf_field() }}--}}
                <div class="portlet light bordered">
                   <div class="wrap-ccf-page-title">
                       <h1 class="ccf-page-title">Create Job Requests - Plain Hire</h1>
                       <p>Create the job requests you want supplier to quote for:</p>
                   </div>



                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal">
                            <div class="form-body col-md-12 form-fileds-center">
                                {{--============================================= LOCATION ==================================--}}
                                <h3>Location</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        {{--===== FILED ====== --}}
                                        <div class="form-group {{ $errors->has('loc_street')?'has-error':'' }}">
                                            <label class="control-label">Street<span class="required" aria-required="true"> * </span></label>
                                            <div>
                                            <input type="text" class="form-control" placeholder="" name="loc_street" value="{{ old("loc_street") }}">
                                            @if($errors->has('loc_street'))
                                                <span class="help-block has-error"> {{ $errors->first('loc_street') }}</span>
                                            @endif
                                            </div>
                                        </div>
                                        {{--===== FILED ====== --}}
                                    </div>
                                    <div class="col-md-4">
                                        {{--===== FILED ====== --}}
                                        <div class="form-group {{ $errors->has('loc_suburb')?'has-error':'' }}">
                                            <label class="control-label">Suburb<span class="required" aria-required="true"> * </span></label>
                                            <div>
                                            <input type="text" class="form-control" placeholder="" name="loc_suburb" value="{{ old("loc_suburb") }}">
                                            @if($errors->has('loc_suburb'))
                                                <span class="help-block has-error"> {{ $errors->first('loc_suburb') }}</span>
                                            @endif
                                            </div>
                                        </div>
                                        {{--===== FILED ====== --}}
                                    </div>
                                    <div class="col-md-4">
                                        {{--===== FILED ====== --}}
                                        <div class="form-group {{ $errors->has('loc_post_code')?'has-error':'' }}">
                                            <label class="control-label">Post Code<span class="required" aria-required="true"> * </span></label>
                                            <div>
                                            <input type="text" class="form-control" placeholder="" name="loc_post_code" value="{{ old("loc_post_code") }}">
                                            @if($errors->has('loc_post_code'))
                                                <span class="help-block has-error"> {{ $errors->first('loc_post_code') }}</span>
                                            @endif
                                            </div>
                                        </div>
                                        {{--===== FILED ====== --}}
                                    </div>
                                    <div class="col-md-4">
                                        {{--===== FILED ====== --}}
                                        <div class="form-group {{ $errors->has('loc_state')?'has-error':'' }}">
                                            <label class="control-label">State<span class="required" aria-required="true"> * </span></label>
                                            <div>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="">select</option>
                                                </select>
                                                @if($errors->has('loc_state'))
                                                    <span class="help-block has-error"> {{ $errors->first('loc_state') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--===== FILED ====== --}}
                                    </div>
                                    <div class="col-md-4">
                                        {{--===== FILED ====== --}}
                                        <div class="form-group {{ $errors->has('loc_region')?'has-error':'' }}">
                                            <label class="control-label">Region<span class="required" aria-required="true"> * </span></label>
                                            <div >
                                            <select name="" id="" class="form-control">
                                                <option value="">Select</option>
                                                <option value="">select</option>
                                            </select>
                                            @if($errors->has('loc_region'))
                                                <span class="help-block has-error"> {{ $errors->first('loc_region') }}</span>
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
                                        <div class="form-group {{ $errors->has('loc_duration')?'has-error':'' }}">
                                            <label class="control-label">Duration<span class="required" aria-required="true"> * </span></label>
                                            <div>

                                            <select name="" id="" class="form-control">
                                                <option value="">select</option>
                                                <option value="">week 1</option>
                                                <option value="">week 2</option>
                                            </select>
                                            @if($errors->has('loc_duration'))
                                                <span class="help-block has-error"> {{ $errors->first('loc_duration') }}</span>
                                            @endif
                                            </div>
                                        </div>
                                        {{--============================================= DURATION ==================================--}}

                                        {{--============================================= DURATION ==================================--}}
                                        <h3>Duration</h3>
                                        <div class="form-group {{ $errors->has('loc_duration')?'has-error':'' }}">
                                            <label class="control-label">Duration<span class="required" aria-required="true"> * </span></label>
                                            <div>

                                            <input class="form-control form-control-inline  date-picker" size="16" type="text" value="" />
                                            @if($errors->has('loc_duration'))
                                                <span class="help-block has-error"> {{ $errors->first('loc_duration') }}</span>
                                            @endif
                                            </div>
                                        </div>
                                        {{--============================================= DURATION ==================================--}}
                                    </div>
                                    <div class="col-md-6">
                                        {{--============================================= DESCRIPTION ==================================--}}
                                         <h3>Description</h3>
                                        <div class="form-group {{ $errors->has('loc_desc')?'has-error':'' }}">
                                            <label class="control-label">Description<span class="required" aria-required="true"> * </span></label>
                                            <div >
                                            <textarea name="" id="" cols="60" rows="10" class="form-control"></textarea>
                                            @if($errors->has('loc_desc'))
                                                <span class="help-block has-error"> {{ $errors->first('loc_desc') }}</span>
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
                                        <div class="table-scrollable">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Item Type</th>
                                                    <th>Shift Per Day</th>
                                                    <th>Days Per Week</th>
                                                    <th>Hire Type</th>
                                                    <th>Accessories</th>
                                                    <th>Description</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>


                                                <tr>
                                                        <td>Grades</td>
                                                        <td>1</td>
                                                        <td>5</td>
                                                        <td>Dry Hire</td>
                                                        <td>Dolor.</td>
                                                        <td>Smooth Drum</td>
                                                        <td><a href="#editRequestItem" class="" data-toggle="modal">Edit</a> | <a href="">Delete</a></td>

                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <a class="btn blue" data-toggle="modal" href="#descModal">Add Item</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--============================================= TABLE ==================================--}}
                            </div>
                            <div class="form-actions col-md-12">
                                <div class="row">
                                    <div class="col-md-12 clearfix text-right">
                                        <button type="submit" class="btn green ">Cancel</button>
                                        <button type="submit" class="btn green ">Save</button>
                                        <button type="submit" class="btn green ">Create</button>
                                       {{-- <button type="button" class="btn default">Cancel</button>--}}
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>



{{-- s-MODAL COMPANY PROFILE--}}
<div class="modal fade" id="descModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form role="form" method="POST" action="">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Item</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        {{--===================== DROP DOWN =========================== --}}
                        <div class="form-group {{ $errors->has('additem_item')?'has-error':'' }}">
                            <label class="control-label col-md-4">Drop Down<span class="required" aria-required="true"> * </span></label>
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
                        {{--===================== DROP DOWN =========================== --}}

                        {{--===================== TEXT BOX =========================== --}}
                        <div class="form-group {{ $errors->has('textbox_error_id')?'has-error':'' }}">
                            <label class="control-label col-md-4">Text Box<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="" name="textbox_error_id" value="{{ old("textbox_error_id") }}">
                            @if($errors->has('textbox_error_id'))
                                <span class="help-block has-error"> {{ $errors->first('textbox_error_id') }}</span>
                            @endif
                            </div>
                        </div>
                        {{--===================== TEXT BOX =========================== --}}

                        {{--===================== TEXT AREA =========================== --}}
                        <div class="form-group {{ $errors->has('textarea_error_id')?'has-error':'' }}">
                            <label class="control-label col-md-4">Text Area<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-8">
                            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                            @if($errors->has('textarea_error_id'))
                                <span class="help-block has-error"> {{ $errors->first('textarea_error_id') }}</span>
                            @endif
                            </div>
                        </div>
                        {{--===================== TEXT AREA =========================== --}}

                        {{--===================== CHECK BOX =========================== --}}
                        <div class="form-group {{ $errors->has('chb_error_id')?'has-error':'' }}">
                            <label class="control-label col-md-4">Checkbox<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-8">

                            <label class="control-label mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" value="1" name="test">
                                <span></span>
                            </label>

                            @if($errors->has('chb_error_id'))
                                <span class="help-block has-error"> {{ $errors->first('chb_error_id') }}</span>
                            @endif
                            </div>
                        </div>
                        {{--===================== CHECK BOX =========================== --}}


                        {{--===================== CHECK BOX =========================== --}}
                        <div class="form-group {{ $errors->has('states_id')?'has-error':'' }}">
                            <label class="control-label col-md-4" for="multiple">Operating State(s)<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-8">

                                <select id="multiple" name="sss" class="form-control select2-multiple" multiple>
                                    <option value="AK">Alaska</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AK">Alaska</option><option value="AK">Alaska</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AK">Alaska</option>


                                </select>
                                @if($errors->has('states_id'))
                                    <span class="help-block has-error"> {{ $errors->first('states_id') }}</span>
                                @endif
                            </div>
                        </div>
                        {{--===================== CHECK BOX =========================== --}}


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn green">Update & Save</button>
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
                    <button type="submit" class="btn green">Update & Save</button>
                </div>
            </div>
        </form>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
{{-- e-MODAL COMPANY PROFILE--}}

@endsection