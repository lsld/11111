<script src="/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

                        <div class="modal-body">
                        @foreach($Quotes as $Quotes)
                        <div class="form-group {{ $errors->has('price')?'has-error':'' }}">
                            <label class="control-label col-md-4">Price<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"  name="price" id="price" value="{{$Quotes->price}}">
                                @if($errors->has('price'))
                                    <span class="help-block has-error">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group {{ $errors->has('expiry_date')?'has-error':'' }}">
                                <label class="control-label col-md-4">Expiry Date<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                    <input class="form-control form-control-inline date-picker"  {{--placeholder="{{$Quotes->expiry_date}}"--}}  name="expiry_date" id="expiry_date" size="16" value="{{$Quotes->expiry_date}}" />
                                    @if($errors->has('expiry_date'))
                                        <span class="help-block has-error"> {{ $errors->first('expiry_date') }}</span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Quote Description<span class="required" aria-required="true">  </span></label>
                            <div class="col-md-8">
                                <textarea name="description" value="{{$Quotes->description}}" id="description" cols="30" rows="5"  {{--placeholder="{{$Quotes->description}}"--}} class="form-control">{{$Quotes->description}}</textarea>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{$Quotes->id}}">

                        <input type="hidden" name="job_request_id" value="{{$Quotes->job_request_id}}">

                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="send1" id="send1" class="btn green">Update</button>
                    </div>


