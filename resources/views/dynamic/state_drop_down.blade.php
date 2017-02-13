@php
    if(!isset($readonly_select)){ $readonly_select = ''; }
    if(!$selected_val){ $selected_val = [];}

$name_d = 'state_id';
if(isset($name)){
    $name_d = $name;
}
@endphp
@if(isset($multiple))
    <select name="{{$name_d}}[]" id="{{$name_d}}" class="form-control select2-multiple" multiple>

        @foreach( $states as $state)
            <option value="{{ $state->id }}" {{$readonly_select}}
                @if(in_array($state->id, $selected_val))
                    selected="selected"
                @endif >{{ $state->name }}</option>
        @endforeach
    </select>
@else
    <select name="{{$name_d}}" id="{{$name_d}}" class="form-control" >
        <option value="">Select</option>
        @foreach( $states as $state)
            <option value="{{ $state->id }}"
                    @if($selected_val==$state->id)
                        selected="selected"
                    @endif >{{ $state->name }}</option>
        @endforeach
    </select>
@endif