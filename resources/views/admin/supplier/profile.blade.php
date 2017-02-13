<div class="portlet-body form">
    <div class="row">
        {{-- ================================================== UPLOAD COMPANY LOGO + COMPANY DETAILS ======================================== --}}
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            {{-- ============================================== UPLOAD COMPANY LOGO ======================================== --}}
            <div class="logo-section">
                <div class="row">
                    {{-- ====================================== LOGO =======================================================--}}
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 main-logo">
                        <img src="{{ $company->profile->logo?$company->profile->logo:"/uploads/logos/logo-silhouette.jpg" }}" alt="" class="img-responsive"/>
                        @if($company->isOwner())
                            <div class="wrap-link-image-change">
                                <a href="javascript:"  id="logo_link" class="link-image-change"><span><i class="fa fa-upload" aria-hidden="true"></i> Upload</span></a>
                            </div>
                            <form action="{{ route('company.profile.logo_upload') }}" method="POST" id="logo_form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" name="logo" id="logo" style="visibility:hidden;" accept="image/gif, image/jpeg, image/png">
                            </form>
                        @endif
                    </div>
                    {{-- ====================================== LOGO =======================================================--}}

                    {{-- ====================================== COMPANY DETAILD ============================================--}}
                    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 cat-area">
                        <h2 class="ccf-page-sub-title">{{ $company->profile->name }}</h2>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>
                                    @if($company->isOwner())
                                        <a data-toggle="modal" href="#serviceCategoryModal" class="btn theme-btn btn-xs"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                    @endif

                                    <strong>Service Category</strong></h5>
                            </div>
                            <div class="col-md-8">
                                <p>
                                    @if($company->profile->operating != null)
                                        <span class="outline-box cg-blue" {{--class="color-view bg-purple-seance bg-font-purple-seance"--}}>
                                                           {{ $company->profile->operating != null?$company->profile->operating->name:"" }}
                                                       </span>
                                    @endif
                                </p>
                            </div>

                            @if($company->isOwner())
                                <div class="modal fade" id="serviceCategoryModal" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form role="form" method="POST" action="{{ route('company.profile.service_category') }}" name="service_category">

                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Update Service Category</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-horizontal">

                                                        <div class="form-group {{ $errors->has('')?'has-error':'' }}">
                                                            <div class="col-md-12">
                                                                <select class="form-control" name="operating_category_id" >
                                                                    <option value="0" >Select</option>
                                                                    @foreach($operatingCategory as $oc)
                                                                        <option @if($company->profile->operating_category_id==$oc->id)
                                                                                selected="selected"
                                                                                @endif
                                                                                value="{{$oc->id}}">{{$oc->name}}</option>
                                                                    @endforeach
                                                                </select>
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
                            @endif
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>
                                    @if($company->isOwner())
                                        <a data-toggle="modal" href="{{route('show_supplier_my_account')}}" class="btn theme-btn btn-xs"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                    @endif
                                    <strong>Service Area</strong></h5>
                            </div>
                            <div class="col-md-8">
                                {{--@foreach($company->locations as $location)
                                    <p class="clearfix">
                                      <span class="outline-box cg-blue">{{ $location->states->name }}</span>
                                    </p>
                                @endforeach--}}
                            </div>
                        </div>
                    </div>
                    {{-- ====================================== COMPANY DETAILD ============================================--}}


                </div>
            </div>
            {{-- ============================================== UPLOAD COMPANY LOGO ======================================== --}}

            {{-- ============================================== COMAPNY DETAILS  =========================================== --}}
            <div class="form-body row">
                {{-- s-COMPANY PROFILE --}}
                <div class="component-section">
                    <div class="component-heading">
                        <h3>
                            @if($company->isOwner())
                                <a data-toggle="modal" href="#aboutModal" class="btn theme-btn btn-xs"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                            @endif
                            Company About</h3>
                    </div>
                    <div class="component-body">
                        <p> {{ $company->profile->about }}</p>
                    </div>

                    {{-- s-MODAL COMPANY ABOUT--}}
                    @if($company->isOwner())
                        <div class="modal fade" id="aboutModal" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">
                                <form role="form" method="POST" action="{{ route('company.profile.update_about') }}" name="about">

                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Update Company About</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-horizontal">

                                                <div class="form-group {{ $errors->has('')?'has-error':'' }}">
                                                    <div class="col-md-12">
                                                        <textarea name="about" id=""  rows="10" class="form-control" >{{ $company->profile->about }}</textarea>
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
                    @endif
                    {{-- e-MODAL COMPANY ABOUT--}}

                </div>
                {{-- e-COMPANY PROFILE --}}

                {{-- s-COMPANY SERVICE --}}
                <div class="component-section">
                    <div class="component-heading">
                        <h3>
                            @if($company->isOwner())
                                <a data-toggle="modal" href="#serviceModal" class="btn theme-btn btn-xs"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                            @endif
                            Company Services</h3>
                    </div>
                    <div class="component-body">
                        <p> {{ $company->profile->services }}</p>
                    </div>

                    {{-- s-MODAL COMPANY SERVICES--}}
                    @if($company->isOwner())
                        <div class="modal fade" id="serviceModal" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">
                                <form role="form" method="POST"  action="{{ route('company.profile.update_services') }}" name="services">

                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Update Company Services</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-horizontal">

                                                <div class="form-group {{ $errors->has('')?'has-error':'' }}">
                                                    <div class="col-md-12">
                                                        <textarea name="services" id=""  rows="10" class="form-control" >{{ $company->profile->services }}</textarea>
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
                    @endif
                    {{-- e-MODAL COMPANY SERVICES--}}

                </div>
                {{-- e-COMPANY SERVICE --}}

                {{-- s-COMPANY SERVICE --}}
                <div class="component-section">
                    <div class="component-heading">
                        <h3>
                            @if($company->isOwner())
                                <a data-toggle="modal" href="#projectsModal" class="btn theme-btn btn-xs"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                            @endif
                            Company Projects</h3>
                    </div>
                    <div class="component-body">
                        <p> {{ $company->profile->projects }}</p>
                    </div>

                    {{-- s-MODAL COMPANY PROJECTS--}}
                    @if($company->isOwner())
                        <div class="modal fade" id="projectsModal" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">

                                <form role="form" method="POST" action="{{ route('company.profile.update_projects') }}" name="projects">

                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Update Company Projects</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-horizontal">

                                                <div class="form-group {{ $errors->has('')?'has-error':'' }}">
                                                    <div class="col-md-12">
                                                        <textarea name="projects" id=""  rows="10" class="form-control" >{{ $company->profile->projects }}</textarea>
                                                        @if($errors->has(''))
                                                            <span class="help-block has-error"> {{ $errors->first('') }}</span>
                                                        @endif
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn theme-btn">Update & Save</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- /.modal-content -->
                            </div>

                            <!-- /.modal-dialog -->
                        </div>
                    @endif
                    {{-- e-MODAL COMPANY PROJECTS--}}
                </div>
                {{-- e-COMPANY SERVICE --}}

            </div>
            {{-- ============================================== COMAPNY DETAILS  =========================================== --}}



        </div>
        {{-- ================================================== UPLOAD COMPANY LOGO + COMPANY DETAILS ======================================== --}}

        {{-- ================================================== INDUSTRY CERTIFICATION + CONTACT DETAILS ======================================================= --}}
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
            {{-- ================================================== INDUSTRY CERTIFICATION ======================================================= --}}
            <div class="sub-logos wrap-industry-certification">
                <div class="row">
                    <div class="component-section">
                        <br/>
                        <div class="component-heading">
                            <h3>Industry Certification</h3>
                        </div>


                    </div>

                    <?php $max_num =4;
                    for($i=0; $i<$max_num; $i++){
                    $mun = $i+1;
                    $certificate = $company->profile->industryCertification->where('num' , $mun)->first()
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="wrap-image-certification">
                            @if($certificate)

                                <a href="{{route('company.profile.delete_certificates', $certificate->id )}}" onclick="return confirm('Are you sure you want to delete?');" class="delete-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
                                <img src="{{ $certificate->path?$ImagePath.'/'.$certificate->path:"/uploads/logos/logo-silhouette.jpg" }}" alt="" class="img-responsivex centered-image"/>

                            @else
                                <img src="\assets\layouts\layout\img\industry-certification-logo-silhouette.png" alt="" class="img-responsivex centered-image"/>
                            @endif
                        </div>

                        @if($company->isOwner())
                            <div class="wrap-link-image-change">
                                <a href="javascript:"  id="industry_certification_{{$mun}}" class="link-image-change"><span><i class="fa fa-upload" aria-hidden="true"></i> Upload</span></a>
                            </div>
                            <form action="{{route('company.profile.certificate_upload')}}" method="POST" id="industry_certification_form_{{$mun}}" enctype="multipart/form-data">
                                <input type="hidden" name="num" value="{{$mun}}" >
                                {{ csrf_field() }}
                                <input type="file" name="logo" id="logo_form_{{$mun}}" style="visibility:hidden;" accept="image/gif, image/jpeg, image/png">
                            </form>
                        @endif

                    </div>
                    <?php } ?>
                </div>
            </div>
            {{-- ================================================== INDUSTRY CERTIFICATION ======================================================= --}}
            <div class="form-body row">
                {{--==================================== CONTACT DETAILS ====================================--}}
                <div class="component-section wrap-contact-details">
                    <div class="component-heading">
                        <h3>
                            @if($company->isOwner())
                                <a data-toggle="modal" href="#modalContactDetails" class="btn theme-btn btn-xs"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                            @endif
                            Contact Details</h3>
                    </div>
                    <div class="component-body">
                        <p><i class="fa fa-envelope-o" aria-hidden="true"></i>{{ $company->profile->email }}</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> {{ $company->profile->phone_1 }}</p>
                        @if($company->profile->phone_2)
                            <p><i class="fa fa-phone" aria-hidden="true"></i> {{ $company->profile->phone_2 }}</p>
                        @endif
                        <p><i class="fa fa-globe" aria-hidden="true"></i> {{ $company->profile->website }}</p>
                    </div>
                </div>
                {{--==================================== CONTACT DETAILS ====================================--}}
                @if($company->tenant->type != \App\Constants\TenantType::HIRER)
                    {{--==================================== OPERATING LOCATIONS =================================--}}
                    <div class="component-section">
                        <div class="component-heading">
                            <h3> Operating Locations</h3>
                        </div>
                        <div class="component-body">
                            <div class="locations">

                                {{--@foreach($company->locations as $location)
                                    <p class="clearfix">
                                        <span class="loc-icon">
                                            --}}{{--<a data-toggle="modal" href="#modalLocations_{{$location->id}}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>--}}{{-- <i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <span class="desc"> {{ $location->inline() }}</span>
                                    </p>
                                @endforeach--}}


                            </div>
                        </div>
                    </div>
                @endif
                {{--==================================== OPERATING LOCATIONS =================================--}}
            </div>

        </div>
        {{-- ================================================== INDUSTRY CERTIFICATION + CONTACT DETAILS ======================================================= --}}

    </div>

    <div class="row">
        {{-- BEIGN FORM --}}
        <div class="form-body col-md-12">

            {{--s-CAROUSE--}}
            <div class="component-section" id="gallery">
                <div class="component-heading">
                    <h3>Gallery</h3>
                </div>
                <div class="component-body">
                    <div class="row">
                        <div class="col-md-12">


                            {{--=============================================== TEST GALLERY =======================================--}}

                            <div class="wrap-gallery">
                                <div class="row">
                                    <div class="col-md-12">

                                        {{--<div class="carousel slide multi-item-carousel " id="theCarousel">
                                        <div class="carousel-inner">

                                            @foreach($company->profile->gallery as $key => $image)
                                                <div class="item {{ $key==0?"active":"" }}">
                                                    <div class="col-xs-4">
                                                        <a href="#1"><img src="{{ $image->url }}" alt=" {{ $image->name }}" class="img-responsive"></a>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                        <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                        <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                                      </div>--}}

                                        {{--===========================================================================================--}}
                                        @if($company->profile->gallery->count())
                                            <div class="wrapper">
                                                <div class="jcarousel-wrapper">
                                                    <div class="jcarousel" data-jcarousel="true">
                                                        <ul>
                                                            @foreach($company->profile->gallery as $key => $image)


                                                                <li><img src="{{ $image->url }}" alt=" {{ $image->name }}" ></li>


                                                            @endforeach
                                                            {{--<li><img src="../../../public/assets/pages/img/temp-img/img1.jpg" alt=""/></li>
                                                            <li><img src="../../../public/assets/pages/img/temp-img/img2.jpg" alt=""/></li>
                                                            <li><img src="../../../public/assets/pages/img/temp-img/img3.jpg" alt=""/></li>
                                                            <li><img src="../../../public/assets/pages/img/temp-img/img4.jpg" alt=""/></li>
                                                            <li><img src="../../../public/assets/pages/img/temp-img/img5.jpg" alt=""/></li>
                                                            <li><img src="../../../public/assets/pages/img/temp-img/img6.jpg" alt=""/></li>--}}
                                                        </ul>
                                                    </div>

                                                    <a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true">‹</a>
                                                    <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true">›</a>
                                                </div>
                                            </div>
                                        @endif


                                        {{--===========================================================================================--}}



                                    </div>
                                </div>

                                @if($company->isOwner())
                                    {{-- ================================ EDIT GALLERY BUTTON============================= --}}
                                    <a href="javascript:;" class="edit-carousel btn theme-btn btn-lg"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit Gallery</a>
                                    {{-- ================================ EDIT GALLERY BUTTON============================= --}}

                                    {{-- ================================ TOOGLE CAROUSEL ================================ --}}
                                    <div class="gallery">
                                        @if($company->profile->gallery->count())
                                            <div class="current-gallery-images">
                                                <div class="row">
                                                    @foreach($company->profile->gallery as $image)
                                                        <div class="col-md-2">
                                                            <div class="wrap-img">
                                                                <img src="{{ $image->url }}" alt="" class="img-responsive"/>

                                                            </div>
                                                            <a href="{{ route('company.profile.delete_image', uid($image->id)) }}" class="delete-image" ><i class="fa fa-trash-o" aria-hidden="true"></i> Remove</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        <form action="{{ route('company.profile.add_image') }}" class="dropzone dropzone-file-area" id="gallery-dropzone">
                                            {{ csrf_field() }}
                                            <h3 class="sbold">Drop images here or click to upload</h3>
                                        </form>

                                    </div>
                                    {{-- ================================ TOOGLE CAROUSEL ================================ --}}
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        {{--e-CAROUSE--}}
    </div>
    {{-- END FORM --}}
