@extends('layouts.master-admin')

@section('content')
<div class="page-content-wrapper portal">
    <div class="page-content">
    {{-- ===========================    BREADCRUMB  =========================== --}}

        @include('partials.page_breadcrumb')

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
                                <a onclick="admin_add_locations();" data-toggle="modal" href="#location" class="btn theme-btn">Add Location</a>
                            </div>

                             <div class="form-group clearfix">
                                 <input id="submit_url" name="submit_url" value="" type="hidden">
                                <div class="table-scrollable" id="supplier_location_list">
                                    @include('admin.supplier.location_list', ['location_list' => $location_list])
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

                                    @include('admin.supplier.plant_hire_service', ['plant_hire_list' => $service_list[1] ])
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
                                    @include('admin.supplier.contracting_service', ['contracting_list' => $service_list[2] ])

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
                                    @include('admin.supplier.material_service', ['material_list' => $service_list[3] ])

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
                                    @include('admin.supplier.fill_service', ['fill_list' => $service_list[4] ])

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
                          <button class="btn notification-reload" onclick="reload_notification_list();"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reload notification table</button>
                          @include('admin.supplier.notifications', ['service_list' => $service_list, 'job_types' => $job_types, 'location_list' => $location_list, 'notifications' => $notifications ])
                      </div>
                    </div>
                    {{-- ===========    ACCORDION ITEM   ============ --}}

                    {{-- ===========    ACCORDION ITEM   ============ --}}
                    <div class="accordion-item">
                        <h3 class="accordion-item-header clearfix">Profile <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></h3>
                        <div class="accordion-item-body">
                            <p>Lorem ipsum dolor sit amet, consectetur.</p>

                            @include('admin.supplier.profile')

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



