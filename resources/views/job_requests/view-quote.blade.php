@extends('layouts.master')

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper portal supplier-portal-company-profile">

        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BAR -->

            @include('partials.page_breadcrumb')


            <!-- hirer profile -->
            @if(user()->role_id == 4)
            <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->
                <div class="wrap-ccf-form">

                    <div class="portlet light bordered">
                        <!-- BEGIN PAGE TITLE-->
                        <div class="wrap-ccf-page-title">
                            <h1 class="ccf-page-title">Quote #{{$quote->id}}</h1>
                            <p>View or edit your company quote settings</p>
                        </div>
                        <!-- END PAGE TITLE-->
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
                                            </div>
                                            {{-- ====================================== LOGO =======================================================--}}

                                            {{-- ====================================== COMPANY DETAILD ============================================--}}
                                            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 cat-area">
                                                <h2 class="ccf-page-sub-title">{{ $company->profile->name }}</h2>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h5><strong>Operating Categories</strong></h5>
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
                                                </div>
                                                <br/>
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <h5><strong>Service Areas</strong></h5>
                                                    </div>

                                                    <div class="col-md-8">
                                                        @foreach($company->locations as $location)
                                                            <p class="clearfix">
                                                              <span class="outline-box cg-blue">{{ $location->states->name }}</span>
                                                            </p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ====================================== COMPANY DETAILD ============================================--}}


                                        </div>
                                    </div>
                                    {{-- ============================================== UPLOAD COMPANY LOGO ======================================== --}}

                                    {{-- ============================================== QUOTE DETAILS  =========================================== --}}
                                    <div class="form-body row">
                                        {{-- s-COMPANY PROFILE --}}

                                        <div class="form-horizontal">

                                                <div class="form-group">
                                                    <div class="col-md-2">Quote:</div>
                                                    <div class="col-md-10">
                                                        <p>#{{ $quote->id }}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-2">Status:</div>
                                                    <div class="col-md-10">
                                                        <p class="status-shown">
                                                            @foreach($quoteStatus as $statusKey => $statusValue)
                                                                @if($quote->status == $statusKey)
                                                                    <span class="color-view bg-purple-seance bg-font-purple-seance status-{{$statusValue}}">{{ $statusValue}}</span>
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-2">Date Submitted:</div>
                                                    <div class="col-md-10">
                                                        <p>{{ $quote->created_at}} </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-2">Description:</div>
                                                    <div class="col-md-10">
                                                        <p>{{ $quote->description}} </p>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-2">Price:</div>
                                                    <div class="col-md-10">
                                                        <p>{{ $quote->price}} </p>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-2">Expiary Date:</div>
                                                    <div class="col-md-10">
                                                        <p>{{ $quote->expiry_date}} </p>
                                                    </div>
                                                </div>
                                        </div>

                                        {{-- e-COMPANY PROFILE --}}
                                    </div>
                                    {{-- ============================================== QUOTE DETAILS  =========================================== --}}


                                    <div class="form-body row">
                                        <form role="form"  name="changeStatus" id="changeStatus" method="POST" action="{{ route('change-quote-status')}}">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                            <input type="hidden" name="quote_id" id="quote_id" value="{{$quote->id}}">
                                            <input type="hidden" name="status" id="status" value="1">
                                            <button  id="accept"  class="btn btn-success btn-lg"

                                                     @if($quote->status != 0)
                                                        disabled
                                                     @endif

                                            >Accept</button>

                                            <button  id="reject"  class="btn btn-danger btn-lg"

                                                     @if($quote->status != 0)
                                                     disabled
                                                     @endif

                                            >Reject</button>


                                        </form>
                                    </div>
                                </div>
                                {{-- ================================================== UPLOAD COMPANY LOGO + COMPANY DETAILS ======================================== --}}

                                {{-- ================================================== INDUSTRY CERTIFICATION + CONTACT DETAILS ======================================================= --}}
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">

                                    <div class="form-body row">
                                        {{--==================================== CONTACT DETAILS ====================================--}}
                                        <div class="component-section wrap-contact-details">
                                            <div class="component-heading">
                                                <h3>Contact Details</h3>
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




                                                        @foreach($company->locations as $location)
                                                                    <p><i class="fa fa-home" aria-hidden="true"></i>{{ $location->name }}<br/>
                                                                {{ $location->street_address_1 }}<br/>
                                                                {{$location->states->name}}
                                                                    </p>
                                                        @endforeach



                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{--==================================== OPERATING LOCATIONS =================================--}}
                                    </div>

                                </div>
                                {{-- ================================================== INDUSTRY CERTIFICATION + CONTACT DETAILS ======================================================= --}}
                            </div>
                        </div>
                    </div>

                </div>

        @endif

        <!-- End of hirer profile -->

        </div>
        <!-- END CONTENT BODY -->

    </div>
    <!-- END CONTENT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('#accept').click(function(){
            $('#status').val('1');
            $('#changeStatus').submit();
        });

        $('#reject').click(function(){
            $('#status').val('2');
            $('#changeStatus').submit();
        });
    </script>
@endsection
