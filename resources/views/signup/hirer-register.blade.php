@extends('layouts.sign-up')

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper hirer-register">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">



            <div class="wrap-ccf-form">
                <!-- FORM -->
                <form action="#" method="post" class="form-horizontal">

                    <div class="portlet light borderedx">
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="ccf-page-title">register to get quotes</h1>
                        <!-- END PAGE TITLE-->

                        <p class="text-center"> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consequuntur nostrum officiis quis quisquam repudiandae ut voluptatum! Ab, at dolorem dolores facere, nesciunt optio praesentium quas quasi quibusdam repellendus reprehenderit.</span> </p>

                        <div class="portlet-title">
                            <div class="caption">
                                <h3></h3>
                            </div>
                        </div>

                        <div class="portlet-body form">
                            <form action="{{ route('hirer_singup') }}" class="form-horizontal fo">
                                {{ csrf_field() }}

                                <div class="row col-md-10 form-fileds-center">
                                    <div class="col-md-6">
                                        {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('first_name')?'has-error':'' }}">
                                            <label class="control-label">
                                                First Name<span class="required" aria-required="true"> * </span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="" name="first_name" value="{{ old("first_name") }}">
                                                @if($errors->has('first_name'))
                                                    <span class="help-block has-error"> {{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--e- FORM FIELD--}}

                                        {{--S- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('last_name')?'has-error':'' }}">
                                            <label class="control-label">Last Name
                                                <span class="required" aria-required="true"> * </span></label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="" name="last_name" value="{{ old("last_name") }}">
                                                @if($errors->has('last_name'))
                                                    <span class="help-block has-error"> {{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--e- FORM FIELD--}}
                                        {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                                            <label class="control-label ">Email<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="text" class="form-control" placeholder="email@example.com" name="email" value="{{ old("email") }}">
                                                @if($errors->has('email'))
                                                    <span class="help-block has-error"> {{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--e- FORM FIELD--}}

                                        {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
                                            <label class="control-label ">Phone Number<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="text" class="form-control" placeholder="+61 491 570 159" name="phone" value="{{ old("phone") }}">
                                                @if($errors->has('phone'))
                                                    <span class="help-block has-error"> {{ $errors->first('phone') }}</span>
                                                @endif</div>
                                        </div>
                                        {{--e- FORM FIELD--}}

                                        {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('username')?'has-error':'' }}">
                                            <label class="control-label ">Username<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="text" class="form-control" placeholder="" name="username" value="{{ old("username") }}">
                                                @if($errors->has('username'))
                                                    <span class="help-block has-error"> {{ $errors->first('username') }}</span>
                                                @endif</div>
                                        </div>
                                        {{--e- FORM FIELD--}}

                                        {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('password')?'has-error':'' }}">
                                            <label class="control-label ">Password<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="password" class="form-control" placeholder="Minimum 6 Characters" name="password">
                                                @if($errors->has('password'))
                                                    <span class="help-block has-error"> {{ $errors->first('password') }}</span>
                                                @endif</div>
                                        </div>
                                        {{--e- FORM FIELD--}}

                                        {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('password_confirmation')?'has-error':'' }}">
                                            <label class="control-label ">Confirm Password<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="password" class="form-control" placeholder="Minimum 6 Characters" name="password_confirmation">
                                                @if($errors->has('password_confirmation'))
                                                    <span class="help-block has-error"> {{ $errors->first('password_confirmation') }}</span>
                                                @endif</div>
                                        </div>
                                        {{--e- FORM FIELD--}}
                                        {{--s- FORM FIELD--}}

                                        <div class="form-group last">
                                            <div class="wrap-checkbox">
                                                <div class=" {{ $errors->has('terms')?'has-error':'' }}">
                                                    <label class="mt-checkbox mt-checkbox-outline"> I agree to CCF Terms &amp; Conditions
                                                        <input type="checkbox" value="1" name="terms">
                                                        <span></span>
                                                    </label>
                                                </div>

                                                <div class=" {{ $errors->has('policy')?'has-error':'' }}">
                                                    <label class="mt-checkbox mt-checkbox-outline "> I agree to CCF Privacy Policy
                                                        <input type="checkbox" value="1" name="policy">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--e- FORM FIELD--}}
                                    </div>
                                    <div class="col-md-6">
                                        {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('company_name')?'has-error':'' }}">
                                            <label class="control-label">Company Name<span class="required" aria-required="true"> * </span></label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="" name="company_name" value="{{ old("company_name") }}">
                                                @if($errors->has('company_name'))
                                                    <span class="help-block has-error"> {{ $errors->first('company_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--e- FORM FIELD--}}

                                        {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('street_address')?'has-error':'' }}">
                                            <label class="control-label ">Street<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="text" class="form-control" placeholder="" name="street_address"  value="{{ old("street_address") }}">
                                                @if($errors->has('street_address'))
                                                    <span class="help-block has-error"> {{ $errors->first('street_address') }}</span>
                                                @endif</div>
                                        </div>
                                        {{--e- FORM FIELD--}}
                                        {{--s- FORM FIELD--}}
                                        <div class="form-group">
                                            <label class="control-label ">Suburb</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="" name="suburb" value="{{ old("suburb") }}" >
                                              
                                            </div>

                                        </div>
                                        {{--e- FORM FIELD--}}
                                        {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('post_code')?'has-error':'' }}">
                                            <label class="control-label ">Post Code</label>
                                            <div class=""><input type="text" class="form-control" placeholder="" name="post_code" value="{{ old("post_code") }}">
                                                @if($errors->has('post_code'))
                                                    <span class="help-block has-error"> {{ $errors->first('post_code') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--e- FORM FIELD--}}
                                        {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('states_id')?'has-error':'' }}">
                                            <label class="control-label ">State<span class="required" aria-required="true"> * </span></label>
                                            <div class="">
                                                <select name="states_id" id="state_id" class="form-control" >
                                                    <option value="">Select</option>
                                                    @foreach( $states as $state)
                                                        <option value="{{ $state->id }}" {{ old('states_id')==$state->id?'selected':'' }}>{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('states_id'))
                                                    <span class="help-block has-error"> {{ $errors->first('states_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--e- FORM FIELD--}}

                                        {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('regions_id')?'has-error':'' }}">
                                            <label class="control-label ">Region<span class="required" aria-required="true"> * </span></label>
                                            <div class="">

                                                @include('dynamic.regions_drop_down', [ 'regions'=> $regions, 'selected_val' => old('regions_id'), 'state_id' => old('states_id') ])

                                                @if($errors->has('regions_id'))
                                                    <span class="help-block has-error"> {{ $errors->first('regions_id') }}</span>
                                                @endif</div>
                                        </div>
                                        {{--e- FORM FIELD--}}




                                    </div>
                                </div>
                                {{--e- FORM FIELD--}}
                                <div class="form-actions col-md-12">
                                    <div class="row">
                                        <div class="col-md-10 center-align clearfix">
                                            <button type="submit" class="btn theme-btn pull-right btn-add-user">Register</button>
                                            {{-- <button type="button" class="btn default">Cancel</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>

@endsection