@extends('layouts.sign-up')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper login-page">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- s-LOGIN / REGISTER -->
            <div class="row">
                <div class="col-lg-8 wrap-login clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 wrap-login-details">
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))

                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    </p>
                                @endif
                            @endforeach
                        </div> <!-- end .flash-message -->
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <h1 class="ccf-page-title">Login</h1>
                            <div class="wrap-ccf-form ">

                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                    <div class="login-page-static-block">

                                        <div class="login-common-error {{ $errors->has('fail') ? ' has-error' : '' }}">
                                        @if ($errors->has('fail'))
                                            <div class="alert alert-danger">
                                                <span class="help-block has-error"> {{ $errors->first('fail') }}</span>
                                            </div>
                                        @endif
                                        </div>
                                        <p>Please login to manage your dashboard or create new requests.</p>
                                    </div>

                                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label class="control-label"> User Name / Email</label>
                                            <input type="text" name="login_user" id="username" class="form-control login-type"
                                                   placeholder="" value="{{ old('email') ? old('email') : old('username') }}" >

                                            @if ($errors->has('login_user'))
                                                <span class="help-block has-error"> {{ $errors->first('login_user') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label class="control-label">Password</label>

                                            <input type="password" class="form-control" id="password" name="password">
                                            @if ($errors->has('password'))
                                                <span class="help-block has-error"> {{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group forgot-password">
                                            <a data-toggle="modal" href="#resetpassword">Forgot your Password?</a>
                                        </div>
                                        <div class="form-group clearfix">
                                            <button type="submit" class="btn  pull-right theme-btn"><i class="fa fa-sign-in" aria-hidden="true"></i> SIGN IN</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-2 hide-for-small-only">
                        <div class="logindivider"><span></span></div>
                        <div class="login-or">Or</div>
                        <div class="logindivider"><span></span></div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 wrap-register-details">

                        <h1 class="ccf-page-title">Register</h1>
                        <div class="wrap-ccf-form ">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-page-static-block">
                                    <p>Please click the buttons below to register as a Supplier or to get quotations</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrap-register-types-buttons">
                                    <div class="form-group row">
                                        <div class="col-xs-12">
                                            <a href="{{ route('show_supplier_singup_subscription') }}" class="btn theme-btn clearfix">
                                                <span class="reg-btn-icon"><img src="/assets/layouts/layout/img/unloading-dump-truck.png" alt=""/></span>
                                                <span class="reg-btn-text">Register as a Supplier</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xs-12">
                                            <a href="{{ route('show_hirer_singup') }}" class="btn theme-btn clearfix">
                                                <span class="reg-btn-icon"><img src="/assets/layouts/layout/img/get-a-quote-icon.png" alt=""/></span>
                                                <span class="reg-btn-text">register to get quotes</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- e-LOGIN / REGISTER -->
                </div>
                <!-- END CONTENT BODY -->
                <div class="modal fade" id="resetpassword" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <meta name="_token" content="{{ csrf_token() }}" />
                        <form role="form" name="forgotpassword" id="forgotpassword" method="POST" action="">
                            {{ csrf_field() }}
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true"></button>
                                    <h4 class="modal-title">Forgot your Password</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group clearfix {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="row">
                                            <label class="col-md-4">Email<span class="required" aria-required="true"> * </span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="email" id="email" class="form-control col-md-9" placeholder=""
                                                       value="{{old('email')}}">
                                            </div>
                                            <div class="clearfix"></div>
                                            @if ($errors->has('email'))
                                                <span class="help-block has-error col-md-offset-4 col-md-8"> {{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-modal-close btn dark btn-outline" data-dismiss="modal">Close</button>
                                    <button type="submit" name="send" id="send" class="btn-modal-reset-password btn theme-btn">

                                    Reset Password</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function()
    { 
        $('.login-type').on("change", function(){
            var utype = validEmail($('#username').val());
            if(utype){
                $('#username').attr('name', 'email');
            }else {
                $('#username').attr('name', 'username');
            }

        });

        function validEmail(v) {
            var r = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
            return (v.match(r) == null) ? false : true;
        }
    });

</script>
@endsection