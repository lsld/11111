@extends('layouts.sign-up')

@section('content')
        <!-- BEGIN CONTENT -->
<div class="page-content-wrapper supplier-location">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- s-FORM -->
        <div class="wrap-ccf-form">
            <div class="portlet light">
                <!-- BEGIN PAGE TITLE-->
                <h1 class="ccf-page-title"> Where do you operate From </h1>
                <!-- END PAGE TITLE-->

                <!-- s- WIZARD PAGINATION -->
                @include('partials.wizard-pagination')
                <!-- e- WIZARD PAGINATION -->
                <div class="row">
                    <div class="col-md-10 center-align">
                        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, voluptatibus.</p>
                    </div>
                </div>
                <!-- s-FORM HEADING -->
                <div class="portlet-title">
                    <div class="row">
                        <div class="col-md-10 center-align">
                            <div class="caption">
                                <h3 class="clearfix">Where does your company operate out of?

                                    @if (session('checkLocation') == 0)
                                    <form action="{{ route("supplier_singup_location_skip") }}" method="POST" class="wrap-btn-skip pull-right">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="skip" value="skip">
                                        <button type="submit" class="btn btn-skip theme-btn">Complete Later <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                                    {{-- <button type="button" class="btn default">Cancel</button>--}}
                                    </form>
                                    @endif

                               </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- e-FORM HEADING -->

                <!-- s-FORM FIELDS -->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                     <form action="{{ route("supplier_singup_location_complete") }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-actions top-form-action col-md-12 last">
                            <div class="row">
                                <div class="col-md-10 clearfix center-align">
                                    <button type="submit" class="btn theme-btn pull-right">Next</button>
                                    {{-- <button type="button" class="btn default">Cancel</button>--}}
                                </div>
                            </div>
                        </div>
                     </form>
                    <div class="form-body col-md-10 form-fileds-center">
                        <form action="{{ route('supplier_singup_location') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            @if($errors->has('locations'))
                                <div class="form-group clearfix ">
                                    <div class=" form-fileds-center"><div class="alert alert-danger">
                                            Please specify a location to continue.
                                    </div>
                                    </div>
                                </div>

                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                  {{--s- FORM FIELD--}}
                                  <div class="form-group  {{ $errors->has('states_id')||$errors->has('locations')?'has-error':'' }}">
                                      <label class="control-label">State<span class="required" aria-required="true"> * </span></label>
                                      <div class=" ">

                                          <select name="states_id" id="states_id" class="form-control get-select-state">

                                              <option value="">Select</option>
                                              @foreach( $states as $state)
                                                  <option value="{{ $state->id }}" {{ old('states_id')==$state->id?'selected':'' }}>{{ $state->name }}</option>
                                              @endforeach
                                          </select>

                                          @if($errors->has('states_id'))
                                              <span class="help-block has-error"> {{ $errors->first('states_id') }}</span>
                                          @endif</div>

                                  </div>
                                  {{--e- FORM FIELD--}}

                                  <input type="hidden" id="regions_load_url" value="{{route('getRegionsByStateId')}}">

                                   {{--s- FORM FIELD--}}
                                  <div class="form-group">
                                      <label class="control-label ">Region<span class="required" aria-required="true"> * </span></label>


                                      <div class=" {{ $errors->has('regions_id')||$errors->has('locations')?'has-error':'' }}"  id="regions-sec">

                                          <select  name="regions_id[]" id="regions_id" class="form-control select2-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                          </select>

                                          @if($errors->has('regions_id'))
                                              <span class="help-block has-error"> {{ $errors->first('regions_id') }}</span>
                                          @endif
                                      </div>
                                      {{--e- FORM FIELD--}}
                                      <div class="wrap-checkbox up-close">
                                        <div class="mt-checkbox-list"  data-error-container="">
                                            <label class="mt-checkbox mt-checkbox-outline">
                                                 <input type="checkbox"  class="form-control" name="select_all_regions" id="select_all_regions" value="1"> <label class="set-select-state">All regions in </label>
                                                <span></span>
                                            </label>

                                        </div>
                                      </div>
                                    {{--e- FORM FIELD--}}
                                  </div>
                                  {{--e- FORM FIELD--}}



                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                        <label class="control-label ">Street<span class="required"
                                                                                                  aria-required="true"> * </span></label>
                                        <div class=" {{ $errors->has('street_address')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                                     name="street_address" value="{{ old("street_address") }}">
                                            @if($errors->has('street_address'))
                                                <span class="help-block has-error"> {{ $errors->first('street_address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                        <label class="control-label ">Suburb<span class="required" aria-required="true"> * </span></label>
                                        <div class=" {{ $errors->has('suburb')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                                     name="suburb" value="{{ old("suburb") }}" >

                                            @if($errors->has('suburb'))
                                                <span class="help-block has-error"> {{ $errors->first('suburb') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                        <label class="control-label ">Post Code<span class="required"
                                                                                             aria-required="true"> * </span></label>
                                        <div class=" {{ $errors->has('post_code')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                                     name="post_code" value="{{ old("post_code") }}">
                                            @if($errors->has('post_code'))
                                                <span class="help-block has-error"> {{ $errors->first('post_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}


                                  </div>
                                <div class="col-md-6">
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                        <label class="control-label ">Branch Name<span class="required"
                                                                                               aria-required="true"> * </span></label>
                                        <div class=" {{ $errors->has('name')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                                     name="name" value="{{ old("name") }}">
                                            @if($errors->has('name'))
                                                <span class="help-block has-error"> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                           <label class="control-label ">Branch Email<span class="required" aria-required="true"> * </span></label>
                                           <div class=" {{ $errors->has('email')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder="email@example.com" name="email" value="{{ old("email") }}">
                                               @if($errors->has('email'))
                                                   <span class="help-block has-error"> {{ $errors->first('email') }}</span>
                                               @endif
                                           </div>
                                       </div>
                                    {{--e- FORM FIELD--}}
                                    {{--s- FORM FIELD--}}
                                        <div class="form-group ">
                                            <label class="control-label ">Branch Phone<span class="required" aria-required="true"> * </span></label>
                                            <div class=" {{ $errors->has('phone')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder="+61 491 570 110" name="phone" value="{{ old("phone") }}">
                                                @if($errors->has('phone'))
                                                    <span class="help-block has-error"> {{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    {{--e- FORM FIELD--}}
                                    {{--e- FORM FIELD--}}
                                    <div class="form-group">

                                        <div class="wrap-checkbox">

                                            <div class="mt-checkbox-list"  data-error-container="">
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" value="1" name="ck_membership" id="ck_membership"> CCF State Membership
                                                    <span></span>
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group" id="membershipId">
                                        <label class="control-label ">CCF Membership Id</label>
                                        <div class=" {{ $errors->has('membership_id')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                                     name="membership_id" value="{{ old("membership_id") }}">
                                            @if($errors->has('membership_id'))
                                                <span class="help-block has-error"> {{ $errors->first('membership_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">



                                    <div  class="form-group" id="rest_properties_form">
















                                <div class="col-md-6">




                                    </div>

                                </div>

                                    <div class="form-group">
                                        <div class="clearfix">
                                            <button type="submit" class="btn theme-btn pull-right">Add Location</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="form-group clearfix">

                            <div class="">
                                @if($locations->count())
                                <div class="table-scrollable">

                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>

                                                <th scope="col"> Branch Name</th>
                                                <th scope="col"> Street Address</th>
                                                <th scope="col"> State</th>
                                                <th scope="col"> Suburb</th>
                                                <th scope="col"> Email</th>
                                                <th scope="col"> Phone</th>
                                                <th scope="col"> CCF Member</th>
                                                <th scope="col"> CCF Member ID</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($locations as $location)
                                            <tr>

                                                <td> {{ $location->name }}</td>
                                                <td> {{ $location->street_address_1 }}</td>
                                                <td> {{ $location->states->short_code }}</td>
                                                <td> {{ $location->suburb }}</td>
                                                <td> {{ $location->email }} </td>
                                                <td> {{ $location->phone }}</td>
                                                <td> {{ $location->membership_id != ""? "yes":"No" }}</td>
                                                <td> {{ $location->membership_id }}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                </div>
                                @endif
                            </div>
                        </div>


                    </div>
                    <form action="{{ route("supplier_singup_location_complete") }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-actions col-md-12 last">
                            <div class="row">
                                <div class="col-md-10 clearfix center-align">
                                    <button type="submit" class="btn theme-btn pull-right">Next</button>
                                    {{-- <button type="button" class="btn default">Cancel</button>--}}
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- e-FORM FIELDS -->
            </div>
        </div>
        <!-- e-FORM -->
    </div>
    <!-- END CONTENT BODY -->
</div>

@endsection


@section('scripts')
    <script src="/js/company_profile_locations.js" type="text/javascript"></script>
@endsection