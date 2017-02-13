
@extends('layouts.sign-up')

@section('content')


    <div class="page-content-wrapper supplier-service">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            {{--s-FORM--}}
            <div class="wrap-ccf-form">

                <div class="portlet light ">
                    <!-- BEGIN PAGE TITLE-->
                    <h1 class="ccf-page-title">Add Your Services</h1>
                    <!-- END PAGE TITLE-->

                    <!-- s- WIZARD PAGINATION -->
                @include('partials.wizard-pagination')
                <!-- e- WIZARD PAGINATION -->

                    {{-- s- DESCRIPTION --}}
                    <div class="row">
                        <div class="col-md-10 center-align">
                            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, voluptatibus.</p>
                        </div>
                    </div>
                    {{-- e- DESCRIPTION --}}

                <!-- s-FORM HEADING -->
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-md-10 center-align">
                                <div class="caption">
                                    <h3 class="clearfix">

                                        @if (session('checkSupplierService') == 0)
                                            <form action="{{ route("supplier_singup_services_skip") }}" method="POST" class="pull-right wrap-btn-skip">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="skip" value="skip">
                                                <button type="submit" class="btn btn-skip theme-btn">Complete Later  <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                                {{-- <button type="button" class="btn default">Cancel</button>--}}
                                            </form>
                                        @else
                                        @endif

                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- e-FORM HEADING -->


                    {{-- =============================== ADD SERVICESS ==================================== --}}
                    <div class="portlet-body form">

                        {{-- =========================== NEXT BUTTON ====================================== --}}
                        <div class="form-actions top-form-action col-md-12">
                            <div class="row">
                                <div class="col-md-10 clearfix center-align">
                                    <form action="{{ route('supplier_service_complete') }}" method="POST">

                                        {{ csrf_field() }}

                                        <button type="submit" class="btn theme-btn pull-right">Next</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- =========================== NEXT BUTTON ====================================== --}}

                        {{-- =========================== SERVICES ========================================= --}}
                        <div class="form-body col-md-10 form-fileds-center">
                            {{-- =========================== FLASH MESSAGE ==================================== --}}
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        </p>
                                    @endif
                                @endforeach
                            </div>


                            @if($errors->has('Service'))
                                <div class="form-group clearfix ">
                                    <div class="col-md-8 form-fileds-center"><div class="alert alert-danger">
                                            Please specify fields to continue.
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{-- =========================== FLASH MESSAGE ==================================== --}}
                            {{-- ======================= PLANT HIRE ======================================= --}}
                            <div class="service">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h3>Plant Hire</h3>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <a data-toggle="modal" href="#planthire" class="btn theme-btn col-md-2">Add Plant</a>
                                </div>
                                <div class="form-group clearfix">
                                    @if($plantHireTableData->count())
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover" >
                                                <thead>
                                                <tr>
                                                    <th scope="col">Item Type</th>
                                                    <th scope="col">Hire Type</th>
                                                    <th scope="col"> Description</th>
                                                    <th scope="col"> Quantity</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($plantHireTableData as $plantHireTableDataItem)
                                                    <tr>
                                                        @foreach($itemTypes as $itemType)
                                                            @if($itemType['id'] == $plantHireTableDataItem->main_category)
                                                                <td>{{$itemType['label'] }}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>@if($plantHireTableDataItem->hire_type_id == 1){{"Wet Hire"}} @elseif($plantHireTableDataItem->hire_type_id == 2){{"Dry Hire"}} @endif</td>
                                                        <td>{{$plantHireTableDataItem->description }}</td>
                                                        <td>{{$plantHireTableDataItem->quantity }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- ======================= PLANT HIRE ======================================= --}}

                            {{-- ======================= CONTRACTING ====================================== --}}
                            <div class="service">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h3>Contracting</h3>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <a data-toggle="modal" href="#contracting" class="btn theme-btn col-md-2">Add Contracting</a>
                                </div>
                                <div class="form-group clearfix">
                                    @if($contractingTableData->count())
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Types of Work</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($contractingTableData as $contractingTableDataItem)
                                                    <tr>
                                                        @foreach($workTypes as $workType)
                                                            @if($workType['id'] == $contractingTableDataItem->main_category)
                                                                <td>{{$workType['label']}}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>{{$contractingTableDataItem->description}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- ====================== CONTRACTING ======================================= --}}

                            {{-- ====================== MATERIAL ========================================== --}}
                            <div class="service">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h3>Material</h3>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <a data-toggle="modal" href="#material" class="btn theme-btn col-md-2">Add Material</a>
                                </div>
                                <div class="form-group clearfix">
                                    @if($materialTableData->count())
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover" >
                                                <thead>
                                                <tr>
                                                    <th scope="col">Resource Type</th>
                                                    <th scope="col">Quality</th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($materialTableData as $materialTableDataItem)
                                                    <tr>
                                                        @foreach($resourceTypes as $resourceType)
                                                            @if($resourceType['id'] == $materialTableDataItem->main_category)
                                                                <td>{{ $resourceType['name']  }}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>{{$materialTableDataItem->quality }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- ====================== MATERIAL ========================================== --}}

                            {{-- ====================== FILL ============================================== --}}
                            <div class="service">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h3>Fill</h3>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <a data-toggle="modal" href="#fill" class="btn theme-btn col-md-2">Add Fill</a>
                                </div>
                                <div class="form-group clearfix">
                                    @if($fillTableData->count())
                                        <div class="table-scrollable">

                                            <table class="table table-striped table-bordered table-hover" >
                                                <thead>
                                                <tr>
                                                    <th scope="col">Fill Type</th>
                                                    <th scope="col">Fill Quality</th>
                                                    <th scope="col"> Can load and carry</th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($fillTableData as $fillTableDataItem)
                                                    <tr>
                                                        @foreach($fillTypes as $fillType)
                                                            @if($fillType['id'] == $fillTableDataItem->main_category)
                                                                <td>{{$fillType['name']}}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>{{$fillTableDataItem->fill_quality }}</td>
                                                        <td>{{$fillTableDataItem->can_load_and_carry }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- ====================== FILL ============================================== --}}
                        </div>
                        {{-- =========================== SERVICES ========================================= --}}

                        {{-- =========================== NEXT BUTTON ====================================== --}}
                        <div class="form-actions col-md-12">
                            <div class="row">
                                <div class="col-md-10 clearfix center-align">
                                    <form action="{{ route('supplier_service_complete') }}" method="POST">

                                        {{ csrf_field() }}

                                        <button type="submit" class="btn theme-btn pull-right">Next</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- =========================== NEXT BUTTON ====================================== --}}

                    </div>
                {{-- =============================== ADD SERVICESS ==================================== --}}
                <!-- s-FORM FIELDS -->



                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->

        {{-- =========================================== MODAL-PLANR HIRE =========================================== --}}
        <div class="modal fade" id="planthire" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">

                <form onsubmit="return modalFormValidationAndSave('supplierPlant', '{{route('supplier_plant_services')}}');" role="form" name="suppliehrPlant" id="supplierPlant"  method="POST" action="{{ route('supplier_plant_services') }}" class="form-horizontal">

                    {{ csrf_field() }}

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true"></button>
                            <h4 class="modal-title">Plant Hire</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group {{ $errors->has('itemtype')?'has-error':'' }}">
                                <label class="col-md-4 control-label">Item Type<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">


                                    <select id="itemtype" class="form-control" name="itemtype">
                                        <option value="">Select</option>

                                        @foreach($itemTypes as $itemType)
                                            <option value="{{ $itemType['id'] }}"
                                                    @if(in_array($itemType['id'], $availableDataIdList['plantHire']))
                                                        disabled="disabled"
                                                    @endif
                                                    >{{ $itemType['label'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('itemtype'))
                                        <span class="help-block has-error"> {{ $errors->first('itemtype') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group {{ $errors->has('hiretype')?'has-error':'' }}">
                                <label class="col-md-4 control-label">Hire Type<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">

                                    <select id="hiretype" class="form-control" name="hiretype">
                                        <option value="">Select</option>
                                        @foreach(\App\Constants\HireTypes::HireTypes as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('hiretype'))
                                        <span class="help-block has-error"> {{ $errors->first('hiretype') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('desc')?'has-error':'' }}">
                                <label class="col-md-4 control-label">Description<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder=""  id="desc" name="desc" value="{{ old("desc") }}">
                                    @if($errors->has('desc'))
                                        <span class="help-block has-error"> {{ $errors->first('desc') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('quantity')?'has-error':'' }}">
                                <label class="col-md-4 control-label">Quantity<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="" name="quantity" id="quantity"  value="{{ old("quantity") }}">
                                    @if($errors->has('quantity'))
                                        <span class="help-block has-error"> {{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>
                            </div>

                            <input type="hidden" name="_type" value="plant">
                            <input type="hidden" name="tenant_id" value="{{$tenantId}}">


                        </div>
                        <div class="modal-footer">
                            <span id="supplierPlant_validation_message_area" class="help-block has-error" style="display: none; "></span>
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                            <button type="submit" name="send" id="send" class="btn theme-btn">Add</button>
                        </div>


                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- =========================================== MODAL-PLANR HIRE =========================================== --}}

        {{-- =========================================== MODAL-CONTRACTING ========================================== --}}
        <div class="modal fade" id="contracting" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">


                <form onsubmit="return modalFormValidationAndSave('supplierContracting', '{{route('supplier_contracting_services')}}');" role="form" name="supplierContracting" id="supplierContracting"  method="POST" action="{{ route('supplier_contracting_services') }}" class="form-horizontal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true"></button>
                            <h4 class="modal-title">Contracting</h4>
                        </div>

                        <div class="modal-body">


                            <div class="form-group {{ $errors->has('typeofwork')?'has-error':'' }}">
                                <label class="col-md-4 control-label">Work Type<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                    <select id="typeofwork" class="form-control" name="typeofwork">

                                        <option value="">Select</option>

                                        @foreach($workTypes as $workType)
                                            <option value="{{ $workType['id'] }}"
                                                    @if(in_array($workType['id'], $availableDataIdList['contracting']))
                                                        disabled="disabled"
                                                    @endif
                                                    >{{ $workType['label'] }}</option>
                                        @endforeach
                                    </select>


                                    @if($errors->has('typeofwork'))
                                        <span class="help-block has-error"> {{ $errors->first('typeofwork') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group {{ $errors->has('')?'has-error':'' }}">
                                <label class="col-md-4 control-label">Description<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">

                                    <input type="text" class="form-control" placeholder=""  id="description" name="description">

                                    @if($errors->has(''))
                                        <span class="help-block has-error">{{ $errors->first('') }}</span>
                                    @endif
                                </div>
                            </div>


                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                            <input type="hidden" name="_type" value="contracting">

                            <input type="hidden" name="tenant_id" value="{{$tenantId}}">


                            </div>
                            <div class="modal-footer">
                                <span id="supplierContracting_validation_message_area" class="help-block has-error" style="display: none; "></span>
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="submit" name="send" id="send" class="btn theme-btn">Add</button>
                            </div>

                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- =========================================== MODAL-CONTRACTING ========================================== --}}

        {{-- =========================================== MODAL-MATERIAL ============================================= --}}
        <div class="modal fade" id="material" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">

                <form onsubmit="return modalFormValidationAndSave('supplierMaterial', '{{route('supplier_material_services')}}');" role="form" name="supplierMaterial" id="supplierMaterial" method="POST" action="{{ route('supplier_material_services') }}" class="form-horizontal">                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true"></button>
                            <h4 class="modal-title">Material</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group {{ $errors->has('resourcetype')?'has-error':'' }}">
                                <label class="col-md-4 control-label">Resource Type<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">


                                    <select id="resourcetype" class="form-control" name="resourcetype">

                                        <option value="">Select</option>

                                        @foreach($resourceTypes as $resourceType)
                                            <option value="{{ $resourceType['id'] }}"
                                                    @if(in_array($resourceType['id'], $availableDataIdList['material']))
                                                        disabled="disabled"
                                                    @endif
                                                    >{{ $resourceType['name'] }}</option>
                                        @endforeach
                                    </select>


                                    @if($errors->has('resourcetype'))
                                        <span class="help-block has-error"> {{ $errors->first('resourcetype') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('quality')?'has-error':'' }}">
                                <label class="col-md-4 control-label">Quality<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder=""  id="quality" name="quality" value="{{ old("quality") }}">
                                    @if($errors->has('quality'))
                                        <span class="help-block has-error"> {{ $errors->first('quality') }}</span>
                                    @endif
                                </div>
                            </div>


                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                            <input type="hidden" name="_type" value="material">

                            <input type="hidden" name="tenant_id" value="{{$tenantId}}">


                        </div>
                        <div class="modal-footer">
                            <span id="supplierMaterial_validation_message_area" class="help-block has-error" style="display: none; "></span>
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close
                            </button>
                            <button type="submit" name="send" id="send" class="btn theme-btn">Add</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- =========================================== MODAL-MATERIAL ============================================= --}}

        {{-- =========================================== MODAL-FILL ================================================= --}}
        <div class="modal fade" id="fill" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">

                <form onsubmit="return modalFormValidationAndSave('supplierFill', '{{route('supplier_fill_services')}}');" role="form" name="supplierFill" id="supplierFill" method="POST" action="{{ route('supplier_fill_services') }}" class="form-horizontal">
                    {{ csrf_field() }}

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true"></button>
                                <h4 class="modal-title">Fill</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group {{ $errors->has('filltype')?'has-error':'' }}">
                                    <label class="col-md-4  control-label">Fill Type<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-8">


                                        <select id="filltype" class="form-control" name="filltype">
                                            <option value="">Select</option>

                                            @foreach($fillTypes as $fillType)
                                                <option value="{{ $fillType['id'] }}"
                                                        @if(in_array($fillType['id'], $availableDataIdList['fill']))
                                                        disabled="disabled"
                                                        @endif
                                                        >{{ $fillType['name'] }}</option>
                                            @endforeach
                                        </select>


                                        @if($errors->has('filltype'))
                                            <span class="help-block has-error xxx"> {{ $errors->first('filltype') }}</span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group {{ $errors->has('fillquality')?'has-error':'' }}">
                                    <label class="col-md-4  control-label">Fill Quality<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" id="fillquality" name="fillquality" value="{{ old("fillquality") }}">
                                        @if($errors->has('fillquality'))
                                            <span class="help-block has-error"> {{ $errors->first('fillquality') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('loadandcarry')?'has-error':'' }}">
                                    <label class="col-md-4  control-label">Can load and carry<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-8">
                                        <div class="mt-radio-list" data-error-container="#can_load_carry_error">
                                            <label class="mt-radio">
                                               <input type="radio" placeholder=""  name="loadandcarry" value="{{ "yes" }}" > Yes
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                               <input type="radio" placeholder=""  name="loadandcarry" value="{{ "No" }}">No
                                                <span></span>
                                            </label>
                                            <div id="can_load_carry_error"> </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                                <input type="hidden" name="_type" value="fill">

                                <input type="hidden" name="tenant_id" value="{{$tenantId}}">
                            </div>
                            <div class="modal-footer">
                                <span id="supplierFill_validation_message_area" class="help-block has-error" style="display: none; "></span>
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close
                                </button>
                                <button type="submit" name="send" id="send" class="btn theme-btn">Add</button>
                            </div>
                        </div>

                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- =========================================== MODAL-FILL ================================================= --}}
    </div>
@endsection

