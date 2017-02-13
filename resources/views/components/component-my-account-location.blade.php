
    <div class="form-group ">
        <label class=" col-md-4 control-label">Branch Name<span class="required"
                                                                aria-required="true"> * </span></label>
        <div class="col-md-8 {{ $errors->has('name')||$errors->has('locations')?'has-error':'' }}">
            @if(isset($locationRegion->name))
            <input type="text" class="form-control" placeholder="" name="name" value="{{$locationRegion->name}}" id="name" value="{{ old("name") }}">
            @else
             <input type="text" class="form-control" placeholder="" name="name"  id="name" value="{{ old("name") }}">
            @endif

            @if($errors->has('name'))
                <span class="help-block has-error"> {{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    {{--e- FORM FIELD--}}
    {{--s- FORM FIELD--}}


    <div class="form-group ">
        <label class=" col-md-4 control-label">Branch Email<span class="required" aria-required="true"> * </span></label>
        <div class="col-md-8 {{ $errors->has('email')||$errors->has('locations')?'has-error':'' }}">
            @if(isset($locationRegion->email))
            <input type="text" class="form-control" placeholder="email@example.com" value="{{$locationRegion->email}}" name="email" id="email" value="{{ old("email") }}">
            @else
                <input type="text" class="form-control" placeholder="email@example.com"  name="email" id="email">
            @endif

            @if($errors->has('email'))
                <span class="help-block has-error"> {{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>
    {{--e- FORM FIELD--}}
    {{--s- FORM FIELD--}}
    <div class="form-group ">
        <label class=" col-md-4 control-label">Branch Phone<span class="required" aria-required="true"> * </span></label>
        <div class="col-md-8 {{ $errors->has('phone')||$errors->has('locations')?'has-error':'' }}">
            @if(isset($locationRegion->phone))
            <input type="text" class="form-control" value="{{$locationRegion->phone}}" placeholder="+61 491 570 110" name="phone" id="phone" value="{{ old("phone") }}">
            @else
             <input type="text" class="form-control" placeholder="+61 491 570 110" name="phone" id="phone" value="{{ old("phone") }}">
            @endif

            @if($errors->has('phone'))
                <span class="help-block has-error"> {{ $errors->first('phone') }}</span>
            @endif
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--e- FORM FIELD--}}
    <div class="form-group">
        <label class=" col-md-4 control-label">CCF State Membership
        </label>
        <div class="col-md-8">
            <label class="control-label mt-checkbox mt-checkbox-outline">
                @if(!empty($locationRegion->membership_id))
                    <input checked type="checkbox" value="1" name="ck_membership" id="ck_membership" class="ck_membership">
                @else
                    <input type="checkbox" value="1" name="ck_membership" id="ck_membership" class="ck_membership">
                @endif
                <span></span>
            </label>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    @if(!empty($locationRegion->membership_id))
    <div class="form-group membershipId" id="membershipId">
        <label class=" col-md-4 control-label">CCF Membership Id</label>
        <div class="col-md-8 {{ $errors->has('membership_id')?'has-error':'' }}">
            <input type="text" class="form-control membership_id"  value="{{$locationRegion->membership_id}}" placeholder="" name="membership_id" id="membership_id" value="{{ old("membership_id") }}">
            @if($errors->has('membership_id'))
                <span class="help-block has-error"> {{ $errors->first('membership_id') }}</span>
            @endif
        </div>
    </div>

    @else
    <div class="form-group membershipId membership_id_not_available" id="membershipId">
        <label class=" col-md-4 control-label">CCF Membership Id</label>
        <div class="col-md-8 {{ $errors->has('membership_id')?'has-error':'' }}">
                <input type="text" class="form-control membership_id" placeholder="" name="membership_id" id="membership_id" value="{{ old("membership_id") }}">
            @if($errors->has('membership_id'))
                <span class="help-block has-error"> {{ $errors->first('membership_id') }}</span>
            @endif
        </div>
    </div>
    @endif
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group ">
        <label class=" col-md-4 control-label">Street<span class="required"
                                                           aria-required="true"> * </span></label>
        <div class="col-md-8 {{ $errors->has('street_address')||$errors->has('locations')?'has-error':'' }}">
            @if(isset($locationRegion->street_address_1))
            <input type="text" class="form-control" value="{{$locationRegion->street_address_1}}" placeholder="" name="street_address" id="street_address" value="{{ old("street_address") }}">
            @else
             <input type="text" class="form-control" placeholder="" name="street_address" id="street_address" value="{{ old("street_address") }}">
            @endif

            @if($errors->has('street_address'))
                <span class="help-block has-error"> {{ $errors->first('street_address') }}</span>
            @endif
        </div>
    </div>
    {{--e- FORM FIELD--}}
    {{--s- FORM FIELD--}}
    <div class="form-group ">
        <label class=" col-md-4 control-label">Suburb<span class="required" aria-required="true"> * </span></label>
        <div class="col-md-8 {{ $errors->has('suburb')||$errors->has('locations')?'has-error':'' }}">

            @if(isset($locationRegion->suburb))
            <input type="text" class="form-control" value="{{$locationRegion->suburb}}" placeholder="" name="suburb" id="suburb" value="{{ old("suburb") }}">
            @else
             <input type="text" class="form-control" placeholder="" name="suburb" id="suburb" value="{{ old("suburb") }}">
            @endif

            @if($errors->has('suburb'))
                <span class="help-block has-error"> {{ $errors->first('suburb') }}</span>
            @endif
        </div>
    </div>
    {{--e- FORM FIELD--}}
    {{--s- FORM FIELD--}}
    <div class="form-group ">
        <label class=" col-md-4 control-label">Post Code<span class="required"
                                                              aria-required="true"> * </span></label>
        <div class="col-md-8 {{ $errors->has('post_code')||$errors->has('locations')?'has-error':'' }}">

            @if(isset($locationRegion->post_code))
            <input type="text" class="form-control" value="{{$locationRegion->post_code}}" placeholder="" name="post_code" id="post_code" value="{{ old("post_code") }}">
            @else
            <input type="text" class="form-control" placeholder="" name="post_code" id="post_code" value="{{ old("post_code") }}">
            @endif

            @if($errors->has('post_code'))
                <span class="help-block has-error"> {{ $errors->first('post_code') }}</span>
            @endif
        </div>
    </div>
    {{--e- FORM FIELD--}}


