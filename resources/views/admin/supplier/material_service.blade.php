@if($material_list)
<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col" width="30%">Resource Type</th>
        <th scope="col" width="40%">Quality</th>
        <th scope="col" width="30%">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($material_list as $material)
        <tr>
            <td>{{$material->mainCategory->name}}</td>
            <td>{{$material->quality}}</td>
            <td>
                <a data-toggle="modal" data-target="#myModal" href="http://localhost/services/material/1/edit" title="Edit">Edit</a> |
                <a onclick="return confirm('Are you sure you want to delete?');" href="http://localhost/services/material/1" title="View">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    <p>Information not available. </p>
@endif