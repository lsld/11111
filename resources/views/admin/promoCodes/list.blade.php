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
                        <h1 class="ccf-page-title">Manage Promo codes</h1>
                        <p>View and manage admin Promo codes. </p>
                    </div>

                    <!-- END PAGE TITLE-->
                    <div class="portlet-body form">
                        <div class="form-body">
                            <a class="btn theme-btn icon-promo" href="{{route('admin.code.create')}}"> Add Code</a>
                        </div>
                        <form role="form" method="GET" action="{{route('admin.code.list')}}" name="search">
                            {{-- ==================================== SEARCH CRITERIA =================================--}}
                            <div class="form-body">
                                <div class="form-group">

                                     <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" value="{{ old('serach') }}" class="form-control" name="serach" placeholder="Search">
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <select class="form-control" name="state">
                                                <option value="">State</option>
                                                @foreach($states as $state)
                                                    <option @if(isset($_REQUEST['state'])?$_REQUEST['state'] == $state->short_code:"") selected="selected" @endif value="{{$state->short_code}}">{{$state->short_code}}, {{$state->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="input-group  date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                                <input type="text" class="form-control" name="from" placeholder="from">
                                                <span class="input-group-addon"> - </span>
                                                <input type="text" class="form-control" name="to" placeholder="to">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <select class="form-control" name="status">
                                                    <option value="">Status</option>
                                                    @foreach($codeStatus as $status_key=>$status)
                                                        <option @if(isset($_REQUEST['status'])?$_REQUEST['status'] == $status_key:"") selected="selected" @endif value="{{$status_key}}">{{$status}}</option>
                                                    @endforeach
                                               </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                 <button type="submit" class="btn theme-btn"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                                 <a href="{{route('admin.code.list')}}" class="btn theme-btn"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a></span>
                                             </div>
                                         </div>
                                    </div>
                                 </div>

                            {{-- ==================================== SEARCH CRITERIA =================================--}}
                            <hr/>
                            {{-- ==================================== DATA TABLE =================================--}}
                            <div class="form-body">
                                <div class="form-group">
                                    @if($code_list->count())
                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                        <thead>
                                            <tr>

                                                <th> Code Name </th>
                                                <th> Code ID </th>
                                                <th> State </th>
                                                <th> Discount </th>
                                                <th> From </th>
                                                <th> To </th>
                                                <th> Status </th>
                                                <th> Created by </th>
                                                <th> Created Date </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($code_list as $code)
                                            <tr class="odd gradeX">
                                                <td> {{$code->code_name}} </td>
                                                <td> {{$code->code_id}} </td>
                                                <td> {{$code->state}} </td>
                                                <td> {{$code->discount}} %</td>
                                                <td> {{$code->from_date}} </td>
                                                <td> {{$code->to_date}} </td>
                                                <td>
                                                     {{$code->status}} <!--  <span class="label label-sm label-success"> {{$code->status}} </span>-->
                                                </td>
                                                <td> {{$code->created_by}} </td>
                                                <td> {{$code->created_at}} </td>
                                                <td>
                                                    <a href="{{route('admin.code.edit', $code->id)}}">Edit</a>
                                                    |
                                                    @if($code->status=='activated')
                                                        <a onclick="return confirm('Are you sure you want to deactivate this code?');" href="{{route('admin.code.change_status', [$code->id, 'deactivated'])}}">Deactivate</a>
                                                    @else
                                                        <a onclick="return confirm('Are you sure you want to activate this code?');" href="{{route('admin.code.change_status', [$code->id, 'activated'])}}">Activate</a>
                                                    @endif
                                                    
                                                    @if($code->status != 'deleted')
                                                        | <a onclick="return confirm('Are you sure you want to delete?');" href="{{route('admin.code.change_status', [$code->id, 'deleted'])}}">Delete </a>
                                                    @endif
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
                            {{-- ==================================== DATA TABLE =================================--}}
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection