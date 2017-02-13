@foreach($properties['properties'] as $key=> $p_data)

    <div class="form-group ">
        <label class="col-md-4">{{$p_data['label']}}
            @if($p_data['required'])
                <span class="required" aria-required="true"> * </span>
            @endif
        </label>
        <div class="col-md-8">
            @if($p_data['type']=='text')
                @include('dynamic.text', ['data' => $p_data ,'session' => $session_data])
            @elseif($p_data['type']=='DD')
                @include('dynamic.drop_down', ['data' => $p_data ,'session' => $session_data])
            @elseif($p_data['type']=='MS')
                @include('dynamic.multiselect', ['data' => $p_data ,'session' => $session_data])
            @elseif($p_data['type']=='RB')
                @include('dynamic.radiobutton', ['data' => $p_data ,'session' => $session_data])
            @endif
        </div>
    </div>

@endforeach
