@extends('layouts.sign-up')

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper supplier-subscription">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            <!-- s-FORM -->
            <div class="wrap-ccf-form">
                <div class="portlet light borderedx">
                    <!-- BEGIN PAGE TITLE-->
                    <h1 class="ccf-page-title">Select your Subscription Package</h1>
                    <!-- END PAGE TITLE-->
                    <!-- s- WIZARD PAGINATION -->
                @include('partials.wizard-pagination')
                <!-- e- WIZARD PAGINATION -->

                    <div class="row">
                        <div class="col-md-10 center-align">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, explicabo facilis minus nam
                                                     officiaut.</p>
                        </div>
                    </div>
                    {{--<div class="portlet-title">
                        <div class="caption">

                        </div>

                    </div>--}}
                    <hr/>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="{{ route('supplier_singup_subscription') }}" class="form-horizontal"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="form-actions top-form-action col-md-12">
                                <div class="row">
                                    <div class="col-md-10 clearfix center-align">
                                        <button type="submit" class="btn theme-btn pull-right">Next</button>
                                        {{-- <button type="button" class="btn default">Cancel</button>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-body col-md-10 form-fileds-center">
                                <div class="form-group {{ $errors->has('package')?'has-error':'' }}">
                                    @if($errors->has('package'))
                                        <div>
                                            <div class="form-fileds-center">
                                                <div class="alert alert-danger">
                                                        <span class="help-block has-error"> {{ $errors->first('package') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                     @endif
                                </div>

                                <div class="wrap-subscription-plans">
                                    <div class="wrap-subscription-plans-scroller clearfix">
                                        <?php $planClass = [
                                                'free-trial',
                                                'free-trial',
                                                'small-medium-package',
                                                'large-ent-package',
                                        ]; ?>
                                        @foreach ($categories as $index => $category)
                                            <div class="subscription-plan  {{$planClass[$index]}}">
                                                <h3>{{ $category['name'] }}</h3>
                                                <!-- PLAN -->

                                                @foreach($category['plans'] as $plan)
                                                    <div class="wrap-plan">
                                                        @foreach($plan['components'] as $component)
                                                            <div class="plan-row clearfix">
                                                                <div class="plan-header"><h3>{{$component['name']}}</h3></div>
                                                                @if (!empty($component['quantity']) && $component['quantity'] != 0)
                                                                    <div class="plan-data"><h3>{{$component['quantity']}}</h3></div>
                                                                @else
                                                                    <div class="plan-data"><h3>Unlimited</h3></div>
                                                                @endif

                                                            </div>
                                                        @endforeach
                                                        <div class="plan-row clearfix">
                                                            <div class="plan-header"><h3>Non Member</h3></div>
                                                            @if (!empty($plan['price_non_member']) && $plan['price_non_member'] != 0)
                                                                <div class="plan-data price"><h3>{{round($plan['price_non_member'])}}</h3></div>
                                                            @else
                                                                <div class="plan-data price"><h3>FREE</h3></div>
                                                            @endif

                                                        </div>
                                                        <div class="plan-row clearfix">
                                                            <div class="plan-header"><h3>Member</h3></div>
                                                            @if (!empty($plan['price_member']) && $plan['price_member'] != 0)
                                                                <div class="plan-data price"><h3>{{round($plan['price_member'])}}</h3></div>
                                                            @else
                                                                <div class="plan-data price"><h3>FREE</h3></div>
                                                            @endif
                                                        </div>
                                                        <div class="plan-row">
                                                            <div class="plan-header"><h3></h3></div>

                                                                <div class="plan-data">
                                                                <div class="txt-center wrap-option">
                                                                    <input value="{{$plan['id']}}" type="radio" name="package" class="radio" id="free-trial-{{$plan['id']}}"/>
                                                                    <label class="radio-label" for="free-trial-{{$plan['id']}}"></label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions col-md-12">
                                <div class="row">
                                    <div class="col-md-10 clearfix center-align">
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
            <!-- e-FORM -->
        </div>
    </div>
    <!-- END CONTENT BODY -->


@endsection