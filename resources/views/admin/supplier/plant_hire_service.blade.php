@if($plant_hire_list)
<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">Item Type</th>
        <th scope="col">Hire Type</th>
        <th scope="col"> Description</th>
        <th scope="col"> Quantity</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($plant_hire_list as $plant_hire)
        <tr>
            <td>{{$plant_hire->mainCategory->label}}</td>
            <td>{{$plant_hire->main_category_label}}</td>
            <td>{{$plant_hire->description}}</td>
            <td>{{$plant_hire->quantity}}</td>
            <td>
                <a data-toggle="modal" data-target="#myModal" href="http://localhost/services/plant/1/edit" title="Edit"> Edit</a> |
                <a onclick="return confirm('Are you sure you want to delete?');" href="http://localhost/services/plant/1" title="Delete">Delete</a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
    @else
    <p>Information not available  </p>
@endif