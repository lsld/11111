@extends('layouts.sign-up')
@section('content')

<!-- BEGIN CONTENT -->
        <div class="page-content-wrapper supplier-register">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- FORM -->
                <div class="wrap-ccf-form">
                        <div class="portlet light borderedx">
                            <!-- BEGIN PAGE TITLE-->
                            <h1 class="ccf-page-title"> Complete your Profile</h1>
                            <!-- END PAGE TITLE-->

                            <!-- s- WIZARD PAGINATION -->
                        @include('partials.wizard-pagination')
                            <!-- e- WIZARD PAGINATION -->
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-md-10 center-align">
                                        <div class="caption ">
                                            <h3 class="clearfix">Company Details
                                            <form method="post" action="{{route('skip_supplier_singup_company_profile')}}" class="wrap-btn-skip pull-right">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-skip theme-btn">Complete Later <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                            </form>
                                            </h3>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="{{ route('supplier_singup_company_profile') }}" class="form-horizontal" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-actions top-form-action col-md-12">
                                        <div class="row">
                                            <div class="center-align col-md-10 clearfix">
                                                <button type="submit" class="btn theme-btn pull-right">Next</button>
                                               {{-- <button type="button" class="btn default">Cancel</button>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body col-md-10 form-fileds-center">
                                        <div class="row">
                                            <div class="col-md-6">

                                            {{--s- FORM FIELD--}}
                                                <div class="form-group {{ $errors->has('company_profile')?'has-error':'' }}">
                                                    <label class="control-label">Company Profile<span class="required" aria-required="true"> * </span></label>
                                                    <div class="">
                                                        <input type="text" class="form-control" placeholder="" name="company_profile" value="{{ old("company_profile") }}">
                                                        @if($errors->has('company_profile'))
                                                            <span class="help-block has-error"> {{ $errors->first('company_profile') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            {{--e- FORM FIELD--}}

                                            {{--s- FORM FIELD--}}
                                                <div class="form-group {{ $errors->has('company_email')?'has-error':'' }}">
                                                    <label class="control-label">Company Email<span class="required" aria-required="true"> * </span></label>
                                                    <div class=""><input type="text" class="form-control" placeholder="email@example.com" name="company_email" value="{{ old("company_email") }}">
                                                        @if($errors->has('company_email'))
                                                            <span class="help-block has-error"> {{ $errors->first('company_email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            {{--e- FORM FIELD--}}

                                            {{--s- FORM FIELD--}}
                                                <div class="form-group {{ $errors->has('phone1')?'has-error':'' }}">
                                                    <label class="control-label">Company Phone 1<span class="required" aria-required="true"> * </span></label>
                                                    <div class=""><input type="text" class="form-control" placeholder="+61 123 456 789" name="phone1" value="{{ old("phone1") }}">
                                                        @if($errors->has('phone1'))
                                                            <span class="help-block has-error"> {{ $errors->first('phone1') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            {{--e- FORM FIELD--}}

                                            {{--s- FORM FIELD--}}
                                                <div class="form-group {{ $errors->has('phone2')?'has-error':'' }}">
                                                    <label class="control-label">Company Phone 2</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" placeholder="+61 123 456 789" name="phone2" value="{{ old("phone2") }}">
                                                        @if($errors->has('phone2'))
                                                            <span class="help-block has-error"> {{ $errors->first('phone2') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            {{--e- FORM FIELD--}}

                                            {{--s- FORM FIELD--}}
                                                <div class="form-group {{ $errors->has('company_website')?'has-error':'' }}">
                                                    <label class="control-label">Company Website</label>
                                                    <div class=""><input type="text" class="form-control" placeholder="http://www.website.com" name="company_website" value="{{ old("company_website") }}">
                                                        @if($errors->has('company_website'))
                                                            <span class="help-block has-error"> {{ $errors->first('company_website') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            {{--e- FORM FIELD--}}

                                            {{--s- FORM FIELD--}}
                                            <div class="form-group {{ $errors->has('states_id')?'has-error':'' }}">
                                                <label class="control-label">Operating State(s)<span class="required" aria-required="true"> * </span></label>
                                                <div class=""><select id="multiple" class="form-control select2-multiple" multiple name="states_id[]">
                                                        @foreach( $states as $state)
                                                            <option value="{{ $state->id }}" {{ old('states_id')==$state->id?'selected':'' }}>{{ $state->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('states_id'))
                                                        <span class="help-block has-error"> {{ $errors->first('states_id') }}</span>
                                                    @endif</div>
                                            </div>
                                            {{--e- FORM FIELD--}}
                                            {{--s- FORM FIELD--}}
                                            <div class="form-group {{ $errors->has('operating_category_id')?'has-error':'' }}">
                                                <label class="control-label">Operating Category<span class="required" aria-required="true"> * </span></label>
                                                <div class=""><select name="operating_category_id" id="" class="form-control" >
                                                        <option value="">Select</option>
                                                        @foreach( $operationCategories as $category)
                                                            <option value="{{ $category['id'] }}" {{ old('operating_category_id')==$category['id']?'selected':'' }}>{{ $category['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('operating_category_id'))
                                                        <span class="help-block has-error"> {{ $errors->first('operating_category_id') }}</span>
                                                    @endif</div>
                                            </div>
                                            {{--e- FORM FIELD--}}
                                            </div>
                                            <div class="col-md-6">
                                                {{--s- FORM FIELD--}}
                                                    <div class="form-group {{ $errors->has('about')?'has-error':'' }}">
                                                        <label class="control-label">Company Profile(About Us)<span class="required" aria-required="true"> * </span></label>
                                                        <div class="">
                                                            <textarea name="about" id="" cols="30" rows="5" class="form-control">{{ old("about") }}</textarea>

                                                        @if($errors->has('about'))
                                                                <span class="help-block has-error"> {{ $errors->first('about') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                {{--e- FORM FIELD--}}

                                                {{--s- FORM FIELD--}}
                                                    <div class="form-group {{ $errors->has('services')?'has-error':'' }}">
                                                        <label class="control-label">Company Services<span class="required" aria-required="true"> * </span></label>
                                                        <div class="">
                                                            <textarea name="services" id="" cols="30" rows="5" class="form-control">{{ old("services") }}</textarea>
                                                            @if($errors->has('services'))
                                                                <span class="help-block has-error"> {{ $errors->first('services') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                {{--e- FORM FIELD--}}

                                                {{--s- FORM FIELD--}}
                                                    <div class="form-group {{ $errors->has('projects')?'has-error':'' }}">
                                                        <label class="control-label">Company Projects<span class="required" aria-required="true"> * </span></label>
                                                        <div class="">
                                                            <textarea name="projects" id="" cols="30" rows="5" class="form-control">{{ old("projects") }}</textarea>

                                                            @if($errors->has('projects'))
                                                                <span class="help-block has-error"> {{ $errors->first('projects') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                {{--e- FORM FIELD--}}
                                            </div>
                                            </div>



                                    </div>
                                    <div class="form-actions col-md-12 ">
                                        <div class="row">
                                            <div class="col-md-10 center-align">
                                                <button type="submit" class="btn theme-btn pull-right">Next</button>
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
@endsection