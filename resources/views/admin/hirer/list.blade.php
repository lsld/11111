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
                        <h1 class="ccf-page-title">Manage Hirers</h1>
                        <p>View and manage admin hirers. </p>
                    </div>

                    <!-- END PAGE TITLE-->
                    <div class="portlet-body form">
                        <div class="form-body">

                        </div>
                        <form role="form" method="GET" action="{{route('admin.hirer.list')}}" name="search">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-md-3">

                                            <select name="status" id="status" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($hirerStatus as $status_key=>$status)
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
                                                    @if($hirer_list->count())
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
                                                                <th> Status </th>
                                                                <th> Action </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($hirer_list as $hirer)

                                                                <tr class="odd gradeX">

                                                                    <td>{{$hirer->first_name}}</td>
                                                                    <td>{{$hirer->last_name}}</td>
                                                                    <td>{{$hirer->companies->name}}</td>
                                                                    <td>{{$hirer->email}}</td>
                                                                    <td>{{$hirer->phone}}</td>
                                                                    <td>{{$hirer->username}}</td>
                                                                   <td>
                                                                        @php
                                                                            $locations = $hirer->companies->locations;
                                                                            foreach($locations as $state){
                                                                                echo $state->states->name .'<br>';
                                                                            }
                                                                        @endphp
                                                                    </td>

                                                                    <td>{{$hirer->status}}</td>


                                                                    <td>

                                                                    <a href="#hirer_view" onclick="return modalFormView('viewFormContent', '{{route('admin.hirer.view', $hirer->id)}}');" data-toggle="modal" >View</a> |

                                                                    {{--<a href="{{route('admin.hirer.view', $hirer->id)}}">View </a> |--}}
                                                                          @if($hirer->status=='activated')
                                                                              <a onclick="return confirm('Are you sure you want to suspend this account?');" href="{{route('admin.hirer.change_status', [$hirer->id, 'deactivated'])}}">Deactivate</a>
                                                                          @else
                                                                              <a onclick="return confirm('Are you sure you want to activate this account?');" href="{{route('admin.hirer.change_status', [$hirer->id, 'activated'])}}">Activate</a>
                                                                          @endif
                                                                          |
                                                                          <a onclick="return confirm('Are you sure you want to delete?');" href="{{route('admin.hirer.change_status', [$hirer->id, 'deleted'])}}">Delete </a>

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
                                                                <th> Status </th>
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
                                                                    <td>{{$deleted_user->status}}</td>
                                                                    <td>
                                                                      {{-- <a href="{{route('admin.hirer.view', $deleted_user->id)}}">View </a>--}}
                                                                        <a href="#hirer_view" onclick="return modalFormView('viewFormContent', '{{route('admin.hirer.view', $deleted_user->id)}}');" data-toggle="modal" >View</a>
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

    <div class="modal fade" id="hirer_view" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true"></button>
                    <h4 class="modal-title">View Hirer</h4>
                </div>
                <div class="modal-body">
                    {{--s- FORM FIELD--}}
                        <div id="viewFormContent">
                        </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>

@endsection