<select name="regions_id" id="regions_id" class="form-control" >
    <option value="">Select</option>
    @foreach( $regions as $region)
        <?php
        $style= null;
        ?>
        <option class="region_list_options region_list_option_state_{{$region->states_id}}" value="{{ $region->id }}"
                @if($selected_val==$region->id)
                selected="selected"
                @endif
                @if($region->states_id==$state_id)
                    style="display: block;"
                @else
                    style="display: none;"
                @endif >{{ $region->name }}</option>
    @endforeach
</select>