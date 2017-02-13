<div class="form-body col-md-12 form-fileds-center" id="notification_desplay_section">
    <form action="{{route('admin.supplier.notification.update', $supplier_id)}}" class="form-horizontal" id="admin_supplier_notification_update" method="POST">
        {{ csrf_field() }}
        <div class="portlet light">
            <!-- BEGIN FORM-->
            <div class="form-body form-fileds-center">
                <div class="notification-table table-scrollable">

                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Categories</th>
                            <th>Operating States</th>
                            <th>Operating Regions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($service_list as $key=>$service_all)
                                @if($service_all->count())
                                    <tr>
                                        <td>
                                            {{$job_types->find($key)->name}}
                                            <input name="setting[{{$key}}][job_type_id]" value="{{$key}}" type="hidden">
                                            <input name="setting[{{$key}}][service_title]" value="{{$job_types->find($key)->name}}" type="hidden">
                                        </td>
                                        <td class="notification-section services">
                                            @php
                                                $select= '';
                                                $supp_serv_ids_list = $notifications->where('job_type_id', $key)->pluck('supp_serv_ids_list')->toArray();
                                                $supp_serv_ids_list_array = array();
                                                if(isset($supp_serv_ids_list[0])){
                                                    $supp_serv_ids_list_array = $supp_serv_ids_list[0];
                                                }
                                            @endphp

                                            @foreach($service_all as $services)
                                                @php
                                                    $service_label = null;
                                                    switch ($key){
                                                        case 1:
                                                        case 2:
                                                            $service_label = $services->mainCategory->label;
                                                            break;
                                                        case 3:
                                                        case 4:
                                                            $service_label = $services->mainCategory->name;
                                                            break;
                                                    }

                                                    $select = '';
                                                    if(in_array($services->main_category, $supp_serv_ids_list_array)){
                                                        $select = 'select-category';
                                                    }
                                                @endphp

                                                <div class="wrap-checkbox service {{$select}}">
                                                    <div class="mt-checkbox-list" data-error-container="#form_2_services_error">
                                                        <label class="mt-checkbox">
                                                            <input @if($select)
                                                                        checked="checked"
                                                                   @endif
                                                                   type="checkbox"
                                                                   value="{{$services->main_category}}"
                                                                   name="setting[{{$key}}][supp_serv_ids][]" > {{$service_label}}
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </td>
                                        <td class="notification-section states">

                                            @foreach($location_list->locations as $location)
                                                @php
                                                    $state_select = '';
                                                    $states_ids_list = $notifications->where('job_type_id', $key)->pluck('states_ids_list')->toArray();
                                                    $states_ids_list_array = array();
                                                    if(isset($states_ids_list[0])){
                                                        $states_ids_list_array = $states_ids_list[0];
                                                    }

                                                    if(in_array($location->states_id, $states_ids_list_array)){
                                                        $state_select = 'select-state-'.$location->states_id;
                                                    }
                                                @endphp

                                                <div class="wrap-checkbox {{$state_select}}">
                                                    <div class="mt-checkbox-list" data-error-container="#form_2_services_error">
                                                        <label class="mt-checkbox">
                                                            <input  type="checkbox"
                                                                    @if($state_select)
                                                                    checked="checked"
                                                                    @endif

                                                                    jobtype="{{str_replace(' ', '', $job_types->find($key)->name )}}"
                                                                    name="setting[{{$key}}][states_ids][]"
                                                                    value="{{$location->states_id}}"
                                                                    class="btn-{{$location->states_id}}" state="state-{{$location->states_id}}">
                                                            {{$location->states->name}}
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($location_list->locations as $location)
                                                <div class="wrap-regions-in-state">
                                                    <div class="regions-in-state state-{{$location->states_id}}-regions-{{str_replace(' ', '', $job_types->find($key)->name )}}">
                                                        <div class="notification-section">
                                                            @foreach($location->companyLocationRegion as $region)
                                                                @php
                                                                    $region_select = '';
                                                                    $regions_ids_list = $notifications->where('job_type_id', $key)->pluck('regions_ids_list')->toArray();
                                                                    $regions_ids_list_array = array();
                                                                    if(isset($regions_ids_list[0])){
                                                                        $regions_ids_list_array = $regions_ids_list[0];
                                                                    }

                                                                    if(in_array($region->region_id, $regions_ids_list_array)){
                                                                        $region_select = 'select-region-of-state-'.$location->states_id;
                                                                    }
                                                                @endphp

                                                                <div class="wrap-checkbox {{$region_select}}">
                                                                    <div class="mt-checkbox-list" data-error-container="#form_2_services_error">
                                                                        <label class="mt-checkbox">
                                                                            <input type="checkbox"
                                                                                   @if($region_select)
                                                                                   checked="checked"
                                                                                   @endif
                                                                                   name="setting[{{$key}}][regions_ids][]"
                                                                                   state="region-of-state-{{$location->states_id}}"
                                                                                   value="{{$region->region_id}}">
                                                                            {{$region->region->name}}
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="admin-notification-button-area">
                <span onclick="update_notifications();" id="notification-update" class="btn theme-btn">Update Notification Settings</span>
            </div>
        </div>
    </form>
    <div id="validation_message_area" style="display: none;"></div>
</div>



