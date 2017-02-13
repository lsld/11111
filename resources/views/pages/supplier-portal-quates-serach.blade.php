@extends('layouts.master')

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper portal supplier-portal-company-profile">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BAR -->

        @include('partials.page_breadcrumb')

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="wrap-ccf-form">

                <div class="portlet light bordered">
                    <!-- BEGIN PAGE TITLE-->
                    <div class="wrap-ccf-page-title">
                        <h1 class="ccf-page-title">My Quotes</h1>
                        <p>View all of your Quotes</p>
                    </div>
                    <!-- END PAGE TITLE-->

                    <div class="portlet-body form">
                        {{-- ====================================== FILTER SECTION ============================= --}}
                        <div class="filter-section">
                            <form role="form" name="" id="" method="get" action="{{ route('search_quotes')}}" class="form-horizontal">
                                <div class="form-body">
                                    <div class="input-icon right">
                                        <i class="icon-magnifier"></i>
                                        <input type="text" class="form-control input-circle" name="searchKey" placeholder="search...">
                                    </div>
                                </div>

                                <div class="form-body">

                                    <div class="form-group">

                                        <div class="row">
                                            <!-- quotes-->
                                            <div class="col-md-4">
                                                <label class="control-label ">Submitted Date</label>
                                                <div class="">
                                                     <input class="form-control form-control-inline date-picker" placeholder="" name="submitted_at" size="16" type="text" value="" />
                                                </div>
                                            </div>

                                            <!-- quotes-->
                                            <div class="col-md-4">
                                                <label class="control-label ">Quote Expiry Date</label>
                                                <div >
                                                    <input class="form-control form-control-inline  date-picker" name="q_expiry_date" size="16" type="text" value="" />

                                                </div>
                                            </div>


                                            <!-- quotes-->
                                            <div class="col-md-4">
                                                <label class="control-label">Created Date</label>
                                                <div>
                                                    <input class="form-control form-control-inline  date-picker" name="created_at" size="16" type="text" value="" />

                                                </div>
                                            </div>


                                            <!-- quotes-->
                                            <div class="col-md-4">
                                                <label class="control-label">Status</label>
                                                <select name="status" id="" class="form-control form-control-inline">
                                                    <option value="">select</option>
                                                    <option value="0">pending</option>
                                                    <option value="1">accepted</option>
                                                    <option value="2">rejected</option>
                                                    <option value="3">withdrawn</option>
                                                </select>
                                            </div>

                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span><button type="submit"  class="btn theme-btn">Search</button>
                                                <a href="{{route('supplier_quotes', uid(tenant()))}}" class="btn theme-btn">Refresh</a></span>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        {{-- ====================================== FILTER SECTION ============================= --}}
                    </div>


                    {{-- ====================================== TABLE ============================= --}}
                    <div class="form-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Request</th>
                                    <th>Quote</th>
                                    <th>Quote Price</th>
                                    <th>Date Submitted</th>
                                    <th>Quote Expiration Date</th>
                                    <th>Request Expiration Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                    @if(!empty($quotes))
                                        <tbody>
                                        @foreach($quotes as $quote)
                                            <script type="text/javascript">
                                            </script>
                                            <tr>
                                                <td>{{$quote->JobRequest->id }}</td>
                                                <td>{{$quote->code }}</td>
                                                <td>{{$quote->price }}</td>
                                                <td>{{$quote->created_at }}</td>
                                                <td>{{$quote->expiry_date }}</td>
                                                <td>{{$quote->JobRequest->expiry_date }}</td>
                                                <td class="status-shown"><span class="color-view bg-purple-seance bg-font-purple-seance">{{$quote->status}}</span></td>
                                                <td>{{--<a onclick="return modalFormEdit('quotesViewFormContent', '{{ route('show_supplier_quote', $quote->id)}}');"  class="btn btn-xs btn-default" title="View" data-toggle="modal" href="#quatesView"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a  onclick="return modalFormEdit('quotesEditFormContent', '{{ route('view_edit_supplier_quotes', $quote->id)}}');"  data-toggle="modal" href="#quatesEdit" class="btn btn-xs btn-default quotes-edit" title="Edit">
                                                        <i class="fa fa-users" aria-hidden="true"></i></a>--}}
                                                    <a  href="{{ route('show_supplier_quote', $quote->id)}}"  class="btn btn-xs btn-default" title="View" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                @endif
                            </table>

                        </div>
                    </div>
                    {{-- ====================================== TABLE ============================= --}}
            </div>
            </form>
        </div>
    </div>
    </div>

    <div class="modal fade" id="quatesEdit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true"></button>
                    <h4 class="modal-title">Edit Quotes</h4>
                </div>
                <div class="modal-body">
                    {{--s- FORM FIELD--}}
                    <form role="form" name="edit_supplier_quotes" id="edit_supplier_quotes" method="POST" onsubmit="return modalFormValidationAndSave('edit_supplier_quotes', '{{route('edit_supplier_quotes')}}');" action="{{ route('edit_supplier_quotes')}}" class="form-horizontal">
                        <div id="quotesEditFormContent">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="quatesView" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true"></button>
                    <h4 class="modal-title">View Quotes</h4>
                </div>
                <div class="modal-body">
                    {{--s- FORM FIELD--}}
                    <div class="form-horizontal">
                        <div id="quotesViewFormContent">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>



    <script>
        $(document).ready(function() {
            $('.quotes-edit').on('click', function (e){
                e.preventDefault();
                $('#myModal').modal('show').find('.modal-body').load($(this).attr('href'));
            });
        });
    </script>
@endsection