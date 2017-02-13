
@extends('layouts.master')

@section('content')

    <?php
            //dd($QuotesTableData);
     ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper portal view-supplier-quotes ">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- FORM -->
            @include('partials.page_breadcrumb')

            <div class="row wrap-ccf-form">
                <div class="col-md-12">
                     <div class="portlet light bordered">
                        <div class="portlet-body">

                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        </p>
                                    @endif
                                @endforeach
                            </div>

                            {{--==================================== LOGO / SERVICE AREA / CONTACT DETAILS ======================== --}}
                            <div class="row">
                                <div class="col-sm-2">
                                    <img class="img-responsive" src="../../../assets/pages/img/download.jpg" alt="compay logo" class="img-responsive">
                                </div>
                                <div class="col-sm-5">
                                    {{--===================================== MAIN HEADING ==================================--}}
                                    <div class="section-heading clearfix">
                                        <h1 class="ccf-page-title">Company Constructors</h1>

                                        <hr/>
                                    </div>
                                    {{--===================================== MAIN HEADING ==================================--}}

                                    {{--===================================== SB HEADING / SERVICE AREA ==================================--}}
                                    <div class="heading-company-details">
                                        <h4>Heavy Machinery</h4>
                                        <p><label><strong>Service Areas: </strong></label>
                                         <label class="highlighted-box bg-purple-intense">NSW</label>
                                          <label  class="highlighted-box bg-purple-intense">CDB Inner</label></p>
                                          <hr/>


                                    </div>
                                    {{--===================================== SB HEADING / SERVICE AREA ==================================--}}

                                    {{--===================================== CONTACT DETAILS ==================================--}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>
                                                <label class="mg-right"><i class="fa fa-phone" aria-hidden="true"></i> (03) 9822 0900</label>
                                            </p>

                                        </div>
                                        <div class="col-md-6">

                                            <p>
                                                <label><a href="thecrew@safety.com">thecrew@safety.com</a></label>
                                            </p>
                                        </div>
                                    </div>
                                    {{--===================================== CONTACT DETAILS ==================================--}}
                                </div>
                                <div class="col-sm-2">
                                    <img class="img-responsive" src="../../../assets/pages/img/dummy-logo.gif" alt="logo image" class="img-responsive">
                                </div>
                            </div>
                            {{--==================================== LOGO / SERVICE AREA / CONTACT DETAILS ======================== --}}
                            <hr/>
                            {{--==================================== REQUEST ======================== --}}

                            <div class="section-heading clearfix">
                                <h1 class="ccf-page-title">Request #</h1>
                                <p class="highlighted bg-green-jungle bg-font-green-jungle">Plant Hire</p>
                                <p class="highlighted bg-yellow bg-font-yellow">Pending</p>
                            </div>

                            {{--************************************ SECTION ****************************--}}
                            <div class="portlet light bordered">
                                <div class="row">

                                    <div class="col-sm-4 time-duration">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Machine Type:</p>
                                            </div>
                                            <div class="col-md-6"><p>Excavator</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Option:</p>
                                            </div>
                                            <div class="col-md-6"><p>Auger</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Hire Type:</p>
                                            </div>
                                            <div class="col-md-6"><p>Dry Hire</p></div>
                                        </div>

                                    </div>
                                    <div class="col-sm-4 time-duration">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Shifts per day:</p>
                                            </div>
                                            <div class="col-md-6"><p>1</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Days per week:</p>
                                            </div>
                                            <div class="col-md-6"><p>5</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Size/Weight:</p>
                                            </div>
                                            <div class="col-md-6"><p>3t - 5t</p></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 time-duration">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Accessories:</p>
                                            </div>
                                            <div class="col-md-7"><p>Mud Bucket, Ripper Tyre</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Bucket width:</p>
                                            </div>
                                            <div class="col-md-7"><p>1500mm</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Auger Size:</p>
                                            </div>
                                            <div class="col-md-7"><p>150mm</p></div>
                                        </div>

                                    </div>

                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-12"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam debitis dolorem earum, facere fugiat magnam magni modi molestiae natus, nesciunt quaerat tempora tempore veniam voluptas.</p></div>
                                </div>
                                <div class="row time-duration">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Duration:</p>
                                            </div>
                                            <div class="col-md-6"><p>16/3/16 - 25/3/16</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Request Expires: </p>
                                            </div>
                                            <div class="col-md-6"><p>10/3/2016</p></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Created By:</p>
                                            </div>
                                            <div class="col-md-6"><p>User Name</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Created Date: </p>
                                            </div>
                                            <div class="col-md-6"><p>10/3/2016</p></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--************************************ SECTION ****************************--}}

                            {{--==================================== REQUEST ======================== --}}

                            {{--==================================== MY QUOATE ===========================--}}
                            <div class="section-heading clearfix">
                                <h1 class="ccf-page-title">My Quote</h1>
                            </div>
                            {{--************************************ TABLE ********************************--}}


                            <form role="form" name="edit_supplier_quotes" id="edit_supplier_quotes" method="POST" onsubmit="return modalFormValidationAndSave('edit_supplier_quotes', '{{route('edit_supplier_quotes')}}');" action="{{ route('edit_supplier_quotes')}}">
                                    <div>
                                     @foreach($QuotesTableData as $Quotes)

                                            <div class="form-group row">
                                                <label class="control-label col-md-4">Status</label>
                                                <div class="col-md-8">
                                                    <p class="status-shown"><span class="color-view bg-purple-seance bg-font-purple-seance status-{{$Quotes->status}}">{{$Quotes->status}}
                                                    </span></p>
                                                </div>
                                            </div>
                                         <div class="form-group row {{ $errors->has('price')?'has-error':'' }}">
                                             <label class="control-label col-md-4">Price<span class="required" aria-required="true"> * </span></label>
                                             <div class="col-md-8">
                                                 @if($Quotes->status == 'pending')
                                                 <input type="text" class="form-control"  name="price" id="price" value="{{$Quotes->price}}">
                                                 @else
                                                  <p>{{$Quotes->price}}</p>
                                                 @endif
                                                 @if($errors->has('price'))
                                                     <span class="help-block has-error">{{ $errors->first('price') }}</span>
                                                 @endif
                                             </div>
                                         </div>

                                         <div class="form-group row {{ $errors->has('expiry_date')?'has-error':'' }}">
                                             <label class="control-label col-md-4">Expiry Date<span class="required" aria-required="true"> * </span></label>
                                             <div class="col-md-8">

                                                 @if($Quotes->status == 'pending')
                                                 <input class="form-control form-control-inline date-picker"  {{--placeholder="{{$Quotes->expiry_date}}"--}}  name="expiry_date" id="expiry_date" size="16" value="{{$Quotes->expiry_date}}" />
                                                 @else
                                                 <p>{{$Quotes->expiry_date}}</p>
                                                 @endif

                                                 @if($errors->has('expiry_date'))
                                                     <span class="help-block has-error"> {{ $errors->first('expiry_date') }}</span>
                                                 @endif
                                             </div>
                                         </div>

                                         <div class="form-group row">
                                             <label class="control-label col-md-4">Quote Description<span class="required" aria-required="true">  </span></label>
                                             <div class="col-md-8">
                                                 @if($Quotes->status == 'pending')
                                                 <textarea name="description" value="{{$Quotes->description}}" id="description" cols="30" rows="5"  {{--placeholder="{{$Quotes->description}}"--}} class="form-control">{{$Quotes->description}}</textarea>
                                                 @else
                                                     <p>{{$Quotes->description}}</p>
                                                 @endif
                                             </div>
                                         </div>

                                         <input type="hidden" name="id" value="{{$Quotes->id}}">

                                         <input type="hidden" name="job_request_id" value="{{$Quotes->job_request_id}}">

                                         <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                     @endforeach
                                 </div>
                                 <div class="modal-footer">

                                     @if($Quotes->status == 'pending')
                                     <button type="submit" name="send1" id="send1" class="btn green">Update</button>
                                     @endif
                                 </div>
                             </form>
                            {{--************************************ TABLE ********************************--}}
                            {{--==================================== MY QUOATE ===========================--}}
                        </div>
                     </div>
                </div>

            </div>

    {{--e-MODAL-MATERIAL --}}
        </div>

    </div>

@endsection