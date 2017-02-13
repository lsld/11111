<form role="form" onsubmit="return modalFormValidationAndSave('supplierContractingEdit', '{{route('edit_contracting_services')}}');" name="supplierContractingEdit" id="supplierContractingEdit" method="POST"
      action="{{ route('edit_contracting_services') }}" class="form-horizontal" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">

    {{ method_field('PUT') }}

    {{ csrf_field() }}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true"></button>
                <h4 class="modal-title">Contracting</h4>
            </div>



            <div class="modal-body">
                <div class="form-group {{ $errors->has('typeofwork')?'has-error':'' }}">
                    <label class=" col-md-4">Work Type<span class="required" aria-required="true"> * </span></label>
                    <div class="col-md-8">



                        <select id="typeofwork" class="form-control" name="typeofwork">

                            <option value="">Select</option>

                            @foreach($workTypes as $workType)
                                @if($contractingService->main_category == $workType['id'])
                                    <option value="{{ $workType['id'] }}" selected>{{ $workType['label'] }}</option>
                                @else
                                    <option value="{{ $workType['id'] }}">{{ $workType['label'] }}</option>
                                @endif
                            @endforeach
                        </select>


                        @if($errors->has('typeofwork'))
                            <span class="help-block has-error"> {{ $errors->first('typeofwork') }}</span>
                        @endif
                    </div>
                </div>


                <div class="form-group {{ $errors->has('')?'has-error':'' }}">
                    <label class=" col-md-4">Description<span class="required" aria-required="true"> * </span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder=""  id="description" name="description" value="{{$contractingService->description}}">

                    @if($errors->has(''))
                            <span class="help-block has-error"> {{ $errors->first('') }}</span>
                        @endif
                    </div>
                </div>


                <input type="hidden" name="_type" value="contracting">

                <input type="hidden" name="tenant_id" value="{{tenant()}}">

                <input type="hidden" name="id" value="{{$contractingService->id}}">

            </div>
            <div class="modal-footer">
                <span id="supplierContractingEdit_validation_message_area" class="help-block has-error" style="display: none; "></span>
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close
                </button>
                <button type="submit" name="send" id="send" class="btn theme-btn">Update & Save</button>
            </div>
    </form>

<script src="/assets/pages/scripts/supplier-services-validations.js" type="text/javascript"></script>
