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
                   <h1 class="ccf-page-title">Company Profile</h1>
                   <p>View or Edit your company profile</p>
               </div>
               <!-- END PAGE TITLE-->
               <div class="portlet-body form ">
                    <div class="row">
                        <!-- BEGIN FORM-->
                        <div class="form-body col-md-8 ">
                     {{-- s-COMPANY PROFILE --}}
                     <div class="component-section">
                        <div class="component-heading">
                        <h3><a data-toggle="modal" href="#descModal"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> Company Profile ( Description )</h3>
                        </div>
                        <div class="component-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur est perferendis sapiente tempora veniam.</p>
                        </div>
                     </div>
                     {{-- e-COMPANY PROFILE --}}
                    {{-- s-COMPANY SERVICE --}}
                    <div class="component-section">
                        <div class="component-heading">
                            <h3><a data-toggle="modal" href="#descModal"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> Company Services</h3>
                        </div>
                        <div class="component-body">
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur est perferendis sapiente tempora veniam.</p>
                        </div>
                    </div>
                    {{-- e-COMPANY SERVICE --}}

                    {{-- s-COMPANY SERVICE --}}
                    <div class="component-section">
                        <div class="component-heading">
                            <h3><a data-toggle="modal" href="#descModal"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> Company Projectsx</h3>
                        </div>
                        <div class="component-body">
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur est perferendis sapiente tempora veniam.</p>
                        </div>
                    </div>
                    {{-- e-COMPANY SERVICE --}}

                    </div>
                        <!-- END FORM-->

                        {{-- BEIGN FORM --}}
                        <div class="form-body col-md-4">
                        {{--s-CONTACT DETAILS--}}
                        <div class="component-section">
                            <div class="component-heading">
                                <h3><a data-toggle="modal" href="#modalContactDetails"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> Contact Details</h3>
                            </div>
                            <div class="component-body">
                                <p><i class="fa fa-envelope-o" aria-hidden="true"></i> mail@example.com</p>
                                <p><i class="fa fa-phone" aria-hidden="true"></i> +61 452 154 487</p>
                                <p><i class="fa fa-phone" aria-hidden="true"></i> +61 452 154 487</p>
                                <p><i class="fa fa-phone" aria-hidden="true"></i> +61 452 154 487</p>
                                <p><i class="fa fa-phone" aria-hidden="true"></i> email@example.com</p>
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
                                    <p class="clearfix">
                                        <span class="loc-icon"><a data-toggle="modal" href="#modalLocations"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <span class="desc"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="loc-icon"><a data-toggle="modal" href="#modalLocations"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <span class="desc"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="loc-icon"><a data-toggle="modal" href="#modalLocations"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <span class="desc"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                    </p>

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

        {{-- s-MODAL COMPANY PROFILE--}}
        <div class="modal fade" id="descModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
        <form role="form" method="POST" action="">
           <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                 <h4 class="modal-title">Update Company Profile (Description)</h4>
              </div>
              <div class="modal-body">
                <div class="form-horizontal">
                     <div class="form-group {{ $errors->has('spcp-company-profile-heading')?'has-error':'' }}">
                         <label class="control-label col-md-4">Heading<span class="required" aria-required="true"> * </span></label>
                         <div class="col-md-8">
                         <input type="text" class="form-control" placeholder="" name="spcp-company-profile-heading" value="Company Profile ( Description )">
                         @if($errors->has('spcp-company-profile-heading'))
                             <span class="help-block has-error"> {{ $errors->first('spcp-company-profile-heading') }}</span>
                         @endif
                         </div>
                     </div>

                     <div class="form-group {{ $errors->has('')?'has-error':'' }}">
                         <label class="control-label col-md-4">Description<span class="required" aria-required="true"> * </span></label>
                         <div class="col-md-8">
                         <textarea name="" id=""  rows="10" class="form-control" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis distinctio maiores nisi odio quis quod.</textarea>
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
        {{-- e-MODAL COMPANY PROFILE--}}

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
        <div class="modal fade" id="modalLocations" tabindex="-1" role="basic" aria-hidden="true">
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
                                <div class="col-md-8 {{ $errors->has('name')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                             name="name" value="{{ old("name") }}">
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
                                <div class="col-md-8 {{ $errors->has('street_address')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                             name="street_address" value="{{ old("street_address") }}">
                                    @if($errors->has('street_address'))
                                        <span class="help-block has-error"> {{ $errors->first('street_address') }}</span>
                                    @endif
                                </div>
                            </div>
                            {{--/street address--}}
                            {{--s- FORM FIELD--}}
                            <div class="form-group ">
                                <label class="control-label col-md-4">Suburb<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8 {{ $errors->has('suburb')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                             name="suburb" value="{{ old("suburb") }}" list="locsuburb">
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
                                <div class="col-md-8 {{ $errors->has('post_code')||$errors->has('locations')?'has-error':'' }}"><input type="text" class="form-control" placeholder=""
                                                             name="post_code" value="{{ old("post_code") }}">
                                    @if($errors->has('post_code'))
                                        <span class="help-block has-error"> {{ $errors->first('post_code') }}</span>
                                    @endif
                                </div>
                            </div>
                            {{--e- FORM FIELD--}}
                            {{--s- FORM FIELD--}}
                            <div class="form-group ">
                                <label class="control-label col-md-4">State<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8 {{ $errors->has('states_id')||$errors->has('locations')?'has-error':'' }}"><select name="states_id" id="" class="form-control">
                                        <option value="">Select</option>
                                        <option value="">cccc</option>
                                        <option value="">gg</option>
                                        <option value="">hhhh</option>
                                    </select>
                                    @if($errors->has('states_id'))
                                        <span class="help-block has-error"> {{ $errors->first('states_id') }}</span>
                                    @endif</div>
                            </div>
                            {{--e- FORM FIELD--}}
                            {{--s- FORM FIELD--}}
                            <div class="form-group ">
                                <label class="control-label col-md-4">Region<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-8 {{ $errors->has('regions_id')||$errors->has('locations')?'has-error':'' }}"><select name="regions_id" id="" class="form-control">
                                        <option value="">Select</option>
                                        <option value="">cccc</option>
                                       <option value="">gg</option>
                                       <option value="">hhhh</option>
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
                                    <div class="form-group {{ $errors->has('sp-cd-email')?'has-error':'' }}">
                                        <label class="control-label col-md-4">Email<span class="required" aria-required="true"> * </span></label>
                                        <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" name="sp-cd-email" value="{{ old("sp-cd-email") }}">
                                        @if($errors->has('sp-cd-email'))
                                            <span class="help-block has-error"> {{ $errors->first('sp-cd-email') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}
                                    {{--street address--}}
                                    <div class="form-group {{ $errors->has('sp-cd-phone1')?'has-error':'' }}">
                                        <label class="control-label col-md-4">Phone 1<span class="required" aria-required="true"> * </span></label>
                                        <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" name="sp-cd-phone1" value="{{ old("sp-cd-phone1") }}">
                                        @if($errors->has('sp-cd-phone1'))
                                            <span class="help-block has-error"> {{ $errors->first('sp-cd-phone1') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                    {{--/street address--}}
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group {{ $errors->has('sp-cd-phone3')?'has-error':'' }}">
                                        <label class="control-label col-md-4">Phone 3<span class="required" aria-required="true"> * </span></label>
                                        <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" name="sp-cd-phone3" value="{{ old("sp-cd-phone3") }}">
                                        @if($errors->has('sp-cd-phone3'))
                                            <span class="help-block has-error"> {{ $errors->first('sp-cd-phone3') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                    {{--e- FORM FIELD--}}
                                    {{--s- FORM FIELD--}}
                                    <div class="form-group {{ $errors->has('sp-cd-website')?'has-error':'' }}">
                                        <label class="control-label col-md-4">Website<span class="required" aria-required="true"> * </span></label>
                                        <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="" name="sp-cd-website" value="{{ old("sp-cd-website") }}">
                                        @if($errors->has('sp-cd-website'))
                                            <span class="help-block has-error"> {{ $errors->first('sp-cd-website') }}</span>
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