<?php
    $val = null;

    if(isset($session[$data['id']])){
        $val = $session[$data['id']];
    }
?>

    @foreach($data['options'] as $key=> $op)

        <label class="mt-radio">
            <input type="radio"
                   @if($op['id']==$val)
                        checked="checked"
                   @endif
                   name="d_property[{{$data['id']}}]"
                   value="{{$op['id']}}" />
            {{$op['option']}}
            <span></span>
        </label>
        <br/>
    @endforeach