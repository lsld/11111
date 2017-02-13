
                        <form action="" method="POST" class="form-horizontal">
                            {{--{{ csrf_field() }}--}}
                            @if($errors->has('locations'))
                                <div class="form-group clearfix ">
                                    <div class=" form-fileds-center"><div class="alert alert-danger">
                                            Please specify a location to continue.
                                    </div>
                                    </div>
                                </div>

                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                        <label class="control-label ">Branch Name<span class="required"
                                                                                               aria-required="true"> * </span></label>
                                        <div class=" {{ $errors->has('name')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                                     name="name" value="{{ old("name") }}">
                                            @if($errors->has('name'))
                                                <span class="help-block has-error"> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}
                                    {{--s- FORM FIELD--}}
                                       <div class="form-group ">
                                           <label class="control-label ">Branch Email<span class="required" aria-required="true"> * </span></label>
                                           <div class=" {{ $errors->has('email')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder="email@example.com" name="email" value="{{ old("email") }}">
                                               @if($errors->has('email'))
                                                   <span class="help-block has-error"> {{ $errors->first('email') }}</span>
                                               @endif
                                           </div>
                                       </div>
                                    {{--e- FORM FIELD--}}
                                    {{--s- FORM FIELD--}}
                                        <div class="form-group ">
                                            <label class="control-label ">Branch Phone<span class="required" aria-required="true"> * </span></label>
                                            <div class=" {{ $errors->has('phone')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder="+61 491 570 110" name="phone" value="{{ old("phone") }}">
                                                @if($errors->has('phone'))
                                                    <span class="help-block has-error"> {{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    {{--e- FORM FIELD--}}



                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                        <label class="control-label ">CCF Membership Id</label>
                                        <div class=" {{ $errors->has('membership_id')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                                     name="membership_id" value="{{ old("membership_id") }}">
                                            @if($errors->has('membership_id'))
                                                <span class="help-block has-error"> {{ $errors->first('membership_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}

                                    {{--e- FORM FIELD--}}
                                        <div class="form-group">
                                        <label class="control-label ">CCF State Membership
                                        </label>
                                        <div class=" ">
                                            <label class="control-label mt-checkbox mt-checkbox-outline">
                                                <input type="checkbox" value="1" name="test">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}

                                </div>
                                <div class="col-md-6">
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                        <label class="control-label ">Street<span class="required"
                                                                                                  aria-required="true"> * </span></label>
                                        <div class=" {{ $errors->has('street_address')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                                     name="street_address" value="{{ old("street_address") }}">
                                            @if($errors->has('street_address'))
                                                <span class="help-block has-error"> {{ $errors->first('street_address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                        <label class="control-label ">Suburb<span class="required" aria-required="true"> * </span></label>
                                        <div class=" {{ $errors->has('suburb')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                                     name="suburb" value="{{ old("suburb") }}" list="locsuburb">
                                                                     <datalist id="locsuburb">
                                                                       <option value="Canterbury-Bankstown">
                                                                       <option value="Central Business District">
                                                                       <option value="Eastern Suburbs">
                                                                       <option value="Greater Western Sydney">
                                                                       <option value="Hills District">
                                                                       <option value="Inner West">
                                                                       <option value="Macarthur">

                                                                     </datalist>
                                            @if($errors->has('suburb'))
                                                <span class="help-block has-error"> {{ $errors->first('suburb') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                        <label class="control-label ">Post Code<span class="required"
                                                                                             aria-required="true"> * </span></label>
                                        <div class=" {{ $errors->has('post_code')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                                     name="post_code" value="{{ old("post_code") }}">
                                            @if($errors->has('post_code'))
                                                <span class="help-block has-error"> {{ $errors->first('post_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                        <label class="control-label ">State<span class="required" aria-required="true"> * </span></label>
                                        <div class=" {{ $errors->has('states_id')||$errors->has('locations')?'has-error':'' }}"><select name="states_id" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach( $states as $state)
                                                    <option value="{{ $state->id }}" {{ old('states_id')==$state->id?'selected':'' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('states_id'))
                                                <span class="help-block has-error"> {{ $errors->first('states_id') }}</span>
                                            @endif</div>
                                    </div>
                                    {{--e- FORM FIELD--}}

                                    {{--s- FORM FIELD--}}
                                    <div class="form-group ">
                                        <label class="control-label ">Region<span class="required" aria-required="true"> * </span></label>
                                        <div class=" {{ $errors->has('regions_id')||$errors->has('locations')?'has-error':'' }}"><select name="regions_id" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach( $regions as $region)
                                                    <option value="{{ $region->id }}" {{ old('regions_id')==$region->id?'selected':'' }}>{{ $region->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('regions_id'))
                                                <span class="help-block has-error"> {{ $errors->first('regions_id') }}</span>
                                            @endif</div>
                                    </div>
                                    {{--e- FORM FIELD--}}




                                    <div class="form-group">
                                        <div class="clearfix">
                                            <button type="submit" class="btn green pull-right">Add Location</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="form-group clearfix">

                           {{-- <div class="">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>

                                            <th scope="col"> Branch Name</th>
                                            <th scope="col"> Street Address</th>
                                            <th scope="col"> State</th>
                                            <th scope="col"> Suburb</th>
                                            <th scope="col"> Email</th>
                                            <th scope="col"> Phone</th>
                                            <th scope="col"> CCF Member</th>
                                            <th scope="col"> CCF Member ID</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($locations as $location)
                                        <tr>

                                            <td> {{ $location->name }}</td>
                                            <td> {{ $location->street_address_1 }}</td>
                                            <td> {{ $location->states->short_code }}</td>
                                            <td> {{ $location->suburb }}</td>
                                            <td> {{ $location->email }} </td>
                                            <td> {{ $location->phone }}</td>
                                            <td> {{ $location->membership_id != ""? "yes":"No" }}</td>
                                            <td> {{ $location->membership_id }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>--}}
                        </div>



                    {{--<form action="" method="POST">
                        --}}{{--{{ csrf_field() }}--}}{{--
                        <div class="form-actions col-md-12 last">
                            <div class="row">
                                <div class="col-md-10 clearfix center-align">
                                    <button type="submit" class="btn green pull-right">Next</button>
                                    --}}{{-- <button type="button" class="btn default">Cancel</button>--}}{{--
                                </div>
                            </div>
                        </div>
                    </form>--}}


