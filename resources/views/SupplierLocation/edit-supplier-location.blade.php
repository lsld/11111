
<input type="hidden" name="_token" value="{!! csrf_token() !!}">


{{--s- FORM FIELD--}}
<div class="form-group ">
    <label class=" col-md-4 control-label">State<span class="required" aria-required="true"> * </span></label>
    <div class="col-md-8 {{ $errors->has('states_id')||$errors->has('locations')?'has-error':'' }}">
        <select name="states_id" id="states_id1" class="form-control">
            <option value="">Select</option>
            @foreach($states as $state)
                @if(isset($locationRegion->states_id))
                    @if($locationRegion->states_id == $state->id)
                    <option value="{{ $state->id }}" {{ old('states_id')==$state->id?'selected':'' }} selected>{{ $state->name }}</option>
                    @else
                    <option value="{{ $state->id }}" {{ old('states_id')==$state->id?'selected':'' }}>{{ $state->name }}</option>
                    @endif
                @else
                    <option value="{{ $state->id }}" {{ old('states_id')==$state->id?'selected':'' }}>{{ $state->name }}</option>
                @endif
            @endforeach
        </select>
        @if($errors->has('states_id'))
            <span class="help-block has-error"> {{ $errors->first('states_id') }}</span>
        @endif
    </div>
</div>
{{--e- FORM FIELD--}}


<div class="" id="rest_properties_form">

    <input type="hidden" id="regions_load_url1" value="{{route('getRegionsByStateId')}}">

    <div class="form-group">
        <label class="col-md-4 control-label">Region<span class="required" aria-required="true"> * </span></label>
        <div class="col-md-8 {{ $errors->has('regions_id')||$errors->has('locations')?'has-error':'' }}" id="regions-sec"
        @if($allRegionsselected == true) readonly @endif>
            <select  name="regions_id[]" id="regions_id1" class="form-control select2-multiple select2-accessible regions_id1" multiple="" tabindex="-1" aria-hidden="true">
                        @foreach($selectedRegions as $key => $val)
                            @foreach($relatedRegions as $region)
                                    @if($val == $region->id)
                                        <option value="{{ $region->id }}" {{ old('regions_id')==$state->id?'selected':'' }} selected >{{ $region->name }}</option>
                                    @else
                                        <option value="{{ $region->id }}" {{ old('regions_id')==$state->id?'selected':'' }}>{{ $region->name }}</option>
                                    @endif
                            @endforeach
                        @endforeach
            </select>
            @if($errors->has('regions_id'))
                <span class="help-block has-error"> {{ $errors->first('regions_id') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class=" col-md-4 control-label"></label>
        <div class="col-md-8">
            <p>All</p>
            <label class="mt-checkbox">
                @if($allRegionsselected == true)
                <input checked type="checkbox"  class="form-control" name="select_all_regions" id="select_all_regions1" value="1">
                <span></span>
                @else
                <input  type="checkbox"  class="form-control" name="select_all_regions" id="select_all_regions1" value="1">
                <span></span>
                @endif
            </label>
        </div>
    </div>

@include('components.component-my-account-location')


<input type="hidden" name="id" value="{{$locationRegion->id}}">

</div>

<div class="modal-footer">
    <span id="supplier_location_edit_validation_message_area" class="help-block has-error" style="display: none; "></span>
    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
    <button type="submit" name="sendUpdate" id="sendUpdate" class="btn theme-btn" onclick="return modalFormValidationAndSave('supplier_location_edit', '{{route('edit_supplier_locations')}}');">Save</button>
</div>


<script type="text/javascript">
    $(".select2-multiple").select2();
</script>


<script type="text/javascript">
    $( document ).ready(function(){

        if ($('#select_all_regions1').prop('checked')) {
            $('#regions_id1').attr("disabled", true);
        }

        $('#select_all_regions1').change(function(){
            if(this.checked)
                $('#regions_id1').attr("disabled", true);
            else
                $('#regions_id1').attr("disabled", false);
        });

        $('.membership_id_not_available').hide();

        $('.ck_membership').change(function(){
            if(this.checked)
                $('.membershipId').show();
            else
                $('.membershipId').hide();
        });

        /* disable the drop down */
        $('#states_id1 option:not(:selected)').prop('disabled', true);
    });
</script>

