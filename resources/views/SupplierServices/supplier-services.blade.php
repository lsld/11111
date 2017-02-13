@extends('layouts.master')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper my-service portal">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BAR -->

        @include('partials.page_breadcrumb')

            <!-- END PAGE TITLE-->
            {{-- ============================================ CONTENTS ====================================--}}
            <div class="wrap-ccf-form">
                <div class="portlet light bordered">
                    <form action="" class="form-horizontal" method="POST">

                        {{--================================= FLASH MESSAGE ===============================--}}
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
                        {{--================================= FLASH MESSAGE ===============================--}}

                        {{--================================= PAGE TITLE ==================================--}}
                        <div class="wrap-ccf-page-title">
                            <h1 class="ccf-page-title">My Services</h1>
                            <p>Add the services you wish to quote for</p>
                            <div class="note note-info">
                                <p>You can add <span class="wrap-info-box"><span class="info-box-highlight">{{$SericeLimitsList['Machines']}}</span> Plant Hires</span> , <span class="wrap-info-box"><span class="info-box-highlight">{{$SericeLimitsList['Contracting']}}</span> Contracting</span> , <span class="wrap-info-box"><span class="info-box-highlight">{{$SericeLimitsList['Material']}}</span> Material</span> and <span class="wrap-info-box"><span class="info-box-highlight">{{$SericeLimitsList['Material/Fill']}}</span> Fill</span> according to your subscription</p>
                            </div>
                        </div>
                        {{--================================= PAGE TITLE ==================================--}}

                        {{--================================= PAGE CONTENTS ===============================--}}
                        <div class="portlet-body form">
                            <div class="form-body row">
                                <div class="col-md-12">
                                    {{--========================= PLANT HIRE ==================================--}}
                                    <div>
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <h3>Plant Hire</h3>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <a data-toggle="modal" href="#planthire" class="btn theme-btn">Add Plant</a>
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
                                                            <th>Action</th>
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
                                                                <td>
                                                                    <a data-toggle="modal" data-target="#myModal" href="{{route('view_edit_plant_services', $plantHireTableDataItem->id)}}" {{--class="btn btn-xs btn-default plant-edit modal-link"--}} title="Edit"> Edit{{--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--}}</a> |
                                                                    <a onclick="return confirm('Are you sure you want to delete?');" href="{{route('plant_Service_delete', $plantHireTableDataItem->id)}}" {{--class="btn btn-xs btn-default"--}} title="Delete">Delete{{--<i class="fa fa-trash-o" aria-hidden="true"></i>--}}</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    {{--========================= PLANT HIRE ==================================--}}

                                    {{--========================= CONTRACTING ================================ --}}
                                    <div>
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <h3>Contracting</h3>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <a data-toggle="modal" href="#contracting" class="btn theme-btn">Add Contracting</a>
                                        </div>
                                        <div class="form-group clearfix">
                                            @if($contractingTableData->count())
                                                <div class="table-scrollable">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Types of Work</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Action</th>
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
                                                                <td>

                                                                    <a data-toggle="modal" data-target="#myModal" href="{{route('view_edit_contracting_services', $contractingTableDataItem->id)}}" {{--class="btn btn-xs btn-default contracting-edit modal-link"--}} title="Edit">Edit{{--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--}}</a> |
                                                                    <a onclick="return confirm('Are you sure you want to delete?');" href="{{route('contracting_Service_delete', $contractingTableDataItem->id)}}" {{--class="btn btn-xs btn-default" --}}title="Delete">Delete{{--<i class="fa fa-trash-o" aria-hidden="true"></i>--}}</a></td>
                                                            </tr>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    {{--========================= CONTRACTING ================================ --}}

                                    {{--========================= MATERIAL ====================================--}}
                                    <div>
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <h3>Material</h3>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <a data-toggle="modal" href="#material" class="btn theme-btn">Add Material</a>
                                        </div>
                                        <div class="form-group clearfix">
                                            @if($materialTableData->count())
                                                <div class="table-scrollable">

                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Resource Type</th>
                                                            <th scope="col">Quality</th>
                                                            <th>Action</th>
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
                                                                <td>
                                                                    <a data-toggle="modal" data-target="#myModal"
                                                                        href="{{route('view_edit_material_services', $materialTableDataItem->id)}}"
                                                                        {{--class="btn btn-xs btn-default contracting-edit modal-link"--}} title="Edit">Edit{{--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--}}</a> |
                                                                    <a  onclick="return confirm('Are you sure you want to delete?');"
                                                                        href="{{route('material_Service_delete', $materialTableDataItem->id)}}"
                                                                                                                                        {{--class="btn btn-xs btn-default"--}} title="View">Delete{{--<i class="fa fa-trash-o" aria-hidden="true"></i>--}}</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    {{--========================= MATERIAL ====================================--}}

                                    {{--========================= FILL ========================================--}}
                                    <div>
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <h3>Fill</h3>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <a data-toggle="modal" href="#fill" class="btn theme-btn">Add Fill</a>
                                        </div>
                                        <div class="form-group clearfix">
                                            @if($fillTableData->count())
                                                <div class="table-scrollable">

                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Fill Type</th>
                                                            <th scope="col">Fill Quality</th>
                                                            <th scope="col"> Can load and carry</th>
                                                            <th>Action</th>
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
                                                                <td>
                                                                    <a
                                                                        data-toggle="modal" data-target="#myModal"
                                                                        href="{{route('view_edit_fill_services', $fillTableDataItem->id)}}"
                                                                        {{--class="btn btn-xs btn-default plant-edit modal-link" --}}title="Edit">Edit
                                                                        {{--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--}}
                                                                    </a> |
                                                                    <a  onclick="return confirm('Are you sure you want to delete?');"
                                                                        href="{{route('fill_Service_delete', $fillTableDataItem->id)}}"
                                                                        {{--class="btn btn-xs btn-default"--}} title="Delete">Delete
                                                                        {{--<i class="fa fa-trash-o" aria-hidden="true"></i>--}}
                                                                    </a>

                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    {{--========================= FILL ========================================--}}
                                </div>
                            </div>
                        </div>
                        {{--================================= PAGE CONTENTS ===============================--}}
                    </form>
                </div>
            </div>
            {{-- ============================================ CONTENTS ====================================--}}

        </div>
        <!-- END CONTENT BODY -->

        {{--s-MODAL-PLANR HIRE --}}
        <div class="modal fade" id="planthire" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">

                <form role="form" onsubmit="return modalFormValidationAndSave('supplierPlant', '{{route('plant_services')}}');" name="supplierPlant" id="supplierPlant"  method="POST" action="{{ route('plant_services') }}" class="form-horizontal">

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
                                            <option @if(in_array($itemType['id'], $availableDataIdList['plantHire']))
                                                    disabled="disabled"
                                                    @endif
                                                    value="{{ $itemType['id'] }}" >{{ $itemType['label'] }}</option>
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
                                            <option value="{{ $key }}" >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('hiretype'))
                                        <span class="help-block has-error"> {{ $errors->first('hiretype') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('desc')?'has-error':'' }}">
                                <label class=" col-md-4 control-label">Description<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder=""  id="desc" name="desc" value="{{ old("desc") }}">
                                    @if($errors->has('desc'))
                                        <span class="help-block has-error"> {{ $errors->first('desc') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('quantity')?'has-error':'' }}">
                                <label class=" col-md-4 control-label">Quantity<span class="required" aria-required="true"> * </span></label>
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
        {{--e-MODAL-PLANR HIRE --}}

        {{--s-MODAL-CONTRACTING --}}
        <div class="modal fade" id="contracting" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <form role="form" onsubmit="return modalFormValidationAndSave('supplierContracting', '{{route('contracting_services')}}');" name="supplierContracting" id="supplierContracting"  method="POST" action="{{ route('contracting_services') }}" class="form-horizontal">
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
                                            <option
                                                    @if(in_array($workType['id'], $availableDataIdList['contracting']))
                                                    disabled="disabled"
                                                    @endif
                                                    value="{{ $workType['id'] }}" >{{ $workType['label'] }}</option>
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
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close
                            </button>
                            <button type="submit" name="send" id="send" class="btn theme-btn">Add</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-dialog -->
            </div>
        </div>
        {{--e-MODAL-CONTRACTING --}}

        {{--s-MODAL-MATERIAL --}}
        <div class="modal fade" id="material" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">

                <form role="form" onsubmit="return modalFormValidationAndSave('supplierMaterial', '{{route('material_services')}}');" name="supplierMaterial" id="supplierMaterial" method="POST" action="{{ route('material_services') }}" class="form-horizontal">
                    <div class="modal-content">
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
                                            <option
                                                    @if(in_array($resourceType['id'], $availableDataIdList['material']))
                                                        disabled="disabled"
                                                    @endif
                                            value="{{ $resourceType['id'] }}" >{{ $resourceType['name'] }}</option>
                                        @endforeach
                                    </select>


                                    @if($errors->has('resourcetype'))
                                        <span class="help-block has-error"> {{ $errors->first('resourcetype') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('quality')?'has-error':'' }}">
                                <label class=" col-md-4 control-label">Quality<span class="required" aria-required="true"> * </span></label>
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
        {{--e-MODAL-MATERIAL --}}

        {{--s-MODAL-FILL --}}
        <div class="modal fade" id="fill" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">

                <form role="form" onsubmit="return modalFormValidationAndSave('supplierFill', '{{route('fill_services')}}');" name="supplierFill" id="supplierFill" method="POST" action="{{ route('fill_services') }}" class="form-horizontal">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true"></button>
                                <h4 class="modal-title">Fill</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group {{ $errors->has('filltype')?'has-error':'' }}">
                                    <label class="col-md-4 control-label">Fill Type<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-8">


                                        <select id="filltype" class="form-control" name="filltype">
                                            <option value="">Select</option>

                                            @foreach($fillTypes as $fillType)
                                                <option
                                                        @if(in_array($fillType['id'], $availableDataIdList['fill']))
                                                                disabled="disabled"
                                                        @endif
                                                value="{{ $fillType['id'] }}" >{{ $fillType['name'] }}</option>
                                            @endforeach
                                        </select>


                                        @if($errors->has('filltype'))
                                            <span class="help-block has-error"> {{ $errors->first('filltype') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('fillquality')?'has-error':'' }}">
                                    <label class=" col-md-4 control-label">Fill Quality<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" id="fillquality" name="fillquality" value="{{ old("fillquality") }}">
                                        @if($errors->has('fillquality'))
                                            <span class="help-block has-error"> {{ $errors->first('fillquality') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('loadandcarry')?'has-error':'' }}">
                                    <label class="col-md-4 control-label">Can load and carry<span class="required" aria-required="true"> * </span></label>
                                    <div class="col-md-8">
{{--
                                        <input type="text" class="form-control" placeholder="" id="loadandcarry" name="loadandcarry" value="{{ old("loadandcarry") }}">
--}}

                                            <label class="mt-radio">
                                                <input type="radio" placeholder=""  name="loadandcarry" value="{{ "yes" }}"> Yes
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" placeholder=""  name="loadandcarry" value="{{ "No" }}">No
                                                <span></span>
                                            </label>
                                        @if($errors->has('loadandcarry'))
                                            <span class="help-block has-error"> {{ $errors->first('loadandcarry') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                                <input type="hidden" name="_type" value="fill">

                                <input type="hidden" name="tenant_id" value="{{$tenantId}}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="clearButton" class="btn dark btn-outline" data-dismiss="modal">Close
                                </button>
                                <button type="submit" name="send" id="send" class="btn theme-btn">Add</button>
                            </div>
                        </div>

                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    {{--e-MODAL-FILL --}}

    <!-- END CONTENT BODY -->

    </div>
    <!-- END CONTENT -->


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body"><div class="te"></div></div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- END CONTENT -->
@endsection


@section('scripts')

    <script src="/assets/pages/scripts/supplier-services-validations.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
                $("label.error").hide();
                $(".error").removeClass("error");
                $(this).removeData('bs.modal');
            });
        });

    </script>
@endsection