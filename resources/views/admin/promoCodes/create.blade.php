@extends('layouts.master-admin')

@section('content')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper portal supplier-portal-job-request admin-manage-users">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE BAR -->

        @include('partials.page_breadcrumb')


        <!-- END PAGE HEADER-->
        <div class="wrap-ccf-form">
            <div class="portlet light bordered">
                <!-- BEGIN PAGE TITLE-->
                <div class="wrap-ccf-page-title">
                    <h1 class="ccf-page-title">Add Promo code</h1>
                    <p>Admin create new promo code. </p>
                </div>

                <!-- END PAGE TITLE-->
                <div class="portlet-body form">
                    @if($current_role == 'edit') 
                    <form onsubmit="return formValidationGeneral('admin_code_update', '{{route('admin.code.validate')}}');" action="{{ route('admin.code.update', $code_data->id) }}" id="admin_code_update" method="post">
                    @else
                    <form onsubmit="return formValidationGeneral('admin_code_store', '{{route('admin.code.validate')}}');" action="{{ route('admin.code.store') }}" id="admin_code_store" method="post">
                    @endif    
                        {{ csrf_field() }}
                        <div class="form-body">

                            <div class="row">

                                <div class="form-group  col-lg-4 col-md-4 col-sm-4 col-xs-12 {{ $errors->has('code_name')?'has-error':'' }}">
                                    <label class="control-label">
                                        Code Name<span class="required" aria-required="true"> * </span>
                                    </label>
                                    <div class="">
                                        <input type="text" class="form-control" placeholder="Code Name" name="code_name" value="{{ old("code_name", $code_data->code_name) }}">
                                        @if($errors->has('code_name'))
                                        <span class="help-block has-error"> {{ $errors->first('code_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group  col-lg-4 col-md-4 col-sm-4 col-xs-12 {{ $errors->has('code_id')?'has-error':'' }}">
                                    <label class="control-label">
                                        Code ID<span class="required" aria-required="true"> * </span>
                                    </label>
                                    <div class="">
                                        <input type="text" class="form-control" placeholder="Coupon Code" name="code_id" value="{{ old("code_id", $code_data->code_id) }}">
                                        @if($errors->has('code_id'))
                                        <span class="help-block has-error"> {{ $errors->first('code_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group  col-lg-4 col-md-4 col-sm-4 col-xs-12 {{ $errors->has('states_id')?'has-error':'' }}">
                                        <label class="control-label ">State<span class="required" aria-required="true"> * </span></label>
                                        <div class="">
                                            <select name="states_id[]" id="states_id" class="form-control select2-multiple" multiple="true">
                                                <option value="">Select</option>
                                                @foreach( $states as $state)
                                                    <option value="{{ $state->short_code }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('states_id'))
                                            <span class="help-block has-error"> {{ $errors->first('states_id') }}</span>
                                            @endif
                                        </div>
                                    </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 {{ $errors->has('status')?'has-error':'' }}">
                                            <label class="control-label ">Status<span class="required" aria-required="true"> * </span></label>
                                            <div class="">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach( $codeStatus as $status_key=>$status)
                                                        <option value="{{$status_key}}" {{ old('status')==$status_key?'selected':'' }}>{{$status}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('status'))
                                                <span class="help-block has-error"> {{ $errors->first('status') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group  col-lg-6 col-md-6 col-sm-6 col-xs-12 {{ $errors->has('discount')?'has-error':'' }}">
                                            <label class="control-label">
                                                Discount (%)<span class="required" aria-required="true"> * </span>
                                            </label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="10" name="discount" value="{{ old("discount", $code_data->discount) }}">
                                                @if($errors->has('discount'))
                                                <span class="help-block has-error"> {{ $errors->first('discount') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 {{ $errors->has('from_date')?'has-error':'' }}">
                                            <label class="control-label">
                                                From <span class="required" aria-required="true"> * </span>
                                            </label>
                                            <div class="">
                                                <div class="input-group  date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="date">
                                                    <input type="text" class="form-control" placeholder="dd-mm-yyyy" name="from_date" value="{{ old("from_date", $code_data->from_date) }}">
                                                   <span class="input-group-btn">
                                                       <button class="btn default " type="button">
                                                           <i class="fa fa-calendar"></i>
                                                       </button>
                                                   </span>
                                                </div>
                                                @if($errors->has('from_date'))
                                                <span class="help-block has-error"> {{ $errors->first('from_date') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 {{ $errors->has('to_date')?'has-error':'' }}">
                                            <label class="control-label">
                                                To <span class="required" aria-required="true"> * </span>
                                            </label>
                                            <div class="">
                                                <div class="input-group  date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="date">
                                                    <input type="text" class="form-control" placeholder="dd-mm-yyyy" name="to_date" value="{{ old("to_date", $code_data->to_date) }}">
                                                    <span class="input-group-btn">
                                                        <button class="btn default " type="button">
                                                           <i class="fa fa-calendar"></i>
                                                        </button>
                                                    </span>
                                                </div>

                                                @if($errors->has('to_date'))
                                                <span class="help-block has-error"> {{ $errors->first('to_date') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                    </div>
                                </div>




                            </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label class="control-label">
                                        Description
                                    </label>
                                    <div class="">
                                        <textarea name="description" class="form-control two-label-row-height">{{old("description", $code_data->description)}}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class=" col-md-12">
                                    <div class="form-actions">
                                    @if($current_role == 'edit') 
                                        <button type="submit" class="btn theme-btn"><i class="fa fa-upload" aria-hidden="true"></i> Update</button>
                                    @else
                                        <button type="submit" class="btn theme-btn"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
                                    @endif
                                    <a type="button" class="btn default" href="{{route('admin.code.list')}}"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>

                            </div>
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
