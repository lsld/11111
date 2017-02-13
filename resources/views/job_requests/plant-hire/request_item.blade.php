@if($item_data)
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach($item_data['label'] as $key=> $label)
                    <th>{{$label}}</th>
                @endforeach
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($item_data as $key=>$dd)
                @if($key!='label')
                    <tr>
                        @foreach($dd as $ss)
                            <td>
                                @if($ss)
                                    {{$ss}}
                                @else
                                    --
                                @endif
                            </td>
                        @endforeach
                        <td>
                            <a onclick="itemEdit({{$key}});" href="#descModal" class="" data-toggle="modal">Edit</a> |
                            <a onclick="itemRemove({{$key}});">Delete</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endif