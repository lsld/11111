

<form role="form" onsubmit="return modalFormValidationAndSave('supplierFillEdit', '{{route('edit_fill_services')}}');" name="supplierFillEdit" id="supplierFillEdit" method="POST" action="{{ route('edit_fill_services') }}" class="form-horizontal">
    {{ method_field('PUT') }}

    {{ csrf_field() }}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true"></button>
                <h4 class="modal-title">Fill</h4>
            </div>
            <div class="modal-body">
                <div class="form-group {{ $errors->has('filltype')?'has-error':'' }}">
                    <label class=" col-md-4">Fill Type<span class="required" aria-required="true"> * </span></label>
                    <div class="col-md-8">


                        <select id="filltype" class="form-control" name="filltype">
                            <option value="">Select</option>

                            @foreach($fillTypes as $fillType)
                                @if($fillService->main_category == $fillType['id'])
                                <option value="{{ $fillType['id'] }}" selected>{{ $fillType['name'] }}</option>
                                @else
                               <option value="{{ $fillType['id'] }}" >{{ $fillType['name'] }}</option>
                                @endif
                            @endforeach
                        </select>


                        @if($errors->has('filltype'))
                            <span class="help-block has-error"> {{ $errors->first('filltype') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('fillquality')?'has-error':'' }}">
                    <label class=" col-md-4">Fill Quality<span class="required" aria-required="true"> * </span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="" id="fillquality" name="fillquality" value="{{ $fillService->fill_quality }}">
                        @if($errors->has('fillquality'))
                            <span class="help-block has-error"> {{ $errors->first('fillquality') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('loadandcarry')?'has-error':'' }}">
                    <label class=" col-md-4">Can load and carry<span class="required" aria-required="true"> * </span></label>
                    <div class="col-md-8">
{{--
                        <input type="text" class="form-control" placeholder="" id="loadandcarry" name="loadandcarry" value="{{ $fillService->can_load_and_carry }}">
--}}

                        @if($fillService->can_load_and_carry == "yes")
                        <label class="mt-radio">
                            <input type="radio" placeholder=""  name="loadandcarry" value="{{ "yes" }}" checked="checked"> Yes
                            <span></span>
                        </label>

                        <label class="mt-radio">
                             <input type="radio" placeholder=""  name="loadandcarry" value="{{ "No" }}">No
                              <span></span>
                        </label>

                        @elseif($fillService->can_load_and_carry == "No")
                            <label class="mt-radio">
                                <input type="radio" placeholder=""  name="loadandcarry" value="{{ "yes" }}" checked="checked"> Yes
                                <span></span>
                            </label>

                            <label class="mt-radio">
                                <input type="radio" placeholder=""  name="loadandcarry" value="{{ "No" }}" checked="checked">No
                                <span></span>
                            </label>
                        @endif

                        @if($errors->has('loadandcarry'))
                            <span class="help-block has-error"> {{ $errors->first('loadandcarry') }}</span>
                        @endif
                    </div>
                </div>

                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <input type="hidden" name="_type" value="fill">

                <input type="hidden" name="tenant_id" value="{{tenant()}}">

                <input type="hidden" name="id" value="{{$fillService->id}}">
            </div>
            <div class="modal-footer">
                <span id="supplierFillEdit_validation_message_area" class="help-block has-error" style="display: none; "></span>
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close
                </button>
                <button type="submit" name="send" id="send" class="btn theme-btn">Update & Save</button>
            </div>

</form>


<script src="/assets/pages/scripts/supplier-services-validations.js" type="text/javascript"></script>
