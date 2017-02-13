<select name="duration" id="duration" class="form-control" >
    <option value="">select</option>
    @foreach($durations as $key => $duration)
        <option value="{{$key}}"
                @if($selected_val==$key)
                    selected="selected"
                @endif
                >{{$duration}}</option>
    @endforeach
</select>