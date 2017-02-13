@extends('layouts.master')

@section('content')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper portal ">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

    @include('partials.page_breadcrumb')
        <!-- FORM -->
        <div class="wrap-ccf-form">
            <form action="" class="form-horizontal" method="POST">

                {{--{{ csrf_field() }}--}}
                <div class="portlet light bordered">
                   <div class="wrap-ccf-page-title">
                       <h1 class="ccf-page-title">My Account</h1>
                       <p>View or edit your account details </p>
                   </div>



                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal">
                            <div class="form-body col-md-12 form-fileds-center">

                                {{--==================================== TABLE ACCOUNT DETAILS ==================================--}}
                                <div class="row">

                                    <div class="col-sm-12">
                                    <h3>Account Details</h3>
                                        <div class="table-scrollable">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Company Name</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Subscription Package</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>


                                                <tr>
                                                        <td>John</td>
                                                        <td>Doe</td>
                                                        <td>Edmond</td>
                                                        <td>johnd</td>
                                                        <td>johnd2exm.com</td>
                                                        <td>+641234567890</td>
                                                        <td>Package 3</td>
                                                        <td><a href="#editRequestItem" class="" data-toggle="modal">Edit</a> | <a href="">View</a></td>

                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                {{--==================================== TABLE ACCOUNT DETAILS ==================================--}}
                                <br/>

                                {{--==================================== TABLE OPERATING LOCATION ==================================--}}
                                <div class="row">

                                    <div class="col-sm-12">
                                    <h3>Operating Location</h3>
                                        <div class="table-scrollable">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Branch Name</th>
                                                    <th>Street Address</th>
                                                    <th>State</th>
                                                    <th>Suburb</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>CCF Member</th>
                                                    <th>CCF Member ID</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>


                                                <tr>
                                                        <td>Head Office</td>
                                                        <td>132/5, Glenferrie Rd</td>
                                                        <td>NSW</td>
                                                        <td>Melvern VIC 3144</td>
                                                        <td>thecrewHQ@gmail.com</td>
                                                        <td>615487596</td>
                                                        <td>YES</td>
                                                        <td>55552145</td>

                                                        <td><a href="#editRequestItem" class="" data-toggle="modal">Edit</a> | <a href="">Delete</a> | <a href="">View</a></td>

                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <a class="btn blue" data-toggle="modal" href="/ui/supplier-portal-add-location">Add Location</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--==================================== TABLE OPERATING LOCATION ==================================--}}
                                <br/>
                                {{--==================================== TABLE SUBSCRIPTION PACKAGE ==================================--}}
                                <div class="row">

                                    <div class="col-sm-12">
                                    <h3>Operating Location</h3>
                                        <div class="table-scrollable">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Subscription Package</th>
                                                    <th>Plant Hire</th>
                                                    <th>Construction</th>
                                                    <th>Material</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>


                                                <tr>
                                                        <td>Package 3</td>
                                                        <td>1</td>
                                                        <td>5</td>
                                                        <td>10</td>
                                                        <td>12-03-2016</td>
                                                        <td>30-12-2016</td>
                                                        <td>$9500.00</td>
                                                        <td><a href="">View</a> | <a href="">Cancel Subscription</a></td>

                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <a class="btn blue" data-toggle="modal" href="#descModal">New Subscription</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--==================================== TABLE SUBSCRIPTION PACKAGE ==================================--}}
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

                                <select id="multiple" class="form-control select2-multiple" multiple>
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