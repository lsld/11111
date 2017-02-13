@if($contracting_list)
<table class="table table-striped table-bordered table-hover">

    <thead>
    <tr>
        <th scope="col" width="30%">Types of Work</th>
        <th scope="col" width="40%">Description</th>
        <th scope="col" width="30%">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contracting_list as $contracting)
        <tr>
            <td>{{$contracting->mainCategory->label}}</td>
            <td width="40%">{{$contracting->description}}</td>
            <td>
                <a data-toggle="modal" data-target="#myModal" href="http://localhost/services/contracting/1/edit" title="Edit">Edit</a> |
                <a onclick="return confirm('Are you sure you want to delete?');" href="http://localhost/services/contracting/1" title="Delete">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    <p>Information not available.</p>
@endif