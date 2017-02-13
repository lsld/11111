
<form role="form" onsubmit="return modalFormValidationAndSave('supplierPlantEdit', '{{route('edit_plant_services')}}');"  name="supplierPlantEdit" id="supplierPlantEdit"  method="POST" action="{{ route('edit_plant_services') }}" class="form-horizontal">
    {{ method_field('PUT') }}

    {{ csrf_field() }}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true"></button>
            <h4 class="modal-title">Plant Hire</h4>
        </div>
        <div class="modal-body">
            <div class="form-group {{ $errors->has('itemtype')?'has-error':'' }}">
                <label class="col-md-4">Item Type<span class="required" aria-required="true"> * </span></label>
                <div class="col-md-8">


                    <select id="itemtype" class="form-control" name="itemtype">
                        <option value="">Select</option>
                        @foreach($itemTypes as $itemType)
                            @if($plantService->main_category == $itemType['id'])
                                <option value="{{ $itemType['id'] }}" selected>{{ $itemType['label'] }}</option>
                             @else
                               <option value="{{ $itemType['id'] }}" >{{ $itemType['label'] }}</option>
                             @endif
                        @endforeach


                    </select>
                    @if($errors->has('itemtype'))
                        <span class="help-block has-error"> {{ $errors->first('itemtype') }}</span>
                    @endif
                </div>
            </div>


            <div class="form-group {{ $errors->has('hiretype')?'has-error':'' }}">
                <label class=" col-md-4">Hire Type<span class="required" aria-required="true"> * </span></label>
                <div class="col-md-8">

                   <select id="hiretype" class="form-control" name="hiretype">
                        <option value="">Select</option>
                            @foreach(\App\Constants\HireTypes::HireTypes as $key => $value)
                            @if($plantService->HireType->id ==  $key )
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                            <option value="{{ $key }}" >{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('hiretype'))
                        <span class="help-block has-error"> {{ $errors->first('hiretype') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('desc')?'has-error':'' }}">
                <label class=" col-md-4">Description<span class="required" aria-required="true"> * </span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder=""  id="desc" name="desc" value="{{ $plantService->description}}">
                    @if($errors->has('desc'))
                        <span class="help-block has-error"> {{ $errors->first('desc') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('quantity')?'has-error':'' }}">
                <label class="col-md-4">Quantity<span class="required" aria-required="true"> * </span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="" name="quantity" id="quantity"  value="{{ $plantService->quantity }}">
                    @if($errors->has('quantity'))
                        <span class="help-block has-error"> {{ $errors->first('quantity') }}</span>
                    @endif
                </div>
            </div>

            <input type="hidden" name="_type" value="plant">

            <input type="hidden" name="tenant_id" value="{{tenant()}}">

            <input type="hidden" name="id" value="{{$plantService->id}}">

        </div>
        <div class="modal-footer">
            <span id="supplierPlantEdit_validation_message_area" class="help-block has-error" style="display: none; "></span>
            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close
            </button>
            <button type="submit" name="send" id="send" class="btn theme-btn">Update & Save</button>
        </div>

</form>

<script src="/assets/pages/scripts/supplier-services-validations.js" type="text/javascript"></script>

