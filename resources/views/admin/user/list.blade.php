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
                        <h1 class="ccf-page-title">Manage Users</h1>
                        <p>View and manage admin users. </p>
                    </div>

                    <!-- END PAGE TITLE-->
                    <div class="portlet-body form">
                        <div class="form-body">

                            <a class="btn theme-btn btn-add-user" href="{{route('admin.user.create')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</a>
                        </div>
                        <form role="form" method="GET" action="{{route('admin.user.list')}}" name="search">
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
                                                <option value="">Status</option>
                                                @foreach($userStatus as $status_key=>$status)
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
                                                    @if($userList->count())
                                                        <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                                            <thead>
                                                            <tr>

                                                                <th> First Name </th>
                                                                <th> Last Name </th>
                                                                <th> Username </th>
                                                                <th> Email </th>
                                                                <th> Phone </th>
                                                                <th> States </th>
                                                                <th> User Role </th>
                                                                <th> Status </th>
                                                                <th> Last Login </th>
                                                                <th> Action </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($userList as $user)
                                                                <tr class="odd gradeX">

                                                                    <td>{{$user->first_name}}</td>
                                                                    <td>{{$user->last_name}}</td>
                                                                    <td>{{$user->username}}</td>
                                                                    <td>{{$user->email}}</td>
                                                                    <td>{{$user->phone}}</td>
                                                                    <td>
                                                                        @if($user->admin_states_list)
                                                                            @foreach($user->admin_states_list as $state)
                                                                                {{$states->find($state)->name}}<br>
                                                                            @endforeach
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                        @php
                                                                            try{
                                                                                echo  $admin_user_role->find($user->role_id)->label;
                                                                            }catch (Exception $e){ }
                                                                        @endphp
                                                                    </td>
                                                                    <td>{{$user->status}}</td>
                                                                    <td>{{$user->last_login_time}}</td>
                                                                    <td>
                                                                        <a href="{{route('admin.user.view', $user->id)}}">View </a> |
                                                                        <a href="{{route('admin.user.edit', $user->id)}}">Edit </a> |
                                                                        @if($user->status=='activated')
                                                                            <a onclick="return confirm('Are you sure you want to suspend this account?');" href="{{route('admin.user.change_status', [$user->id, 'suspend'])}}">Suspend</a>
                                                                        @else
                                                                            <a onclick="return confirm('Are you sure you want to activate this account?');" href="{{route('admin.user.change_status', [$user->id, 'activated'])}}">Activate</a>
                                                                        @endif
                                                                        |
                                                                        <a onclick="return confirm('Are you sure you want to delete?');" href="{{route('admin.user.change_status', [$user->id, 'deleted'])}}">Delete </a>
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
                                                                <th></th>
                                                                <th> First Name </th>
                                                                <th> Last Name </th>
                                                                <th> Username </th>
                                                                <th> Email </th>
                                                                <th> Phone </th>
                                                                <th> States </th>
                                                                <th> User Role </th>
                                                                <th> Status </th>
                                                                <th> Last Login </th>
                                                                <th> Action </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($deleteList as $deleted_user)
                                                                <tr class="odd gradeX">
                                                                    <td></td>
                                                                    <td>{{$deleted_user->first_name}}</td>
                                                                    <td>{{$deleted_user->last_name}}</td>
                                                                    <td>{{$deleted_user->username}}</td>
                                                                    <td>{{$deleted_user->email}}</td>
                                                                    <td>{{$deleted_user->phone}}</td>
                                                                    <td>
                                                                        @if($deleted_user->admin_states_list)
                                                                            @foreach($deleted_user->admin_states_list as $state)
                                                                                {{$states->find($state)->name}}<br>
                                                                            @endforeach
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            try{
                                                                                echo  $admin_user_role->find($user->role_id)->label;
                                                                            }catch (Exception $e){ }
                                                                        @endphp
                                                                    </td>
                                                                    <td>{{$deleted_user->status}}</td>
                                                                    <td>{{$deleted_user->last_login_time}}</td>
                                                                    <td>
                                                                        <a onclick="return confirm('Are you sure you want to activate this account?');" href="{{route('admin.user.change_status', [$deleted_user->id, 'activated'])}}">Activate</a> | 
                                                                        <a href="{{route('admin.user.view', $deleted_user->id)}}">View </a>
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