</div>
{{--============================================== CAROUSEL =============================================--}}

{{--============================================== DOCUMENTS =============================================--}}
<div class="row">
    <!-- s-DOCUMENTS -->
    <div class="form-body">
        <div class="component-section wrap-document">
            <div class="component-heading" id="docs">
                <h3><a data-toggle="modal" href="#modalDocuments"></a> Document</h3>
            </div>
            @if($company->isOwner())
                <form action="{{ route('company.profile.add_document') }}" class="dropzone dropzone-file-area" id="document-dropzone">
                    {{ csrf_field() }}
                    <h3 class="sbold">Drop documents here or click to upload</h3>
                </form>
            @endif
            <p></p>
            <div class="row">

                @foreach($company->documents as $key => $document)
                    <div class="component-body col-md-3">
                        <div class="documents clearfix">


                            <div class="doc-details">
                                <div class="doc-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
                                <div class="file-details">
                                    <a data-toggle="modal" href="#documentPreviewModal_{{ $key }}">{{ $document->name }}</a>
                                    <br/>
                                    <small>{{ $document->size }}</small>
                                    <br/>
                                    @if($company->isOwner())
                                        <a href="{{ route('company.profile.delete_document', uid($document->id)) }}" class="delete-file"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove</a>
                                    @endif
                                </div>


                            </div>
                        </div>
                    </div>

                    {{-- s-MODAL Doc Preview--}}
                    <div class="modal fade"  id="documentPreviewModal_{{ $key }}" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">{{ $document->name }} Preview</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-horizontal">
                                        <iframe src="https://drive.google.com/viewerng/viewer?{{$document->full_url}}" class="col-md-12" height="800px"></iframe>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    {{-- e-MODAL Doc Preview--}}

                @endforeach
            </div>

        </div>
        <!-- e-DOCUMENTS -->
    </div>

</div>