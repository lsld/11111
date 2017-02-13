@extends('layouts.sign-up')

@section('content')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper supplier-register">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- FORM -->
        <div class="wrap-ccf-form">
            <form action="{{ route('supplier_singup_account') }}" class="form-horizontal" method="POST">

                {{ csrf_field() }}
                <div class="portlet light borderedx">
                    <!-- BEGIN PAGE TITLE-->
                    <h1 class="ccf-page-title"> Register as a Supplier</h1>
                    <!-- END PAGE TITLE-->

                   <!-- s- WIZARD PAGINATION -->
                 @include('partials.wizard-pagination')
                   <!-- e- WIZARD PAGINATION -->
                    {{--<div class="portlet-title">
                        <div class="caption">

                            <h3></h3>
                        </div>

                    </div>--}}
                    <hr/>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal">
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
                                        <div class="form-group {{ $errors->has('first_name')?'has-error':'' }}">
                                            <label class="control-label">First Name<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="text" class="form-control" placeholder="" name="first_name" value="{{ old("first_name") }}">
                                                @if($errors->has('first_name'))
                                                    <span class="help-block has-error"> {{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    {{--e- FORM FIELD--}}

                                    {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('last_name')?'has-error':'' }}">
                                            <label class="control-label">Last Name<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="text" class="form-control" placeholder="" name="last_name" value="{{ old("last_name") }}">
                                                @if($errors->has('last_name'))
                                                    <span class="help-block has-error"> {{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    {{--e- FORM FIELD--}}

                                    {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                                            <label class="control-label">Email<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="text" class="form-control" placeholder="email@example.com" name="email" value="{{ old("email") }}">
                                                @if($errors->has('email'))
                                                    <span class="help-block has-error"> {{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    {{--e- FORM FIELD--}}

                                    {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('company_name')?'has-error':'' }}">
                                            <label class="control-label">Company Name<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="text" class="form-control" placeholder="" name="company_name" value="{{ old("company_name") }}">
                                                @if($errors->has('company_name'))
                                                    <span class="help-block has-error"> {{ $errors->first('company_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    {{--e- FORM FIELD--}}

                                    {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
                                           <label class="control-label">Phone<span class="required" aria-required="true"> * </span></label>
                                           <div class=""><input type="text" class="form-control" placeholder="+61 491 570 159" name="phone" value="{{ old("phone") }}">
                                               @if($errors->has('phone'))
                                                   <span class="help-block has-error"> {{ $errors->first('phone') }}</span>
                                               @endif
                                           </div>
                                       </div>
                                    {{--e- FORM FIELD--}}

                                    </div>
                                    <div class="col-md-6">
                                        {{--s- FORM FIELD--}}
                                            <div class="form-group {{ $errors->has('username')?'has-error':'' }}">
                                                <label class="control-label">Username<span class="required" aria-required="true"> * </span></label>
                                                <div class=""><input type="text" class="form-control" placeholder="" name="username" value="{{ old("username") }}">
                                                    @if($errors->has('username'))
                                                        <span class="help-block has-error"> {{ $errors->first('username') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        {{--e- FORM FIELD--}}

                                        {{--s- FORM FIELD--}}
                                            <div class="form-group {{ $errors->has('password')?'has-error':'' }}">
                                            <label class="control-label">Password<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="password" class="form-control" placeholder="Minimum 6 characters" name="password">
                                                @if($errors->has('password'))
                                                    <span class="help-block has-error"> {{ $errors->first('password') }}</span>
                                                @endif</div>
                                        </div>
                                        {{--e- FORM FIELD--}}

                                        {{--s- FORM FIELD--}}
                                            <div class="form-group {{ $errors->has('password_confirmation')?'has-error':'' }}">
                                            <label class="control-label">Confirm Password<span class="required" aria-required="true"> * </span></label>
                                            <div class=""><input type="password" class="form-control" placeholder="Minimum 6 characters" name="password_confirmation">
                                                @if($errors->has('password_confirmation'))
                                                    <span class="help-block has-error"> {{ $errors->first('password_confirmation') }}</span>
                                                @endif</div>
                                        </div>
                                        {{--e- FORM FIELD--}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions col-md-12">
                                <div class="row">
                                    <div class="center-align col-md-10 clearfix">
                                        <button type="submit" class="btn theme-btn pull-right">Next</button>
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

@endsection