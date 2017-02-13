

<div class="modal-body">

        {{ csrf_field() }}

        {{--s- FORM FIELD--}}
        <div class="form-group {{ $errors->has('first_name')?'has-error':'' }}">
            <label class="control-label col-md-4">
                First Name<span class="required" aria-required="true"> * </span>
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="" name="first_name" value="{{$userSettings->first_name}}">

                @if($errors->has('first_name'))
                    <span class="help-block has-error"> {{ $errors->first('first_name') }}</span>
                @endif
            </div>
        </div>
        {{--e- FORM FIELD--}}

        {{--S- FORM FIELD--}}
        <div class="form-group {{ $errors->has('last_name')?'has-error':'' }}">
            <label class="control-label col-md-4">Last Name
                <span class="required" aria-required="true"> * </span></label>
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="" name="last_name" value="{{$userSettings->last_name}}">

                @if($errors->has('last_name'))
                    <span class="help-block has-error"> {{ $errors->first('last_name') }}</span>
                @endif
            </div>
        </div>
        {{--e- FORM FIELD--}}


        {{--s- FORM FIELD--}}
        <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
            <label class="control-label col-md-4">Phone Number<span class="required" aria-required="true"> * </span></label>

            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="+61 491 570 159" name="phone" value="{{$userSettings->phone}}">

                @if($errors->has('phone'))
                    <span class="help-block has-error"> {{ $errors->first('phone') }}</span>
                @endif</div>
        </div>
        {{--e- FORM FIELD--}}

        {{--s- FORM FIELD--}}
        <div class="form-group {{ $errors->has('company_name')?'has-error':'' }}">
            <label class="control-label col-md-4">Company Name<span class="required" aria-required="true"> * </span></label>
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="" name="company_name" value="{{$companySettings->name}}" readonly>
                @if($errors->has('company_name'))
                    <span class="help-block has-error"> {{ $errors->first('company_name') }}</span>
                @endif
            </div>
        </div>
        {{--e- FORM FIELD--}}

        {{--s- FORM FIELD--}}
        <div class="form-group {{ $errors->has('street_address')?'has-error':'' }}">
            <label class="control-label col-md-4">Street<span class="required" aria-required="true"> * </span></label>
            <div class="col-md-8"><input type="text" class="form-control" placeholder="" name="street_address"  value="{{$companyLocations->street_address_1}}">
                @if($errors->has('street_address'))
                    <span class="help-block has-error"> {{ $errors->first('street_address') }}</span>
                @endif</div>
        </div>
        {{--e- FORM FIELD--}}
        {{--s- FORM FIELD--}}
        <div class="form-group">
            <label class="control-label col-md-4">Suburb</label>
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="" name="suburb" value="{{$companyLocations->suburb}}" >

            </div>
        </div>
        {{--e- FORM FIELD--}}
        {{--s- FORM FIELD--}}
        <div class="form-group {{ $errors->has('post_code')?'has-error':'' }}">
            <label class="control-label col-md-4">Post Code</label>
            <div class="col-md-8"><input type="text" class="form-control" placeholder="" name="post_code" value="{{$companyLocations->post_code}}">
                @if($errors->has('post_code'))
                    <span class="help-block has-error"> {{ $errors->first('post_code') }}</span>
                @endif
            </div>
        </div>
        {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group {{ $errors->has('states_id')?'has-error':'' }}">
        <label class="control-label col-md-4">State<span class="required" aria-required="true"> * </span></label>
        <div class="col-md-8">
            <select name="states_id" id="states_id" class="form-control" >
                <option value="">Select</option>
                @foreach( $states as $state)
                    @if($companyLocations->states_id == $state->id)
                        <option value="{{ $state->id }}" {{ old('states_id')==$state->id?'selected':'' }} selected>{{ $state->name }}</option>
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



    <input type="hidden" id="regions_load_url" value="{{route('getRegionsByStateIdSelected')}}">
    <input type="hidden" id="regions_load_url1" value="{{route('getRegionsByStateIdLoad')}}">


    <div class="form-group">
        <label class="col-md-4 control-label">Region<span class="required" aria-required="true"> * </span></label>
        <div class="col-md-8 {{ $errors->has('regions_id')||$errors->has('locations')?'has-error':'' }}" id="regions-sec">
            <select name="regions_id" id="regions_id" class="form-control">
            </select>
            @if($errors->has('regions_id'))
                <span class="help-block has-error"> {{ $errors->first('regions_id') }}</span>
            @endif
        </div>
    </div>

</div>

<script type="text/javascript">
    $( document ).ready(function(){
        //$("#states_id").change(function() {

            //var stateID = $("#states_id").val();
            var stateID = $('#states_id').find('option:selected').val();

            if(stateID){
                $.ajax({
                    type:'GET',
                    url: $('#regions_load_url').val()+'/'+stateID,
                    data:'state_id='+stateID,
                    success:function(html){
                        $('#regions_id').html(html);
                    }
                });
            }
       // });


        $("#states_id").change(function() {

        var stateID = $("#states_id").val();


        if(stateID){
            $.ajax({
                type:'GET',
                url: $('#regions_load_url1').val()+'/'+stateID,
                data:'state_id='+stateID,
                success:function(html){
                    $('#regions_id').html(html);
                }
            });
        }
        });
    });
</script>

@section('scripts')

@endsection