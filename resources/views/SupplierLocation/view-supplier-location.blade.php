
            <form role="form" action="{{ route('supplier_location') }}" name="supplier_location" id="supplier_location" method="POST" class="form-horizontal">



                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true"></button>
                    <h4 class="modal-title">Company Location</h4>
                </div>


                <div class="modal-body">

                    {{--s- FORM FIELD--}}
                    <div class="form-group ">
                        <label class="col-md-4">State :</label>
                        <div class="col-md-8">
                            <label>{{$location->States->name}}</label>
                        </div>
                    </div>
                    {{--e- FORM FIELD--}}

                    {{--s- FORM FIELD--}}
                    <div class="form-group ">
                        <label class="col-md-4">Region :</label>
                        <div class="col-md-8">
                            <label>
                                @foreach($locationRegion as $key => $val)
                                    @foreach($regions as $region)
                                        @if($region->id == $val)
                                            {{$region->name}}
                                            {{","}}
                                        @endif
                                    @endforeach
                                @endforeach
                            </label>
                        </div>
                    </div>
                    {{--e- FORM FIELD--}}

                    <div class=" form-group  {{ $errors->has('name')||$errors->has('locations')?'has-error':'' }}">

                        <label class="col-md-4">Branch Name :</label>
                        <div class="col-md-8">
                            <label> {{$location->name}}</label>

                            @if($errors->has('name'))
                                <span class="help-block has-error"> {{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                {{--e- FORM FIELD--}}
                {{--s- FORM FIELD--}}


                <div class="form-group ">
                    <label class="col-md-4">Branch Email :</label>
                    <div class="col-md-8">
                        <label>{{$location->email}}</label>

                    </div>
                </div>
                {{--e- FORM FIELD--}}
                {{--s- FORM FIELD--}}
                <div class="form-group ">
                    <label class="c col-md-4">Branch Phone :</label>
                    <div class="col-md-8">
                        <label>{{$location->phone}}</label>

                    </div>
                </div>
                {{--e- FORM FIELD--}}

                    {{--e- FORM FIELD--}}
                    <div class="form-group">
                        <label class="col-md-4">CCF State Membership :</label>
                        <div class="col-md-8">
                            @if($location->membership_id)
                                <label>{{$location->membership_id != ""? "yes":"No" }}</label>
                            @else
                                <label>Not Available</label>
                            @endif
                        </div>
                    </div>
                    {{--e- FORM FIELD--}}



                {{--s- FORM FIELD--}}
                <div class="form-group ">
                    <label class="col-md-4">CCF Membership Id :</label>
                    <div class="col-md-8">
                        @if($location->membership_id)
                         <label>{{$location->membership_id}}</label>
                        @else
                         <label>Not Available</label>
                        @endif
                    </div>
                </div>
                {{--e- FORM FIELD--}}

                    {{--s- FORM FIELD--}}
                    <div class="form-group ">
                        <label class="col-md-4">Street :</label>
                        <div class="col-md-8">
                            <label>{{$location->street_address_1}}</label>
                            <label>{{$location->street_address_2}}</label>

                        </div>
                    </div>
                    {{--e- FORM FIELD--}}
                    {{--s- FORM FIELD--}}
                    <div class="form-group ">
                        <label class="col-md-4">Suburb :</label>
                        <div class="col-md-8">
                            <label>{{$location->suburb}}</label>

                        </div>
                    </div>
                    {{--e- FORM FIELD--}}
                    {{--s- FORM FIELD--}}
                    <div class="form-group ">
                        <label class="col-md-4">Post Code :</label>
                        <div class="col-md-8">
                            <label>{{$location->post_code}}</label>

                        </div>
                    </div>
                    {{--e- FORM FIELD--}}

                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close
                        </button>
                    </div>

              </div>

            </form>
