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
                        <h1 class="ccf-page-title">My Locations</h1>
                        <p>View or edit your locations</p>
                    </div>
                    {{--================================= PAGE TITLE ==================================--}}
                    {{--================================= PAGE CONTENTS ===============================--}}
                    <div class="portlet-body form">
                        <div class="form-body row">
                            <div class="col-md-12">

                                {{--========================= OPERATING LOCATIONS ==================================--}}
                                <div>
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <h3>Operating Locations</h3>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <a data-toggle="modal" href="#location" id="addLoc" class="btn theme-btn">Add Location</a>
                                    </div>
                                    <div class="form-group clearfix">

                                        <div class="table-scrollable">

                                        @if($location_list->locations->count())
                                            <table class="table table-striped table-bordered table-hover" >
                                                <thead>
                                                <tr>
                                                    <th scope="col"> Branch Name</th>
                                                    <th scope="col"> State</th>
                                                    <th scope="col"> Region</th>
                                                    <th scope="col"> Email</th>
                                                    <th scope="col"> Phone</th>
                                                    <th scope="col"> CCF Member ID</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($location_list->locations as $locations)
                                                    <tr>
                                                        <td>{{$locations->name}}</td>
                                                        <td>{{$locations->states->short_code}}</td>
                                                        <td>
                                                            @if($locations->companyLocationRegion)
                                                                @foreach($locations->companyLocationRegion as $region)
                                                                    {{$region->region->name}},<br>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td>{{$locations->email}}</td>
                                                        <td>{{$locations->phone}}</td>
                                                        <td>
                                                            @php
                                                                $ccf_member_id = '--';
                                                                if(trim($locations->membership_id)){
                                                                    $ccf_member_id = $locations->membership_id;
                                                                }
                                                            @endphp
                                                            {{$ccf_member_id}}
                                                        </td>
                                                        <td>
                                                            <a data-toggle="modal" data-target="#myModal"   href="{{route('supplier_location_view', $locations->id)}}" title="View">View</a> |
                                                            <a onclick="return modalFormEdit('supplierLocationsEditFormContent', '{{route('view_edit_supplier_locations', $locations->id)}}');" data-toggle="modal" href="#locationEdit"  title="Edit">Edit</a> |
                                                            <a onclick="return confirm('Are you sure you want to delete?');" href="{{route('supplier_locations_delete', $locations->id)}}"  title="Delete">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <p>Information is not available</p>
                                        @endif

                                        </div>
                                      </div>
                                </div>
                                {{--========================= OPERATING LOCATIONS ==================================--}}
                                <br/>

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
                            <button type="button" class="close" id="loc-close" data-dismiss="modal"
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
                                <input value="" id="submit_url" name="submit_url" type="hidden">
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

    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#addLoc").click(function() {
                $('.help-block').hide();
                $( "div" ).removeClass( "has-error");
            });
        });
    </script>
@endsection