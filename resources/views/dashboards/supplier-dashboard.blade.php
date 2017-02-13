@extends('layouts.master')

@section('content')
    <!-- =============================================== BEGIN CONTENT =============================================== -->
    <div class="page-content-wrapper portal page-dashboard">
        <!-- =========================================== BEGIN CONTENT BODY ========================================== -->
        <div class="page-content">

            <!-- ======================================= BREADCRUMB ================================================== -->

        @include('partials.page_breadcrumb')

            <!-- ======================================= HEADING ===================================================== -->

            <!-- ======================================= MID CONTENTS ================================================ -->
            <div class="wrap-ccf-form">
                <!-- =================================== FORM ======================================================== -->
                <div class="portlet light bordered">

                    <!-- =============================== PORTAL PAGE TITLE ============================================-->
                    <!--      <div class="wrap-ccf-page-title">
                             <h1 class="ccf-page-title">Dashboard - Admin</h1>
                             <p>Welcome to CCF Supplier Portal, <i>David Hasketh</i></p>
                         </div> -->
                    <!-- =============================== PORTAL PAGE TITLE ============================================-->

                    <!-- =============================== PORTAL PAGE PORTLET BODY =====================================-->
                    <div class="portlet-body form">
                        <!-- =========================== PORTAL PAGE PORTLET FORM BODY ================================-->
                        <div class="form-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">


                                        <div class="dashboard-stat-ccf-v1">
                                            {{--<h1>My Request</h1>--}}
                                            <p class="counter-value"><span data-counter="counterup"
                                                                           data-value="{{$counts['new_jobs']}}">--</span>
                                            </p>
                                            <p>Pending Request(s)</p>
                                            <a href="{{ route('job-request')}}"
                                               class="btn theme-btn {{ isActiveRoute('job-request') }}">
                                                View My Request</a>
                                        </div>

                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat-ccf-v1">
                                            {{--<h1>My Request</h1>--}}
                                            <p class="counter-value"><span data-counter="counterup"
                                                                           data-value="{{$counts['quoted_jobs']}}">--</span>
                                            </p>
                                            <p>Pending Quote(s)</p>
                                            <a href="{{ route('supplier_quotes', uid(tenant())) }}"
                                               class="btn theme-btn {{ isActiveRoute('supplier_quotes') }}">
                                                View My Quotes</a>
                                        </div>

                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat-ccf-v1 tot-request jelly-bean">
                                            <p class="counter-value"><span data-counter="counterup"
                                                                           data-value="{{$counts['total']}}">--</span>
                                            </p>
                                            <p>Total Request(s)</p>
                                            <p class="bottom-date">{{date('Y-m-d')}}</p>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- =========================== PORTAL PAGE PORTLET FORM BODY ================================-->
                    </div>
                    <!-- =============================== PORTAL PAGE PORTLET BODY =====================================-->

                </div>
                <!-- =================================== FORM ======================================================== -->

                <!-- =============================================== MAP   =============================================== -->
                <div id="supplier-dashboard"></div>
                <!-- =============================================== END OF MAP   =============================================== -->


            </div>


            <!-- ======================================= MID CONTENTS ================================================ -->


        </div>
        <!-- =========================================== END CONTENT BODY   ========================================== -->
    </div>
    <!-- =============================================== END CONTENT   =============================================== -->
    <style>
        #supplier-dashboard {
            width: 100%;
            height: 400px;
            background-color: grey;
        }
    </style>
    <script>
        function initSupplierDashboard() {

            var bounds = new google.maps.LatLngBounds();
            var infowindow = new google.maps.InfoWindow();
            var locations = <?php echo $coordinates; ?>;

            var map = new google.maps.Map(document.getElementById('supplier-dashboard'), {
                zoom: 4,
                center: new google.maps.LatLng(-25.363, 131.044),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });


            if (locations.length > 0) {
                var marker, i;
                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map
                    });

                    bounds.extend(marker.position);

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }

                //now fit the map to the newly inclusive bounds
                map.fitBounds(bounds);
                map.panToBounds(bounds);
            }

        }

    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>


    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initSupplierDashboard">
    </script>
@endsection