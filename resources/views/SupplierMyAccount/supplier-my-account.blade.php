@extends('layouts.master')
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper portal supplier-location">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- s-FORM -->

        @include('partials.page_breadcrumb')

            <!-- END PAGE TITLE-->

            {{-- ============================================ CONTENTS ====================================--}}
            <div class="wrap-ccf-form">
                <div class="portlet light bordered">
                    {{--================================= FLASH MESSAGE ===============================--}}
                    <div class="flash-message">
                         @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                             @if(Session::has('alert-' . $msg))
                                 <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                 </p>
                             @endif
                         @endforeach
                     </div>
                    {{--================================= FLASH MESSAGE ===============================--}}

                    {{--================================= PAGE TITLE ==================================--}}
                    <div class="wrap-ccf-page-title">
                        <h1 class="ccf-page-title">My Account</h1>
                        <p>View or edit your services</p>
                    </div>
                    {{--================================= PAGE TITLE ==================================--}}
                    {{--================================= PAGE CONTENTS ===============================--}}
                    <div class="portlet-body form">
                        <div class="form-body row">
                            <div class="col-md-12">

                                {{--========================= SUPPLIER MY ACCOUNT ==================================--}}
                                <div>
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <h3>Supplier My Account</h3>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">

                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover" >
                                                <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Company Name</th>
                                                    <th>User Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td>{{$userSettings->first_name}}</td>
                                                    <td>{{$userSettings->last_name}}</td>
                                                    <td>{{$companySettings->name}}</td>
                                                    <td>{{$userSettings->username}}</td>
                                                    <td>{{$userSettings->email}}</td>
                                                    <td>{{$userSettings->phone}}</td>
                                                    <td><a onclick="return modalFormEdit('myAccountEditFormContent', '{{route('view_edit_supplier_my_account')}}');" data-toggle="modal" href="#supplier_my_account_edit"  title="Edit">Edit</a></td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                </div>


                                <div class="modal fade" id="supplier_my_account_edit" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true"></button>
                                                <h4 class="modal-title">Edit My Account</h4>
                                            </div>
                                            <form role="form" onsubmit="return modalMyAccountFormValidationAndSave('my_account_edit', '{{route('edit_supplier_my_account')}}');" action="{{route('edit_hirer_my_account') }}" name="my_account_edit" id=my_account_edit" method="POST" class="form-horizontal">
                                                <div class="modal-body">
                                                    {{--s- FORM FIELD--}}
                                                    <div id="myAccountEditFormContent">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <span id="" class="help-block has-error" style="display: none; "></span>
                                                    <span id="my_account_edit_validation_message_area" class="help-block has-error" style="display: none; "></span>
                                                    <button type="button" id="cancel" class="btn dark btn-outline" data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit"  name="send" id="send" class="btn theme-btn">Save</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                {{--========================= SUPPLIER MY ACCOUNT ==================================--}}



                                <br/>
                                {{--========================= SUBSCRIPTION PACKAGE HISTORY ==================================--}}
                                <div>
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <h3>Subscription Package History</h3>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">

                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Subscription Package</th>
                                                        <th scope="col">Plant Hire</th>
                                                        <th scope="col">Contracting</th>
                                                        <th scope="col">Material</th>
                                                        <th scope="col">Fill</th>
                                                        <th scope="col">Start Date</th>
                                                        <th scope="col">End Date</th>
                                                        <th scope="col">Amount ($)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <td>{{$list['subscription_package']}}</td>
                                                        <td>{{$list['Machines']}}</td>
                                                        <td>{{$list['Contracting']}}</td>
                                                        <td>{{$list['Material']}}</td>
                                                        <td>{{$list['Material/Fill']}}</td>
                                                        <td>{{$list['start_date']}}</td>
                                                        <td>{{$list['end_date']}}</td>
                                                        <td>{{$list['total']}}</td>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                {{--========================= SUBSCRIPTION PACKAGE HISTORY ==================================--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- ============================================ CONTENTS ====================================--}}
        </div>
        <!-- END CONTENT BODY -->
    </div>


    <div class="modal fade" id="location" tabindex="-1" role="basic" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true"></button>
                            <h4 class="modal-title">Add Location</h4>
                    </div>


                <div class="modal-body">
                        {{--s- FORM FIELD--}}
                        <form onsubmit="return modalFormValidationAndSave('supplier_location', '{{route('supplier_location')}}');"  role="form" action="{{ route('supplier_location') }}" name="supplier_location" id="supplier_location" method="POST" class="form-horizontal">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">


                            {{--s- FORM FIELD--}}
                            <div class="form-group ">
                                <label class=" col-md-4 control-label">State<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8 {{ $errors->has('states_id')||$errors->has('locations')?'has-error':'' }}">
                                    <select name="states_id" id="states_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($states as $state)
                                            @if(isset($locationRegion->states_id))
                                                @if($locationRegion->states_id == $state->id)
                                                    <option value="{{ $state->id }}" {{ old('states_id')==$state->id?'selected':'' }} selected>{{ $state->name }}</option>
                                                @else
                                                    <option value="{{ $state->id }}" {{ old('states_id')==$state->id?'selected':'' }}>{{ $state->name }}</option>
                                                @endif
                                            @else
                                                <option value="{{ $state->id }}" {{ old('states_id')==$state->id?'selected':'' }}>{{ $state->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('states_id'))
                                        <span class="help-block has-error"> {{ $errors->first('states_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            {{--e- FORM FIELD--}}


                            <div class=" " id="rest_properties_form">

                                <input type="hidden" id="regions_load_url" value="{{route('getRegionsByStateId')}}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Region<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-8 {{ $errors->has('regions_id')||$errors->has('locations')?'has-error':'' }}" id="regions-sec">
                                        <select  name="regions_id[]" id="regions_id" class="form-control select2-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                        </select>
                                        @if($errors->has('regions_id'))
                                            <span class="help-block has-error"> {{ $errors->first('regions_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" col-md-4 control-label"></label>
                                    <div class="col-md-8">
                                        <p>All</p>
                                        <label class="mt-checkbox">
                                            <input type="checkbox"  class="form-control" name="select_all_regions" id="select_all_regions" value="1">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>



                            @include('components.component-my-account-location')



                            <div class="modal-footer">
                                <span id="supplier_location_validation_message_area" class="help-block has-error" style="display: none; "></span>
                                <button type="button" id="cancel" class="btn dark btn-outline" data-dismiss="modal">Close
                                </button>
                                <button type="submit" name="send" id="send" class="btn theme-btn">Save</button>

                                <button type="submit" name="sendCnt" id="sendCnt" class="btn theme-btn" onclick="return modalFormValidationAndSaveAndCnt('supplier_location', '{{route('supplier_location')}}');">Save & Continue</button>
                            </div>

                        </form>
                </div>

                </div>
              </div>
            <!-- /.modal-content -->
        </div>
        </div>
        <!-- /.modal-dialog -->
    </div>




    <div class="modal fade" id="locationEdit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true"></button>
                    <h4 class="modal-title">Edit Location</h4>
                </div>
                <div class="modal-body">
                    {{--s- FORM FIELD--}}
                    <form role="form" name="supplier_location_edit" id="supplier_location_edit" method="POST" class="form-horizontal">
                        <div id="supplierLocationsEditFormContent">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>



    {{--VIEW LOCATION START--}}
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body"><div class="te"></div></div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    {{--VIEW LOCATION END--}}



@endsection


@section('scripts')
    <script src="/js/company_profile_locations.js" type="text/javascript"></script>

@endsection