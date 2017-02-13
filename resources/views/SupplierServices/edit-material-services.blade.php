<form role="form" onsubmit="return modalFormValidationAndSave('supplierMaterialEdit', '{{route('edit_material_services')}}');" name="supplierMaterialEdit" id="supplierMaterialEdit" method="POST" action="{{ route('edit_material_services') }}" class="form-horizontal">

    {{ method_field('PUT') }}

    {{ csrf_field() }}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true"></button>
            <h4 class="modal-title">Material</h4>
        </div>
        <div class="modal-body">
            <div class="form-group {{ $errors->has('resourcetype')?'has-error':'' }}">
                <label class=" col-md-4">Resource Type<span class="required" aria-required="true"> * </span></label>
                <div class="col-md-8">


                    <select id="resourcetype" class="form-control" name="resourcetype">

                        <option value="">Select</option>

                        @foreach($resourceTypes as $resourceType)
                            @if($materialService->main_category == $resourceType['id'])
                            <option value="{{ $resourceType['id'] }}" selected>{{ $resourceType['name'] }}</option>
                             @else
                              <option value="{{ $resourceType['id'] }}" >{{ $resourceType['name'] }}</option>
                            @endif
                        @endforeach
                    </select>


                    @if($errors->has('resourcetype'))
                        <span class="help-block has-error"> {{ $errors->first('resourcetype') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('quality')?'has-error':'' }}">
                <label class=" col-md-4">Quality<span class="required" aria-required="true"> * </span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder=""  id="quality" name="quality" value="{{ $materialService->quality }}">
                    @if($errors->has('quality'))
                        <span class="help-block has-error"> {{ $errors->first('quality') }}</span>
                    @endif
                </div>
            </div>


            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

            <input type="hidden" name="_type" value="material">

            <input type="hidden" name="tenant_id" value="{{tenant()}}">

            <input type="hidden" name="id" value="{{$materialService->id}}">

        </div>
        <div class="modal-footer">
            <span id="supplierMaterialEdit_validation_message_area" class="help-block has-error" style="display: none; "></span>
            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close
            </button>
            <button type="submit" name="send" id="send" class="btn theme-btn">Update & Save</button>
        </div>
</form>

<script src="/assets/pages/scripts/supplier-services-validations.js" type="text/javascript"></script>
