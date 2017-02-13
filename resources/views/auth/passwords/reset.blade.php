@extends('layouts.app')

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper supplier-subscription">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- s-FORM -->
            <div class="wrap-ccf-form">
                    <div class="portlet light borderedx">
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="ccf-page-title">Reset Password</h1>
                        <!-- END PAGE TITLE-->

                        <div class="portlet-body form ">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-body col-md-8 form-fileds-center">
                                    <div class="form-group clearfix{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">Email Address</label>
                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="email@example.com" >
                                            @if ($errors->has('email'))
                                                <span class="help-block has-error"> {{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group clearfix {{ $errors->has('password') ? ' has-error' : '' }}">
                                         <label for="password" class="col-md-4 control-label">New Password</label>
                                             <div class="col-md-8">
                                                 <input id="password" type="password" class="form-control" name="password" placeholder="Minimim 6 Characters"  >
                                                 @if ($errors->has('password'))
                                                     <span class="help-block has-error"> {{ $errors->first('password') }}</span>
                                                 @endif
                                             </div>
                                     </div>
                                     <div class="form-group clearfix {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                            <div class="col-md-8">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Minimim 6 Characters" >
                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block has-error"> {{ $errors->first('password_confirmation') }}</span>
                                                @endif
                                            </div>
                                     </div>
                                    <div class="form-group last clearfix">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Reset Password
                                            </button>

                                            <a href="../login/" class="btn btn-default">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>



                            </form>
                        </div>

                </div>
        </div>
    </div>
</div>
@endsection
