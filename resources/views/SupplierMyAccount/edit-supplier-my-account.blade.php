

<div class="modal-body">

        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

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
</div>