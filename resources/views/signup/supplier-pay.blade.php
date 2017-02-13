@extends('layouts.sign-up')

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper supplier-pay">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            <!-- FORM -->
            <div class="wrap-ccf-form">
                <div class="portlet light borderedx">
                    <!-- BEGIN PAGE TITLE-->
                    <h1 class="ccf-page-title">Review and Submit</h1>
                    <!-- END PAGE TITLE-->

                    <!-- s- WIZARD PAGINATION -->
                @include('partials.wizard-pagination')
                    <!-- e- WIZARD PAGINATION -->

                    <div class="row">
                        <div class="col-md-10 center-align">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci dolore, molestias possimus
                                                    quia quisquam.</p>
                        </div>
                    </div>

                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-md-10 center-align">
                                <div class="caption">
                                    <h3>Payment Details</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="{{ route('supplier_singup_submit') }}" method="POST"
                              class="form-horizontal ">
                            {{ csrf_field() }}
                            <div class="form-wizard clearfix">
                                <div class="form-body col-md-8 form-fileds-center">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Subscription Category</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">
                                                {{ isset($plan->subscriptionCategory->name) ?
                                                $plan->subscriptionCategory->name :
                                                'N/A'
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Period </label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{ $plan->period }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Start Date</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{ $plan->start_date }} </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">End Date </label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{ $plan->end_date  }}</p>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('ccfPromoCode')?'has-error':'' }}">
                                        <label class="col-md-4 control-label">CCF Promo Code</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder=""
                                                   name="ccfPromoCode"
                                                   value="{{ old("ccfPromoCode") }}">
                                            @if($errors->has('ccfPromoCode'))
                                                <span class="help-block has-error"> {{ $errors->first('ccfPromoCode') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-8">
                                            <button type="submit" class="btn blue-madison theme-btn">Apply</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> Sub Total</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">
                                                $ {{ $plan->sub_total }}</p>
                                        </div>
                                    </div>

                                    @if(!empty(old("ccfPromoCode")))
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Promotion Applied</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
                                                    $ {{ $plan->discount  }}
                                                    ({{$plan->discount_percentage}}%)</p>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">GST</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$plan->gst}} ({{$plan->gst_percentage}}
                                                %)</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Total</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">
                                                ${{ $plan->total }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">
                                        </label>
                                        <div class="col-md-8">
                                            <div class="mt-checkbox-list {{ $errors->has('condition_terms') ?  'has-error':''}}" data-error-container="#cc_form_error_tc">
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" value="1" name="condition_terms">
                                                    I agree to
                                                    <a href="#" target="_blank">
                                                        CCF Terms &amp; Condition
                                                    </a>
                                                    <span></span>
                                                </label>
                                                <div id="cc_form_error_tc">
                                                    @if($errors->has('condition_terms'))
                                                        <span class="help-block "> {{ $errors->first('condition_terms') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mt-checkbox-list {{ $errors->has('condition_privacy') ?  'has-error':''}}" data-error-container="#cc_form_privacy_error_tc">
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" value="1" name="condition_privacy">
                                                    I agree to
                                                    <a href="#" target="_blank">
                                                        Privacy Policy
                                                    </a>
                                                    <span></span>
                                                </label>
                                                <div id="cc_form_privacy_error_tc">
                                                    @if($errors->has('condition_privacy'))
                                                        <span class="help-block "> {{ $errors->first('condition_privacy') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="col-md-8 form-fileds-center">
                                    <div class="form-actionsx">
                                        <div class="row">
                                            <div class="col-md-offset-4 col-md-8">
                                                <button type="submit" class="btn theme-btn">Finish</button>
                                            </div>
                                        </div>
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