
@include('layouts.message')

@if($location_list->locations->count())
    <table class="table table-striped table-bordered table-hover" >
        <thead>
        <tr>
            <th scope="col"> Branch Name</th>
            <th scope="col"> State</th>
            <th scope="col"> Region</th>
            <th scope="col"> Email</th>
            <th scope="col"> Phone</th>
            <th scope="col"> CCF Member ID</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($location_list->locations as $locations)
            <tr>
                <td>{{$locations->name}}</td>
                <td>{{$locations->states->short_code}}</td>
                <td>
                    @if($locations->companyLocationRegion)
                        @foreach($locations->companyLocationRegion as $region)
                            {{$region->region->name}},<br>
                        @endforeach
                    @endif
                </td>
                <td>{{$locations->email}}</td>
                <td>{{$locations->phone}}</td>
                <td>
                    @php
                        $ccf_member_id = '--';
                        if(trim($locations->membership_id)){
                            $ccf_member_id = $locations->membership_id;
                        }
                    @endphp
                    {{$ccf_member_id}}
                </td>
                <td>
                    <a data-toggle="modal" data-target="#myModal"   href="{{route('supplier_location_view', $locations->id)}}" title="View">View</a> |
                    <a onclick="supplier_location_edit('admin_supplier_location', '{{route('admin.supplier.edit.location', [ $supplier_id, $locations->id])}}' , '{{$locations->id}}' );" data-toggle="modal" href="#location" class="">Edit</a> |
                    <a onclick="delete_location('{{route('admin.supplier.delete.location', [ $supplier_id, $locations->id])}}');" href="#">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@else
    <p>Information is not available</p>
@endif

