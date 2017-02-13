<div class="row">
    @foreach($properties['properties'] as $key=> $p_data)

        <div class="col-md-4">
            <div class="form-group ">
                <label class="control-label">{{$p_data['label']}}
                    @if($p_data['required'])
                        <span class="required" aria-required="true"> * </span>
                    @endif
                </label>
                <input value="{{$id}}" name="properties_id" type="hidden">
                <div @if($p_data['measure'])
                        class="wrap-measured-unit"
                     @endif >

                        @if($p_data['type']=='text')
                            @include('dynamic.text', ['data' => $p_data ,'session' => $session_data])
                        @elseif($p_data['type']=='DD')
                            @include('dynamic.drop_down', ['data' => $p_data ,'session' => $session_data])
                        @elseif($p_data['type']=='MS')
                            @include('dynamic.multiselect', ['data' => $p_data ,'session' => $session_data])
                        @elseif($p_data['type']=='RB')
                            @include('dynamic.radiobutton', ['data' => $p_data ,'session' => $session_data])
                        @elseif($p_data['type']=='CB')
                            @include('dynamic.checkbox', ['data' => $p_data ,'session' => $session_data])
                        @endif

                    @if($p_data['measure'])
                        <span class="measure-unit">{{$p_data['measure']}}</span>
                    @endif

                </div>
            </div>
        </div>
    @endforeach
</div>