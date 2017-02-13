<?php
    $val = null;

    if(isset($session[$data['id']])){
        $val = $session[$data['id']];
    }
?>
<input type="text"
       class="form-control"
       placeholder="{{$data['label']}}"
       name="d_property[{{$data['id']}}]"
       value="{{$val}}" >
