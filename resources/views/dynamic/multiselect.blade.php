<?php
    $val = null;

    if(isset($session[$data['id']])){
        $val = $session[$data['id']];
    }
?>
    <select id="multiple" name="d_property[{{$data['id']}}][]" class="form-control select2-multiple" multiple>
        @foreach($data['options'] as $key=> $op)
            <option
                    @if($val)
                        @if(in_array($op['id'], $val))
                            selected="selected"
                        @endif
                    @endif
                    value="{{$op['id']}}">
                {{$op['option']}}
            </option>
        @endforeach
    </select>