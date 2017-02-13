<?php
    $val = null;

    if(isset($session[$data['id']])){
        $val = $session[$data['id']];
    }
?>
    <select name="d_property[{{$data['id']}}]" id="" class="form-control">
        <option value="">select</option>
        @foreach($data['options'] as $key=> $op)

            <option @if($op['id']==$val)
                        selected="selected"
                    @endif
                    value="{{$op['id']}}" >
                {{$op['option']}}
            </option>

        @endforeach
    </select>