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
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('state')?'has-error':'' }}">
                                <label class="control-label">State<span class="required" aria-required="true"> * </span></label>
                                <div>
                                   <select class="form-control">
                                      <option>Please Select</option>
                                   </select>
                                   @if($errors->has('state'))
                                   <span class="help-block has-error"> {{ $errors->first('state') }}</span>
                                   @endif
                                </div>
                             </div>
                            <div class="form-group {{ $errors->has('region')?'has-error':'' }}">
                                <label >Region<span class="required" aria-required="true"> * </span></label>
                                <div >
                                   <select class="form-control">
                                      <option>Please Select</option>
                                   </select>
                                   @if($errors->has('region'))
                                   <span class="help-block has-error"> {{ $errors->first('region') }}</span>
                                   @endif
                                </div>
                             </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group {{ $errors->has('suburb')?'has-error':'' }}">
                            <label class="control-label">Suburb<span class="required" aria-required="true"> * </span></label>
                            <div >
                               <input type="text" class="form-control" placeholder="" name="suburb" value="{{ old("suburb") }}">
                               @if($errors->has('suburb'))
                               <span class="help-block has-error"> {{ $errors->first('suburb') }}</span>
                               @endif
                            </div>
                         </div>
                         <div class="form-group {{ $errors->has('postcode')?'has-error':'' }}">
                            <label class="control-label">Post Code<span class="required" aria-required="true"> * </span></label>
                            <div >
                               <input type="text" class="form-control" placeholder="" name="postcode" value="{{ old("postcode") }}">
                               @if($errors->has('postcode'))
                               <span class="help-block has-error"> {{ $errors->first('postcode') }}</span>
                               @endif
                            </div>
                         </div>
                         <div class="form-group {{ $errors->has('streetAddress')?'has-error':'' }}">
                            <label class="control-label">Street Address<span class="required" aria-required="true"> * </span></label>
                            <div >
                               <input type="text" class="form-control" placeholder="" name="streetAddress" value="{{ old("streetAddress") }}">
                               @if($errors->has('streetAddress'))
                               <span class="help-block has-error"> {{ $errors->first('streetAddress') }}</span>
                               @endif
                            </div>
                         </div>

                        </div>
                     </div>

                    <hr/>

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
                     <div class="row">
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
                           <br/>
                           <div class="form-actions">
                              <div class="row">
                                 <div class="col-md-8">
                                    <a href="#requestitem" class="btn green " data-toggle="modal" href="#resetpassword">Add Item</a>
                                 </div>
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
                        <div class="clearfix form-group {{ $errors->has('skidsteer')?'has-error':'' }}">
                            <label class="control-label col-md-4">Machine Type<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-8">
                            <select name="" id="machinetype" class="form-control">
                               
                                <option value="skidsteer">Skidsteer Loader</option>
                                <option value="rollerself">Rollers-Self Propelled</option>
                            </select>
                            @if($errors->has('skidsteer'))
                                <span class="help-block has-error"> {{ $errors->first('skidsteer') }}</span>
                            @endif
                            </div>
                        </div>
                        {{-- s-OPITON 1 --}}
                        <div class="skidsteer">
                            <div class="clearfix form-group {{ $errors->has('describework')?'has-error':'' }}">
                                <label class="control-label col-md-4">Work Requirement<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="" name="describework" value="{{ old("describework") }}">
                                @if($errors->has('describework'))
                                    <span class="help-block has-error"> {{ $errors->first('describework') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="clearfix form-group {{ $errors->has('hireperiod')?'has-error':'' }}">
                                <label class="control-label col-md-4">Hire Period<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="" name="hireperiod" value="{{ old("hireperiod") }}">
                                @if($errors->has('hireperiod'))
                                    <span class="help-block has-error"> {{ $errors->first('hireperiod') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="clearfix form-group {{ $errors->has('hiretype')?'has-error':'' }}">
                                <label class="control-label col-md-4">Hire Type<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                <select name="" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="">Dry Hire</option>
                                    <option value="">Wet Hire</option>
                                </select>
                                @if($errors->has('hiretype'))
                                    <span class="help-block has-error"> {{ $errors->first('hiretype') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="clearfix form-group {{ $errors->has('wheeled')?'has-error':'' }}">
                                <label class="control-label col-md-4">Wheeled<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                <select name="" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="">Rubber Tracked</option>
                                </select>
                                @if($errors->has('wheeled'))
                                    <span class="help-block has-error"> {{ $errors->first('wheeled') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="clearfix form-group {{ $errors->has('size')?'has-error':'' }}">
                                <label class="control-label col-md-4">Size<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                <select name="" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="">>1000KG</option>
                                    <option value="">1000KG-1500KG</option>
                                    <option value="">>1500KG</option>
                                </select>
                                @if($errors->has('size'))
                                    <span class="help-block has-error"> {{ $errors->first('size') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="clearfix form-group {{ $errors->has('attachment')?'has-error':'' }}">
                                <label class="control-label col-md-4">Attachment<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                <select name="" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="">4 in 1 bucket</option>
                                    <option value=""> Levelling bar</option>
                                    <option value="">Backhoe</option>
                                    <option value="">Borer </option>
                                    <option value="">Trencher planing head</option>
                                    <option value="">Broomhead</option>
                                    <option value="">Dozer blade hydraulic</option>
                                    <option value="">Hammer</option>
                                    <option value="">Scrub mulcher</option>
                                    <option value="">Rock </option>
                                    <option value="">Grab</option>
                                    <option value="">Fork</option>
                                    <option value="">Tynes</option>
                                </select>
                                @if($errors->has('attachment'))
                                    <span class="help-block has-error"> {{ $errors->first('attachment') }}</span>
                                @endif
                                </div>
                            </div>
                        </div>
                        {{-- e-OPITON 1 --}}

                        {{-- s-OPITON 2 --}}
                        <div class="rollerself" style="display:none">
                            <div class="form-group {{ $errors->has('rshireperiod')?'has-error':'' }}">
                                <label class="control-label col-md-4">Hire Period<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                <select name="" id="" class="form-control">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                </select>
                                @if($errors->has('rshireperiod'))
                                    <span class="help-block has-error"> {{ $errors->first('rshireperiod') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('rshiretype')?'has-error':'' }}">
                                <label class="control-label col-md-4">Hire Type<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                <select class="form-control" name="" id="">
                                    <option value="">Select</option>
                                    <option value="">Wet</option>
                                    <option value="">Dry</option>
                                </select>
                                @if($errors->has('rshiretype'))
                                    <span class="help-block has-error"> {{ $errors->first('rshiretype') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('smoothdrum')?'has-error':'' }}">
                                <label class="control-label col-md-4">Smooth Drum<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="" name="smoothdrum" value="{{ old("smoothdrum") }}">
                                @if($errors->has('smoothdrum'))
                                    <span class="help-block has-error"> {{ $errors->first('smoothdrum') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('padfoot')?'has-error':'' }}">
                                <label class="control-label col-md-4">Pad Foot<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="" name="padfoot" value="{{ old("padfoot") }}">
                                @if($errors->has('padfoot'))
                                    <span class="help-block has-error"> {{ $errors->first('padfoot') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('drumweight')?'has-error':'' }}">
                                <label class="control-label col-md-4">Drum Weight<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8">
                            	<select class="form-control">
                            		<option>Select</option>
                            		<option>Up to 2t</option>
                            		<option>Up to 4t</option>
                            		<option>4t-8t</option>
                            		<option>8t-16t</option>
                            		<option>16t<</option>
                            	</select>
                                @if($errors->has('drumweight'))
                                    <span class="help-block has-error"> {{ $errors->first('drumweight') }}</span>
                                @endif
                                </div>
                            </div>
                        </div>
                        {{-- e-OPITON 2 --}}


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