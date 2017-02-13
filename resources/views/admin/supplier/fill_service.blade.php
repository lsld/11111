@if($fill_list)
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col" width="20%">Fill Type</th>
            <th scope="col" width="20%">Fill Quality</th>
            <th scope="col" width="30%"> Can load and carry</th>
            <th scope="col" width="30%">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fill_list as $fill)
            <tr>
                <td>{{$fill->mainCategory->name}}</td>
                <td>{{$fill->fill_quality}}</td>
                <td>{{$fill->can_load_and_carry}}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" href="http://localhost/services/fill/1/edit" title="Edit">Edit</a> |
                    <a onclick="return confirm('Are you sure you want to delete?');" href="http://localhost/services/fill/1" title="Delete">Delete</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Information not available. </p>
@endif