@extends('layouts.master')

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper portal">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE BAR -->

   @include('partials.page_breadcrumb')

      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="wrap-ccf-form">
         <form action="" class="form-horizontal" method="POST">
            <div class="portlet light bordered">
               <!-- BEGIN PAGE TITLE-->

               <div class="wrap-ccf-page-title">
                <h1 class="ccf-page-title">Create Job Request - Plant Hire</h1>
                <p>Create the job requests you want suppliers to quate for</p>
              </div>
               <!-- END PAGE TITLE-->
               <div class="portlet-body form">
                  <!-- BEGIN FORM-->
                  <div class="form-body col-md-12 form-fileds-center">
                     {{-- s-LOCATION --}}
                     <div class="portlet-title">
                        <div class="caption">
                           <h3>Location</h3>
                        </div>
                     </div>
                     <div class="row">
                         <div class="form-group {{ $errors->has('state')?'has-error':'' }}">
                            <label class="control-labe">State<span class="required" aria-required="true"> * </span></label>
                            <div >
                               <select class="form-control">
                                  <option>Please Select</option>
                               </select>
                               @if($errors->has('state'))
                               <span class="help-block has-error"> {{ $errors->first('state') }}</span>
                               @endif
                            </div>
                         </div>
                         <div class="form-group {{ $errors->has('region')?'has-error':'' }}">
                            <label class="control-label">Region<span class="required" aria-required="true"> * </span></label>
                            <div>
                               <select class="form-control">
                                  <option>Please Select</option>
                               </select>
                               @if($errors->has('region'))
                               <span class="help-block has-error"> {{ $errors->first('region') }}</span>
                               @endif
                            </div>
                         </div>
                         <div class="form-group {{ $errors->has('suburb')?'has-error':'' }}">
                            <label class="control-label col-md-4">Suburb<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-8">
                               <input type="text" class="form-control" placeholder="" name="suburb" value="{{ old("suburb") }}">
                               @if($errors->has('suburb'))
                               <span class="help-block has-error"> {{ $errors->first('suburb') }}</span>
                               @endif
                            </div>
                         </div>
                         <div class="form-group {{ $errors->has('postcode')?'has-error':'' }}">
                            <label class="control-label col-md-4">Post Code<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-8">
                               <input type="text" class="form-control" placeholder="" name="postcode" value="{{ old("postcode") }}">
                               @if($errors->has('postcode'))
                               <span class="help-block has-error"> {{ $errors->first('postcode') }}</span>
                               @endif
                            </div>
                         </div>
                         <div class="form-group {{ $errors->has('streetAddress')?'has-error':'' }}">
                        <label class="control-label col-md-4">Street Address<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-8">
                           <input type="text" class="form-control" placeholder="" name="streetAddress" value="{{ old("streetAddress") }}">
                           @if($errors->has('streetAddress'))
                           <span class="help-block has-error"> {{ $errors->first('streetAddress') }}</span>
                           @endif
                        </div>
                     </div>
                     </div>
                     {{-- e-LOCATION --}}
                     {{-- s-DESCRIPTION --}}
                     <div class="portlet-title">
                        <div class="caption">
                           <h3>Request Items</h3>
                        </div>
                     </div>
                     {{-- e-DESCRIPTION --}}
                     {{-- s-REQUEST ITEMS --}}
                     <div class="form-group clearfix">
                        <div class="col-md-12">
                           <div class="table-scrollable">
                              <table class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th scope="col"> Item Type</th>
                                       <th scope="col"> Shift Per Day</th>
                                       <th scope="col"> Days Per Week</th>
                                       <th scope="col"> Hire Type</th>
                                       <th scope="col"> Accessories</th>
                                       <th scope="col"> Description</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <td>Graders</td>
                                    <td>1</td>
                                    <td>5</td>
                                    <td>Dry Hire</td>
                                    <td></td>
                                    <td>
                                       Smooth Drums <br/>
                                       Drum Width\Weight 990mm-100m:11-2t <br/>
                                       Compaction Meter
                                    </td>
                                 </tbody>
                              </table>
                           </div>
                           <div class="form-actions">
                              <div class="row">
                                 <div class="col-md-8">
                                    <a href="#requestitem" class="btn green " data-toggle="modal" href="#resetpassword">Add Item</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     {{-- e-REQUEST ITEMS --}}
                  </div>
                  <!-- END FORM-->
               </div>
            </div>
         </form>
      </div>
      <div class="modal fade" id="requestitem" tabindex="-1" role="basic" aria-hidden="true">
         <div class="modal-dialog">
            <form role="form" method="POST" action="">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                     <h4 class="modal-title">Add Request Item</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-horizontal">
                         <div class="clearfix form-group {{ $errors->has('itemtype')?'has-error':'' }}">
                             <label class="control-label col-md-4">Item Type<span class="required" aria-required="true"> * </span></label>
                             <div class="col-md-8">
                             <select name="" id="" class="form-control">
                                 <option value="">Please Select</option>
                                 <option value="">Skidsteer Loader</option>
                                 <option value="">Rollers-Self Propelled</option>
                             </select>
                             @if($errors->has('itemtype'))
                                 <span class="help-block has-error"> {{ $errors->first('itemtype') }}</span>
                             @endif
                         </div>
                         </div>
                         <div class="clearfix form-group {{ $errors->has('shiftperday')?'has-error':'' }}">
                             <label class="control-label col-md-4">Shift Per Day<span class="required" aria-required="true"> * </span></label>
                             <div class="col-md-8">
                                 <input type="text" class="form-control" placeholder="" name="shiftperday" value="{{ old("shiftperday") }}">
                                 @if($errors->has('shiftperday'))
                                     <span class="help-block has-error"> {{ $errors->first('shiftperday') }}</span>
                                 @endif
                             </div>
                         </div>
                         <div class="clearfix form-group {{ $errors->has('daysperweek')?'has-error':'' }}">
                             <label class="control-label col-md-4">Days Per Week<span class="required" aria-required="true"> * </span></label>
                             <div class="col-md-8">
                                 <input type="text" class="form-control" placeholder="" name="daysperweek" value="{{ old("daysperweek") }}">
                                 @if($errors->has('daysperweek'))
                                     <span class="help-block has-error"> {{ $errors->first('daysperweek') }}</span>
                                 @endif
                             </div>
                         </div>
                         <div class="clearfix form-group {{ $errors->has('hiretype')?'has-error':'' }}">
                             <label class="control-label col-md-4">Hire Type<span class="required" aria-required="true"> * </span></label>
                             <div class="col-md-8">
                                 <select name="" id="" class="form-control">
                                     <option value="">Please Select</option>
                                     <option value="">Dry</option>
                                     <option value="">Wet</option>
                                 </select>
                                 @if($errors->has('hiretype'))
                                     <span class="help-block has-error"> {{ $errors->first('hiretype') }}</span>
                                 @endif
                             </div>
                         </div>
                         <div class="clearfix form-group {{ $errors->has('accessories')?'has-error':'' }}">
                             <label class="control-label col-md-4">Accessories<span class="required" aria-required="true"> * </span></label>
                             <div class="col-md-8">
                                 <input type="text" class="form-control" placeholder="" name="accessories" value="{{ old("accessories") }}">
                                 @if($errors->has('accessories'))
                                     <span class="help-block has-error"> {{ $errors->first('accessories') }}</span>
                                 @endif
                             </div>
                         </div>
                         <div class="clearfix form-group {{ $errors->has('desc')?'has-error':'' }}">
                             <label class="control-label col-md-4">Description<span class="required" aria-required="true"> * </span></label>
                             <div class="col-md-8">


                             <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                             @if($errors->has('desc'))
                                 <span class="help-block has-error"> {{ $errors->first('desc') }}</span>
                             @endif
                             </div>
                         </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn green">Add</button>
                  </div>
               </div>
            </form>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection