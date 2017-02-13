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
         <form action="" class="form-horizontal" method="POST">
            <div class="portlet light bordered">
               <!-- BEGIN PAGE TITLE-->
               <div class="wrap-ccf-page-title">
                   <h1 class="ccf-page-title">{{ $company->profile->name }}</h1>
                   <p>View or edit your company profile</p>
               </div>
               <!-- END PAGE TITLE-->
               <div class="portlet-body form ">
                    <div class="logo-section">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 main-logo">
                                <img src="http://www.puresafari.com/images/logos/pure-safari-your-logo-here.jpg" alt="" class="img-responsive"/>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 cat-area">
                                <h5><strong>The Hirer Company</strong></h5>
                                <p><span class="color-view bg-purple-seance bg-font-purple-seance">Company Operating Category</span></p>


                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <!-- BEGIN FORM-->
                        <div class="form-body col-md-8 ">

                            {{-- s-COMPANY PROFILE --}}
                            <div class="component-section">
                            <div class="component-heading">
                            <h3><a data-toggle="modal" href="#aboutModal"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                Company About</h3>
                            </div>
                            <div class="component-body">
                                <p> {{ $company->profile->about }}</p>
                            </div>



                         </div>
                            {{-- e-COMPANY PROFILE --}}

                            {{-- s-COMPANY SERVICE --}}
                            <div class="component-section">
                            <div class="component-heading">
                                <h3><a data-toggle="modal" href="#serviceModal"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> Company Services</h3>
                            </div>
                            <div class="component-body">
                                <p> {{ $company->profile->services }}</p>
                            </div>

                            {{-- s-MODAL COMPANY SERVICES--}}
                            <div class="modal fade" id="serviceModal" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form role="form" method="POST" action="">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Update Company Services </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-horizontal">

                                                    <div class="form-group {{ $errors->has('')?'has-error':'' }}">
                                                        <div class="col-md-12">
                                                            <textarea name="" id=""  rows="10" class="form-control" >{{ $company->profile->services }}</textarea>
                                                            @if($errors->has(''))
                                                                <span class="help-block has-error"> {{ $errors->first('') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn green">Update & Save</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            {{-- e-MODAL COMPANY SERVICES--}}

                        </div>
                            {{-- e-COMPANY SERVICE --}}

                            {{-- s-COMPANY SERVICE --}}
                            <div class="component-section">
                            <div class="component-heading">
                                <h3><a data-toggle="modal" href="#projectsModal"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> Company Projects</h3>
                            </div>
                            <div class="component-body">
                                <p> {{ $company->profile->projects }}</p>
                            </div>

                            {{-- s-MODAL COMPANY PROJECTS--}}
                            <div class="modal fade" id="projectsModal" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form role="form" method="POST" action="">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Update Company Projects</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-horizontal">

                                                    <div class="form-group {{ $errors->has('')?'has-error':'' }}">
                                                        <div class="col-md-12">
                                                            <textarea name="" id=""  rows="10" class="form-control" >{{ $company->profile->projects }}</textarea>
                                                            @if($errors->has(''))
                                                                <span class="help-block has-error"> {{ $errors->first('') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn green">Update & Save</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            {{-- e-MODAL COMPANY PROJECTS--}}
                        </div>
                            {{-- e-COMPANY SERVICE --}}

                        </div>
                        <!-- END FORM-->

                        {{-- BEIGN FORM --}}
                        <div class="form-body col-md-4">
                            {{--s-CONTACT DETAILS--}}
                            <div class="component-section wrap-contact-details">
                                <div class="component-heading">
                                    <h3><a data-toggle="modal" href="#modalContactDetails"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> Contact Details</h3>
                                </div>
                                <div class="component-body">
                                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i>{{ $company->profile->email }}</p>
                                    <p><i class="fa fa-phone" aria-hidden="true"></i>{{ $company->profile->phone_1 }}</p>
                                    @if($company->profile->phone_2)
                                    <p><i class="fa fa-phone" aria-hidden="true"></i>{{ $company->profile->phone_2 }}</p>
                                    @endif
                                    <p><i class="fa fa-link" aria-hidden="true"></i><a href="{{ $company->profile->website }}">{{ $company->profile->website }}</a></p>
                                </div>
                            </div>
                            {{--e-CONTACT DETAILS--}}

                            {{--s-OPERATING LOCATIONS--}}
                            <div class="component-section">
                                <div class="component-heading">
                                    <h3> Operating Locations</h3>
                                </div>
                                <div class="component-body">
                                    <div class="locations">

                                        @foreach($company->locations as $location)
                                        <p class="clearfix">
                                            <span class="loc-icon"><a data-toggle="modal" href="#modalLocations_{{$location->id}}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                            <span class="desc"> {{ $location->inline() }}</span>
                                        </p>

                                        {{--s-MODAL LOCATION--}}
                                        <div class="modal fade" id="modalLocations_{{$location->id}}" tabindex="-1" role="basic" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Update Location</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-horizontal">
                                                            {{--s- FORM FIELD--}}
                                                            <div class="form-group ">
                                                                <label class="control-label col-md-4">Branch Name<span class="required"
                                                                                                                       aria-required="true"> * </span></label>
                                                                <div class="col-md-8 {{ $errors->has('locations')?'has-error':'' }}">
                                                                    <input type="text" class="form-control" placeholder="" name="name" value="{{ $location->name }}">
                                                                    @if($errors->has('name'))
                                                                        <span class="help-block has-error"> {{ $errors->first('name') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            {{--e- FORM FIELD--}}
                                                            {{--street address--}}
                                                            <div class="form-group ">
                                                                <label class="control-label col-md-4">Street<span class="required"
                                                                                                                  aria-required="true"> * </span></label>
                                                                <div class="col-md-8 {{ $errors->has('street_address')||$errors->has('locations')?'has-error':'' }}">
                                                                    <input type="text" class="form-control" placeholder="" name="street_address" value="{{ $location->street_address_1 }}">
                                                                    @if($errors->has('street_address'))
                                                                        <span class="help-block has-error"> {{ $errors->first('street_address') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            {{--/street address--}}
                                                            {{--s- FORM FIELD--}}
                                                            <div class="form-group ">
                                                                <label class="control-label col-md-4">Suburb<span class="required" aria-required="true"> * </span></label>
                                                                <div class="col-md-8 {{ $errors->has('suburb')||$errors->has('locations')?'has-error':'' }}">
                                                                    <input type="text" class="form-control" placeholder="" name="suburb" value="{{ $location->suburb }}" list="locsuburb">
                                                                    <datalist id="locsuburb">
                                                                        <option value="Canterbury-Bankstown">
                                                                        <option value="Central Business District">
                                                                        <option value="Eastern Suburbs">
                                                                        <option value="Greater Western Sydney">
                                                                        <option value="Hills District">
                                                                        <option value="Inner West">
                                                                        <option value="Macarthur">

                                                                    </datalist>
                                                                    @if($errors->has('suburb'))
                                                                        <span class="help-block has-error"> {{ $errors->first('suburb') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            {{--e- FORM FIELD--}}
                                                            {{--s- FORM FIELD--}}
                                                            <div class="form-group ">
                                                                <label class="control-label col-md-4">Post Code<span class="required"
                                                                                                                     aria-required="true"> * </span></label>
                                                                <div class="col-md-8 {{ $errors->has('post_code')||$errors->has('locations')?'has-error':'' }}">
                                                                    <input type="text" class="form-control" placeholder="" name="post_code" value="{{ $location->post_code }}">
                                                                    @if($errors->has('post_code'))
                                                                        <span class="help-block has-error"> {{ $errors->first('post_code') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            {{--e- FORM FIELD--}}
                                                            {{--s- FORM FIELD--}}
                                                            <div class="form-group ">
                                                                <label class="control-label col-md-4">State<span class="required" aria-required="true"> * </span></label>
                                                                <div class="col-md-8 {{ $errors->has('states_id')||$errors->has('locations')?'has-error':'' }}">
                                                                    <select name="states_id" id="" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach( $states as $state)
                                                                            <option value="{{ $state->id }}" {{ $location->states_id == $state->id?'selected':'' }}>{{ $state->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if($errors->has('states_id'))
                                                                        <span class="help-block has-error"> {{ $errors->first('states_id') }}</span>
                                                                    @endif</div>
                                                            </div>
                                                            {{--e- FORM FIELD--}}
                                                            {{--s- FORM FIELD--}}
                                                            <div class="form-group ">
                                                                <label class="control-label col-md-4">Region<span class="required" aria-required="true"> * </span></label>
                                                                <div class="col-md-8 {{ $errors->has('regions_id')||$errors->has('locations')?'has-error':'' }}">
                                                                    <select name="regions_id" id="" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach( $regions as $region)
                                                                            <option value="{{ $region->id }}" {{ $location->regions_id == $region->id?'selected':'' }}>{{ $region->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if($errors->has('regions_id'))
                                                                        <span class="help-block has-error"> {{ $errors->first('regions_id') }}</span>
                                                                    @endif</div>
                                                            </div>
                                                            {{--e- FORM FIELD--}}

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn green">Update & Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--e-MODAL LOCATION--}}
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                            {{--e-OPERATING LOCATIONS--}}
                        </div>
                        {{-- END FORM --}}
                    </div>
                    <div class="row">
                        {{-- BEIGN FORM --}}
                        <div class="form-body col-md-12">

                        {{--s-CAROUSE--}}
                        <div class="component-section">
                            <div class="component-heading">
                                <h3><a data-toggle="modal" href="#modalgallery"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> Gallery</h3>
                            </div>
                            <div class="component-body">
                               <div class="containerx">
                                   <div class="col-md-12">


                                       <div class="well">
                                           <div id="myCarousel" class="carousel slide">

                                               <!-- Carousel items -->
                                               <div class="carousel-inner">
                                                   <div class="item active">
                                                       <div class="row">
                                                           <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                           </div>
                                                           <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                           </div>
                                                           <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                           </div>
                                                           <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                           </div>
                                                       </div>
                                                       <!--/row-->
                                                   </div>
                                                   <!--/item-->
                                                   <div class="item">
                                                       <div class="row">
                                                           <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                          </div>
                                                          <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                          </div>
                                                          <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                          </div>
                                                          <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                          </div>
                                                       </div>
                                                       <!--/row-->
                                                   </div>
                                                   <!--/item-->
                                                   <div class="item">
                                                       <div class="row">
                                                          <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                         </div>
                                                         <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                         </div>
                                                         <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                         </div>
                                                         <div class="col-sm-3"><a href="#x"><img src="http://placehold.it/500x500" alt="Image" class="img-responsive"></a>
                                                         </div>
                                                       </div>
                                                       <!--/row-->
                                                   </div>
                                                   <!--/item-->
                                               </div>
                                               <!--/carousel-inner--> <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>

                                               <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                                           </div>
                                           <!--/myCarousel-->
                                       </div>
                                       <!--/well-->
                                   </div>
                               </div>

                            </div>
                        </div>
                        {{--s-CAROUSE--}}
                        </div>
                        {{-- END FORM --}}
                    </div>
                    <div class="row">
                    <!-- s-DOCUMENTS -->
                    <div class="form-body col-md-12">
                        <div class="component-section wrap-document">
                            <div class="component-heading">
                                <h3><a data-toggle="modal" href="#modalDocuments"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> Document</h3>
                            </div>
                            <div class="row">
                                <div class="component-body col-md-3">
                                    <dic class="documents clearfix">
                                        <div class="doc-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
                                        <div class="doc-details">bills.pdf<br/><small>35KB</small></div>
                                    </dic>
                                </div>
                                <div class="component-body col-md-3">
                                    <dic class="documents clearfix">
                                        <div class="doc-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
                                        <div class="doc-details">File Name<br/><small>File Size</small></div>
                                    </dic>
                                </div>

                                <div class="component-body col-md-3">
                                    <dic class="documents clearfix">
                                        <div class="doc-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
                                        <div class="doc-details">File Name<br/><small>File Size</small></div>
                                    </dic>
                                </div>
                                <div class="component-body col-md-3">
                                    <dic class="documents clearfix">
                                        <div class="doc-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
                                        <div class="doc-details">File Name<br/><small>File Size</small></div>
                                    </dic>
                                </div>
                                <div class="component-body col-md-3">
                                    <dic class="documents clearfix">
                                        <div class="doc-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
                                        <div class="doc-details">File Name<br/><small>File Size</small></div>
                                    </dic>
                                </div>

                                <div class="component-body col-md-3">
                                <dic class="documents clearfix">
                                    <div class="doc-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
                                    <div class="doc-details">File Name<br/><small>File Size</small></div>
                                </dic>
                            </div>
                            </div>
                        </div>

                    </div>
                    <!-- e-DOCUMENTS -->
                    </div>
               </div>
            </div>
         </form>
      </div>

         {{-- s-MODAL COMPANY ABOUT--}}
         <div class="modal fade" id="aboutModal" tabindex="-1" role="basic" aria-hidden="true">
             <div class="modal-dialog">
                 <form role="form" method="POST" action="">
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                             <h4 class="modal-title">Update Company About</h4>
                         </div>
                         <div class="modal-body">
                             <div class="form-horizontal">

                                 <div class="form-group {{ $errors->has('')?'has-error':'' }}">
                                     <div class="col-md-12">
                                         <textarea name="" id=""  rows="10" class="form-control" >{{ $company->profile->about }}</textarea>
                                         @if($errors->has(''))
                                             <span class="help-block has-error"> {{ $errors->first('') }}</span>
                                         @endif
                                     </div>
                                 </div>



                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn green">Update & Save</button>
                         </div>
                     </div>
                 </form>
                 <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
         </div>
         {{-- e-MODAL COMPANY ABOUT--}}

        {{-- s-MODAL GALLERY--}}
        <div class="modal fade" id="modalgallery" tabindex="-1" role="basic" aria-hidden="true">
               <div class="modal-dialog">

                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                           <h4 class="modal-title">Update Gallery</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-horizontal">
                                <div class="gallery">
                                    <div class="current-gallery-images">
                                    <div class="row">
                                        <div class="col-md-2"><img src="http://placehold.it/500x500" alt="" class="img-responsive"/> <a href="" class="delete-image">Remove</a></div>
                                        <div class="col-md-2"><img src="http://placehold.it/500x500" alt="" class="img-responsive"/><a href="" class="delete-image">Remove</a></div>
                                        <div class="col-md-2"><img src="http://placehold.it/500x500" alt="" class="img-responsive"/><a href="" class="delete-image">Remove</a></div>
                                        <div class="col-md-2"><img src="http://placehold.it/500x500" alt="" class="img-responsive"/><a href="" class="delete-image">Remove</a></div>
                                        <div class="col-md-2"><img src="http://placehold.it/500x500" alt="" class="img-responsive"/><a href="" class="delete-image">Remove</a></div>
                                        <div class="col-md-2"><img src="http://placehold.it/500x500" alt="" class="img-responsive"/><a href="" class="delete-image">Remove</a></div>
                                    </div>
                                </div>
                                    <form action="/assets/global/plugins/dropzone/upload.php" class="dropzone dropzone-file-area" id="my-dropzone">
                                    <h3 class="sbold">Drop files here or click to upload</h3>
                                    <p> This is just a demo dropzone. Selected files are not actually uploaded. </p>
                                </form>
                                </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn green">Update & Save</button>
                        </div>
                     </div>

                  <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
         </div>
        {{-- e-MODAL GALLERY--}}

        {{--s-MODAL LOCATION--}}
        <div class="modal fade" id="modalContactDetails" tabindex="-1" role="basic" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                               <h4 class="modal-title">Update Contact Details</h4>
                            </div>
                            <div class="modal-body">
                              <div class="form-horizontal">
                                    {{--s- FORM FIELD--}}
                                        <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                                            <label class="control-label col-md-4">Email<span class="required" aria-required="true">* </span></label>
                                            <div class="col-md-8"><input type="text" class="form-control" placeholder="" name="email" value="{{ $company->profile->email }}">
                                                @if($errors->has('email'))
                                                    <span class="help-block has-error"> {{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    {{--e- FORM FIELD--}}

                                  {{--s- FORM FIELD--}}
                                      <div class="form-group {{ $errors->has('phone_1')?'has-error':'' }}">
                                          <label class="control-label col-md-4">Phone 1<span class="required" aria-required="true"> * </span></label>
                                          <div class="col-md-8"><input type="text" class="form-control" placeholder="" name="phone_1" value="{{ $company->profile->phone_1 }}">
                                              @if($errors->has('phone_1'))
                                                  <span class="help-block has-error"> {{ $errors->first('phone_1') }}</span>
                                              @endif
                                          </div>
                                      </div>
                                  {{--e- FORM FIELD--}}

                                  {{--s- FORM FIELD--}}
                                  <div class="form-group {{ $errors->has('phone_2')?'has-error':'' }}">
                                      <label class="control-label col-md-4">Phone 2 </label>
                                      <div class="col-md-8"><input type="text" class="form-control" placeholder="" name="phone_2" value="{{ $company->profile->phone_2 }}">
                                          @if($errors->has('phone_2'))
                                              <span class="help-block has-error"> {{ $errors->first('phone_2') }}</span>
                                          @endif
                                      </div>
                                  </div>
                                  {{--e- FORM FIELD--}}

                                   {{--s- FORM FIELD--}}
                                       <div class="form-group {{ $errors->has('website')?'has-error':'' }}">
                                           <label class="control-label col-md-4">Website<span class="required" aria-required="true"> * </span></label>
                                           <div class="col-md-8"><input type="text" class="form-control" placeholder="" name="website" value="{{ $company->profile->website }}">
                                               @if($errors->has('website'))
                                                   <span class="help-block has-error"> {{ $errors->first('website') }}</span>
                                               @endif
                                           </div>
                                       </div>
                                   {{--e- FORM FIELD--}}


                              </div>
                            </div>
                            <div class="modal-footer">
                               <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn green">Update & Save</button>
                            </div>
                        </div>
                     </div>
                </div>
        {{--e-MODAL LOCATION--}}

        {{-- s-MODAL DOCUMENT--}}
        <div class="modal fade" id="modalDocuments" tabindex="-1" role="basic" aria-hidden="true">
                       <div class="modal-dialog">

                             <div class="modal-content">
                                <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                   <h4 class="modal-title">Update Gallery</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="form-horizontal">
                                        <div class="modal-documents">
                                            <div class="current-documents">
                                            <div class="row">
                                                <div class="col-md-12"><a href="#" role="delete-this"><i class="fa fa-trash" aria-hidden="true"></i></a> file name.pdf</div>
                                                <div class="col-md-12"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> file name.pdf</div>
                                                <div class="col-md-12"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> file name.pdf</div>
                                                <div class="col-md-12"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> file name.pdf</div>
                                                <div class="col-md-12"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> file name.pdf</div>
                                                <div class="col-md-12"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> file name.pdf</div>


                                            </div>
                                        </div>
                                            <form action="/assets/global/plugins/dropzone/upload.php" class="dropzone dropzone-file-area" id="my-dropzone">
                                            <h3 class="sbold">Drop files here or click to upload</h3>
                                            <p> This is just a demo dropzone. Selected files are not actually uploaded. </p>
                                        </form>
                                        </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                   <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                   <button type="submit" class="btn green">Update & Save</button>
                                </div>
                             </div>

                          <!-- /.modal-content -->
                       </div>
                       <!-- /.modal-dialog -->
                 </div>
        {{-- e-MODAL DOCUMENT--}}




   </div>
   <!-- END CONTENT BODY -->

</div>
<!-- END CONTENT -->
@endsection