<div class="modal fade admin-theme-modal" id="location" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <form role="form" action="" name="admin_supplier_location" id="admin_supplier_location" method="POST" class="form-horizontal">
                <input type="hidden" id="_token" name="_token" value="{!! csrf_token() !!}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="main-title">Add Location</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        <label class=" col-md-4 control-label">State<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-8 {{ $errors->has('states_id')||$errors->has('locations')?'has-error':'' }}">

                            <?php
                            $state_id = null;
                            if(isset($fill_data['states_id'])){
                                $state_id = $fill_data['states_id'];
                            }
                            ?>
                            @include('dynamic.state_drop_down', [ 'states'=> $states, 'selected_val' => old('states_id', $state_id), 'name' => 'states_id' ])


                            @if($errors->has('states_id'))
                                <span class="help-block has-error"> {{ $errors->first('states_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class=" " id="rest_properties_form">

                        <input type="hidden" id="regions_load_url" value="{{route('getRegionsByStateId')}}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Region<span class="required" aria-required="true"> * </span></label>
                            <div class="col-md-8 {{ $errors->has('regions_id')||$errors->has('locations')?'has-error':'' }}" id="regions-sec">

                                <select  name="regions_id[]" id="regions_id" class="form-control select2-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                </select>
                                @if($errors->has('regions_id'))
                                    <span class="help-block has-error"> {{ $errors->first('regions_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" col-md-4 control-label"></label>
                            <div class="col-md-8">
                                <p>All</p>
                                <label class="mt-checkbox">
                                    <input type="checkbox"  class="form-control" name="select_all_regions" id="select_all_regions" value="1">
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        @include('components.component-my-account-location')

                    </div>
                </div>
                <div class="modal-footer">

                    <span id="admin_supplier_location_validation_message_area" class="help-block has-error" style="display: none; "></span>
                    <button type="button" id="admin_supplier_location_cancel" class="btn dark btn-outline" data-dismiss="modal">Close
                    </button>
                    <button type="button" onclick="formSaveAjax();" name="send" id="send" class="btn theme-btn">Save</button>

                    <button type="submit" name="sendCnt" id="sendCnt" class="btn theme-btn" onclick="return modalFormValidationAndSaveAndCnt('supplier_location', '{{route('supplier_location')}}');">Save & Continue</button>
                </div>
            </form>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade admin-theme-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body"><div class="te"></div></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section('scripts')
    <script src="/assets/pages/scripts/supplier-services-validations.js" type="text/javascript"></script>


    <script type="text/javascript">


        $(document).ready(function()
        {
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });
        });

        $(document).ready(function()
        {
            $( "#loc-close" ).click(function() {
                location.reload();
            });
        });

        function admin_add_locations() {

            $('#main-title').html('Add Location');

            $('#rest_properties_form').show();
            $('#states_id').val('');
            $('#regions_id').attr("selected", false);
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#membership_id').val('');
            $('#street_address').val('');
            $('#suburb').val('');
            $('#post_code').val('');

            $('#sendCnt').hide();
            $('#submit_url').val('{{route("admin.supplier.store.location",[$supplier_id])}}');
            $('#admin_supplier_location_validation_message_area').hide();
        }

        function formSaveAjax() {

            var formId = 'admin_supplier_location';
            var url = $('#submit_url').val();

            $('#'+formId+'_validation_message_area').html('Please wait...').show();
            $('button[type=submit]').prop("disabled", true);

            var return_val = false;

            $.ajax({
                type : 'POST',
                dataType: 'json',
                url : url,
                data : $('#'+formId).serialize(),
                success:function(result){

                    $('#'+formId+'_validation_message_area').html('Successfully Inserted.');

                    $('.modal').modal('hide');
                    loadLocationList();

                    return_val = true;

                },
                error: function(result) {

                    $("#response").html(result);

                    var data = result.responseJSON;
                    setErrorMessageToFields(data);

                    $('button[type=submit]').prop("disabled", false);
                    $('#'+formId+'_validation_message_area').hide();

                    return_val = false;
                }
            });
            return return_val;

        }

        function supplier_location_edit( formId, url, id) {

            $('#main-title').html('Edit Location');

            $('#rest_properties_form').hide();
            $('#states_id').val('');
            $('#regions_id').attr("selected", false);
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#membership_id').val('');
            $('#street_address').val('');
            $('#suburb').val('');
            $('#post_code').val('');

            $('#sendCnt').hide();
            $('#submit_url').val('{{route("admin.supplier.update.location",[$supplier_id])}}/'+id);
            $('#admin_supplier_location_validation_message_area').hide();

            $.get(url, function(data, status){
                $('#states_id').val(data.states_id);
                $.ajax({
                    type:'GET',
                    url: $('#regions_load_url').val()+'/'+data.states_id,
                    data:'state_id='+data.states_id,
                    success:function(html){
                        $('#regions_id').html(html);
                    }
                });

                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $('#street_address').val(data.street_address_1);
                if(data.membership_id){
                    $('#test').prop('checked', true);
                }
                $('#membership_id').val(data.membership_id);
                $('#suburb').val(data.suburb);
                $('#post_code').val(data.post_code);

                $.each(data.company_location_region, function(i, field){
                    var re_id= field.region_id;
                    console.log(re_id);
                    $("#regions_id option[value="+re_id+"]").attr("selected", 1);
                });

                $('#rest_properties_form').show();
            });
        }

        function loadLocationList(){

            var url = '{{route("admin.supplier.store.location.list",[$supplier_id])}}';
            $('#supplier_location_list').html('Loading...');

            $('#supplier_location_list').load(url);

        }

        function delete_location(url){
            if(confirm('Are you sure you want to delete?')){
                $.ajax({
                    type:'GET',
                    url: url,
                    success:function(html){
                        loadLocationList();
                    }
                });
            }
        }

        function update_notifications() {

            var url = '{{route('admin.supplier.notification.update', $supplier_id)}}';

            $('#validation_message_area').html('Please wait...');
            $('#notification-update').prop("disabled", true);

            $.ajax({
                type : 'POST',
                dataType: 'json',
                url : url,
                data : $('#admin_supplier_notification_update').serialize(),
                success:function(result){

                    reload_notification_list();

                },
                error: function(result) {

                    $('#notification-update').prop("disabled", false);
                    $('#validation_message_area').html('Update error.');

                }
            });
            $('#validation_message_area').hide();
        }

        function reload_notification_list() {

            $('#notification_desplay_section').html('Loading...');
            $('#notification_desplay_section').load('{{route('admin.supplier.notification.list', $supplier_id)}}');
        }

    </script>
    <script src="/assets/pages/scripts/company-profile-validations.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function(){
            $("#logo_link").click(function (){
                $('#logo').click();
            });

            $('#logo').change(function (){
                $("#logo_form").submit();
            });


            $("#industry_certification_1").click(function (){
                $('#logo_form_1').click();
            });

            $('#logo_form_1').change(function (){
                $("#industry_certification_form_1").submit();
            });

            $("#industry_certification_2").click(function (){
                $('#logo_form_2').click();
            });

            $('#logo_form_2').change(function (){
                $("#industry_certification_form_2").submit();
            });

            $("#industry_certification_3").click(function (){
                $('#logo_form_3').click();
            });

            $('#logo_form_3').change(function (){
                $("#industry_certification_form_3").submit();
            });

            $("#industry_certification_4").click(function (){
                $('#logo_form_4').click();
            });

            $('#logo_form_4').change(function (){
                $("#industry_certification_form_4").submit();
            });


            var gallerydz = new Dropzone('#gallery-dropzone',{
                acceptedFiles: "image/*",
                maxFilesize: 2
            });

            gallerydz.on('complete', function (file) {
                if (file.accepted==true && file.xhr.status == 200) {
                    window.location=location.href.split(/\?|#/)[0]+"/#gallery";
                } else {
                    /*alert(JSON.parse(file.xhr.response).error);*/
                    $('#testm').modal('show');
                    $('#testm').find('p').text(JSON.parse(file.xhr.response).error);

                }
            });

            var documentdz = new Dropzone('#document-dropzone',{
                acceptedFiles: "application/pdf",
                maxFilesize: 5
            });

            documentdz.on('complete', function (file) {
                console.log(file);
                if (file.accepted==true && file.xhr.status == 200) {
                    window.location=location.href.split(/\?|#/)[0]+"/#docs";
                } else {
                    alert(JSON.parse(file.xhr.response).error);

                }
            });

        });

    </script>

@endsection

