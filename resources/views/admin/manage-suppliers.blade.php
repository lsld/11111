@extends('layouts.master-admin')

@section('content')
<div class="page-content-wrapper portal">
    <div class="page-content">
    {{-- ===========================    BREADCRUMB  =========================== --}}
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
        </ul>
    </div>
    {{-- ========================================   BREADCRUMB  ======================================== --}}

    {{-- ========================================   TITLE   ======================================== --}}
     <h1 class="page-title"></h1>
    {{-- ========================================   TITLE   ======================================== --}}

    {{-- ========================================   FORM WRAPPER    ======================================== --}}
    <div class="wrap-ccf-form">
        {{-- ====================   BOARD   ==================== --}}
        <div class="portlet light bordered">
            {{-- ============   PAGE TITILE ============ --}}
            <div class="wrap-ccf-page-title">
                <h1 class="ccf-page-title">Manage Supplier</h1>
                <p>Lorem ipsum dolor sit amet, consectetur.</p>
            </div>
            {{-- ===========    PAGE TITLE  ============ --}}

            {{-- ===========    FORM BODY   ============ --}}
            <div class="portlet-body form">
                {{-- ===========    ACCORDION   ============ --}}
                <div class="wrap-accordion">
                    {{-- ===========    ACCORDION ITEM   ============ --}}
                    <div class="accordion-item">
                        <h3 class="accordion-item-header clearfix">Location {{--<i class="fa fa-pushpin pull-right"></i>--}} <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></h3>
                        <div class="accordion-item-body">
                            <div class="clearfix">
                                <a data-toggle="modal" href="#location" class="btn theme-btn">Add Location</a>
                            </div>

                             <div class="form-group clearfix">
                                <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover" >
                                            <thead>
                                                <tr>
                                                    <th scope="col"> Branch Name</th>

                                                    <th scope="col"> State</th>
                                                    <th scope="col"> Region</th>

                                                    <th scope="col"> Email</th>
                                                    <th scope="col"> Phone</th>
                                                    <th scope="col"> CCF Member</th>
                                                    <th scope="col"> CCF Member ID</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td>lorem</td>
                                                    <td>lorem</td>
                                                    <td>lorem</td>
                                                    <td>lorem</td>
                                                    <td>lorem</td>
                                                    <td>lorem</td>
                                                    <td>lorem</td>
                                                    <td>lorem</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- ===========    ACCORDION ITEM   ============ --}}

                    {{-- ===========    ACCORDION ITEM   ============ --}}
                    <div class="accordion-item">
                        <h3 class="accordion-item-header clearfix">Service <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></h3>
                        <div class="accordion-item-body">
                            {{-- ========================== PLANT HIRE ========================== --}}
                            <div>
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h3>Plant Hire</h3>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <a data-toggle="modal" href="#planthire" class="btn theme-btn">Add Plant</a>
                                </div>
                                <div class="form-group clearfix">
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
                                            <tr>
                                                <td>Skidsteer Loaders</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td>Dry Hire </td>
                                                <td>Description 1</td>
                                                <td>5</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#myModal" href="http://localhost/services/plant/1/edit" title="Edit"> Edit</a> |
                                                    <a onclick="return confirm('Are you sure you want to delete?');" href="http://localhost/services/plant/1" title="Delete">Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rollers-Self Propelled</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td>Dry Hire </td>
                                                <td>Description 2</td>
                                                <td>7</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#myModal" href="http://localhost/services/plant/2/edit" title="Edit"> Edit</a> |
                                                    <a onclick="return confirm('Are you sure you want to delete?');" href="http://localhost/services/plant/2" title="Delete">Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Skidsteer Loaders</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td>Wet Hire </td>
                                                <td>Description 3</td>
                                                <td>10</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#myModal" href="http://localhost/services/plant/3/edit" title="Edit"> Edit</a> |
                                                    <a onclick="return confirm('Are you sure you want to delete?');" href="http://localhost/services/plant/3" title="Delete">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- ========================== PLANT HIRE ========================== --}}

                            {{-- ========================== CONTRACTING ========================== --}}
                            <div>
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h3>Contracting</h3>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <a data-toggle="modal" href="#contracting" class="btn theme-btn">Add Contracting</a>
                                </div>
                                <div class="form-group clearfix">
                                    <table class="table table-striped table-bordered table-hover">

                                        <thead>
                                            <tr>
                                                <th scope="col" width="30%">Types of Work</th>
                                                <th scope="col" width="40%">Description</th>
                                                <th scope="col" width="30%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Recycled water Retic</td>
                                                <td width="40%">Accusamus quia laudantium enim reprehenderit sint velit provident exercitation placeat sit deserunt deserunt sed ea incidunt veniam odio veniam facilis</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#myModal" href="http://localhost/services/contracting/1/edit" title="Edit">Edit</a> |
                                                    <a onclick="return confirm('Are you sure you want to delete?');" href="http://localhost/services/contracting/1" title="Delete">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- ========================== CONTRACTING ========================== --}}

                            {{-- ========================== MATERIAL ========================== --}}
                            <div>
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h3>Material</h3>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <a data-toggle="modal" href="#material" class="btn theme-btn">Add Material</a>
                                </div>
                                <div class="form-group clearfix">

                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="30%">Resource Type</th>
                                                <th scope="col" width="40%">Quality</th>
                                                <th scope="col" width="30%">Action</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                    <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>Small Powered plant</td>
                                        <td>Et possimus quae inventore facilis rem neque qui corrupti quaerat nihil minima voluptatem Non voluptates nisi quisquam consectetur</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#myModal" href="http://localhost/services/material/1/edit" title="Edit">Edit</a> |
                                            <a onclick="return confirm('Are you sure you want to delete?');" href="http://localhost/services/material/1" title="View">Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    </table>

                                </div>
                            </div>
                            {{-- ========================== MATERIAL ========================== --}}

                            {{-- ========================== FILL ========================== --}}
                            <div>
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h3>Fill</h3>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <a data-toggle="modal" href="#fill" class="btn theme-btn">Add Fill</a>
                                </div>
                                <div class="form-group clearfix">
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
                                            <tr>
                                                <td>Clean Fill</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <td>Sint reprehenderit iste cupidatat id adipisci dolorem accusantium sint qui</td>
                                                <td>No</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#myModal" href="http://localhost/services/fill/1/edit" title="Edit">Edit</a> |
                                                    <a onclick="return confirm('Are you sure you want to delete?');" href="http://localhost/services/fill/1" title="Delete">Delete</a>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- ========================== FILL ========================== --}}
                        </div>
                    </div>
                    {{-- ===========    ACCORDION ITEM   ============ --}}

                    {{-- ===========    ACCORDION ITEM   ============ --}}
                    <div class="accordion-item">
                      <h3 class="accordion-item-header clearfix">Notification <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></h3>
                      <div class="accordion-item-body">
                          <p>Lorem ipsum dolor sit amet, consectetur.</p>
                      </div>
                    </div>
                    {{-- ===========    ACCORDION ITEM   ============ --}}

                    {{-- ===========    ACCORDION ITEM   ============ --}}
                    <div class="accordion-item">
                        <h3 class="accordion-item-header clearfix">Profile <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></h3>
                        <div class="accordion-item-body">
                            <p>Lorem ipsum dolor sit amet, consectetur.</p>
                        </div>
                    </div>
                    {{-- ===========    ACCORDION ITEM   ============ --}}



                </div>
                {{-- ===========    ACCORDION   ============ --}}
            </div>
            {{-- ===========    FORM BODY   ============ --}}

        </div>
        {{-- ====================   BOARD   ==================== --}}

    </div>
    {{-- ========================================   FORM WRAPPER    ======================================== --}}

    </div>
</div>
@endsection