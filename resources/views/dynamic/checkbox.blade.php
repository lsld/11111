<?php
    $val = null;

    if(isset($session[$data['id']])){
        $val = $session[$data['id']];
    }
?>
    <input type="hidden" name="d_property[{{$data['id']}}]" value="0">
    <label class="mt-checkbox">
        <input
                @if($val)
                    checked="checked"
                @endif
                type="checkbox"
                name="d_property[{{$data['id']}}]"
                value="{{$data['id']}}" >
        <span></span>
    </label>