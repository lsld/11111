@extends('layouts.master-admin')

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper portal supplier-portal-job-request admin-manage-users">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BAR -->

        @include('partials.page_breadcrumb')


        <!-- END PAGE HEADER-->
            <div class="wrap-ccf-form">
                <div class="portlet light bordered">
                    <!-- BEGIN PAGE TITLE-->
                    <div class="wrap-ccf-page-title">
                        <h1 class="ccf-page-title">Manage Suppliers</h1>
                        <p>View and manage admin suppliers. </p>
                    </div>

                    <!-- END PAGE TITLE-->
                    <div class="portlet-body form">
                        <div class="form-body">

                        </div>
                        <form role="form" method="GET" action="{{route('admin.supplier.list')}}" name="search">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-md-3 states">

                                            <?php
                                            $state_id = null;
                                            if(isset($_REQUEST['state_id'])){
                                                $state_id = $_REQUEST['state_id'];
                                            }
                                            ?>
                                            @include('dynamic.state_drop_down', [ 'states'=> $states, 'selected_val' => old('state_id', $state_id) ])

                                        </div>

                                        <div class="col-md-3">

                                            <select name="status" id="status" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($supplierStatus as $status_key=>$status)
                                                    <option @if(isset($_REQUEST['status'])?$_REQUEST['status'] == $status_key:"") selected="selected" @endif value="{{$status_key}}">{{$status}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn theme-btn">Search</button>
                                            {{--<a href="javascript:;" class="btn blue"> Search </a>--}}
                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                        <div class="col-md-12">
                                            {{-- =========================================== TABS ===========================================--}}
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab_1_1" data-toggle="tab" aria-expanded="true"> All </a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_1_2" data-toggle="tab" aria-expanded="true"> Deleted </a>
                                                </li>

                                            </ul>
                                            {{-- =========================================== TABS ===========================================--}}

                                            {{-- =========================================== TAB CONTENTS ===========================================--}}
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="tab_1_1">
                                                    @if($supplier_list->count())
                                                        <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                                            <thead>
                                                            <tr>

                                                                <th> First Name </th>
                                                                <th> Last Name </th>
                                                                <th> Company Name </th>
                                                                <th> Email </th>
                                                                <th> Phone </th>
                                                                <th> Username </th>
                                                                <th> Operating States </th>
                                                                <th> CCF Member </th>
                                                                <th> Subscription Package </th>
                                                                <th> Status </th>
                                                                <th> Last Login </th>
                                                                <th> Action </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($supplier_list as $supplier)
                                                                <tr class="odd gradeX">

                                                                    <td>{{$supplier->first_name}}</td>
                                                                    <td>{{$supplier->last_name}}</td>
                                                                    <td>{{$supplier->companies->name}}</td>
                                                                    <td>{{$supplier->email}}</td>
                                                                    <td>{{$supplier->phone}}</td>
                                                                    <td>{{$supplier->username}}</td>
                                                                    <td>
                                                                        @php
                                                                            $locations = $supplier->companies->locations;
                                                                            foreach($locations as $state){
                                                                                echo $state->states->name .'<br>';
                                                                            }
                                                                        @endphp
                                                                    </td>
                                                                    <td>
                                                                        @php $membership_id = null;
                                                                            foreach($locations as $member){
                                                                                if(trim($member->membership_id)){
                                                                                    echo $membership_id .= $member->membership_id.'<br>';
                                                                                }
                                                                            }
                                                                        if($membership_id==null){
                                                                            echo '--';
                                                                        }
                                                                        @endphp

                                                                    </td>
                                                                    <td>{{$supplier->tenant_plan->name}}</td>
                                                                    <td>{{$supplier->status}}</td>
                                                                    <td>{{$supplier->last_login_time}}</td>
                                                                    <td>
                                                                        <a href="{{route('admin.supplier.view', $supplier->id)}}">View </a> |
                                                                        @if($supplier->status=='activated')
                                                                            <a onclick="return confirm('Are you sure you want to suspend this account?');" href="{{route('admin.supplier.change_status', [$supplier->id, 'deactivated'])}}">Deactivate</a>
                                                                        @else
                                                                            <a onclick="return confirm('Are you sure you want to activate this account?');" href="{{route('admin.supplier.change_status', [$supplier->id, 'activated'])}}">Activate</a>
                                                                        @endif
                                                                        |
                                                                        <a onclick="return confirm('Are you sure you want to delete?');" href="{{route('admin.supplier.change_status', [$supplier->id, 'deleted'])}}">Delete </a>

                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        Information is not available
                                                    @endif
                                                </div>

                                                <div class="tab-pane fade" id="tab_1_2">
                                                    @if($deleteList->count())
                                                        <table class="table table-striped table-bordered table-hover order-column" id="sample_1_2">
                                                            <thead>
                                                            <tr>
                                                                <th> First Name </th>
                                                                <th> Last Name </th>
                                                                <th> Company Name </th>
                                                                <th> Email </th>
                                                                <th> Phone </th>
                                                                <th> Username </th>
                                                                <th> Operating States </th>
                                                                <th> CCF Member </th>
                                                                <th> Subscription Package </th>
                                                                <th> Status </th>
                                                                <th> Last Login </th>
                                                                <th> Action </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($deleteList as $deleted_user)
                                                                <tr class="odd gradeX">

                                                                    <td>{{$deleted_user->first_name}}</td>
                                                                    <td>{{$deleted_user->last_name}}</td>
                                                                    <td>{{$deleted_user->companies->name}}</td>
                                                                    <td>{{$deleted_user->email}}</td>
                                                                    <td>{{$deleted_user->phone}}</td>
                                                                    <td>{{$deleted_user->username}}</td>
                                                                    <td>
                                                                        @php
                                                                            $locations = $deleted_user->companies->locations;
                                                                            foreach($locations as $state){
                                                                                echo $state->states->name .'<br>';
                                                                            }
                                                                        @endphp
                                                                    </td>
                                                                    <td>
                                                                        @php $membership_id = null;
                                                                            foreach($locations as $member){
                                                                                if(trim($member->membership_id)){
                                                                                    $membership_id .= $member->membership_id.'<br>';
                                                                                }
                                                                            }
                                                                        if($membership_id==null){
                                                                            $membership_id = '--';
                                                                        }
                                                                        @endphp
                                                                        {{$membership_id}}
                                                                    </td>
                                                                    <td>{{$deleted_user->tenant_plan->name}}</td>
                                                                    <td>{{$deleted_user->status}}</td>
                                                                    <td>{{$deleted_user->last_login_time}}</td>
                                                                    <td>
                                                                        <a href="{{route('admin.supplier.view', $deleted_user->id)}}">View </a>
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        Information is not available
                                                    @endif
                                                </div>

                                            </div>
                                            {{-- =========================================== TAB CONTENTS ===========================================--}}




                                        </div>

                                </div>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection