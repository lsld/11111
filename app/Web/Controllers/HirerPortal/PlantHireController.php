<?php

namespace Web\Controllers\HirerPortal;

use Illuminate\Http\Request;

use App\Models\PlantHire\PlantHireProperty;
use App\Constants\DurationList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Services\JobRequest\PlantHire\PlantHireRequestService;
use Services\JobRequest\PlantHire\PlantHireService;
use Web\Requests\PlantHireValidation;

class PlantHireController
{
    protected $service;
    protected $service_request;

    public function __construct(PlantHireService $service, PlantHireRequestService $service_request){

        $this->service = $service;
        $this->service_request = $service_request;
    }

    public function lists(){

        echo '<br>------------------------<br>';
        dd(PlantHireProperty::with(['properties' => function ($q) {
            return $q->with('options');
        }])->find(2)->toArray());


    }

    public function create()
    {
        session::put('plant_hire.item_table', null);
        $properties = $this->service->getPropertyList();
        
        return view('job_requests.plant-hire.create')->with(compact('properties'));

    }

    public function requestItemTable(){

        $item_table = session::get('plant_hire.item_table');
        $item_data = $this->service->generateItemTable($item_table);

        return view('job_requests.plant-hire.request_item')->with(compact('item_data'));
    }

    public function storeItemData(Request $request)
    {
        $data=$request->all();
        $item_table = session::get('plant_hire.item_table');
        $item_table[$data['property_id']] = $data['d_property'];
        session::put('plant_hire.item_table', $item_table);

        return 1;
    }

    public function removeItemData($id){
        $item_table = session::get('plant_hire.item_table');
        $item_table[$id] = null;
        session::put('plant_hire.item_table', $item_table);

        return 1;
    }


    public function loadDynamicPropertiesWithOptions($id = null){

        if($id){

            $item_table = session::get('plant_hire.item_table');
            $data = null;

            if(isset($item_table[$id])){
               $data = $item_table[$id];
            }

            $properties = $this->service->getDynamicProperties($id);
            $session_data = $data;

            return view('job_requests.plant-hire.item_form')->with(compact('session_data', 'properties'));
        }
        return null;

    }

    public function checkValidation(PlantHireValidation $request){

        return 'true';
    }
    
    public function store(PlantHireValidation $request)
    {
        $data=$request->all();
        $item_table = session::get('plant_hire.item_table');

        $entity_id = 1;
        $entity_type = 'Hire';
        $user_id = Auth::user()->id;

        $this->service_request->storePlantHireData( $entity_id, $entity_type, $user_id, $data, $item_table);

        session::put('plant_hire.item_table', null);
        Session::forget('plant_hire');

        return redirect()->route('my-job-request')->with('message.success', 'Plant Hire Request Created Successfully');

    }

    public function edit($id)
    {
        session::put('plant_hire.item_table', null);
        $plant_hire_data = $this->service_request->loadPlantHireRequest($id);

        if($plant_hire_data){
            $properties = $this->service->getPropertyList();
            $item_table = $this->service_request->generateSessionData($plant_hire_data);
            session::put('plant_hire.item_table', $item_table);

            $item_data = $this->service->generateItemTable($item_table);

            return view('job_requests.plant-hire.create')->with(compact('properties', 'plant_hire_data', 'id', 'item_data'));
        }else{
            return redirect()->route('my-job-request')->with('message.error', 'Invalid Information');
        }

    }

    public function update(PlantHireValidation $request, $id)
    {
        $data=$request->all();
        $item_table = session::get('plant_hire.item_table');

        $plant_hire_data = $this->service_request->loadPlantHireRequest($id);
        $properties = $this->service->getPropertyList();

        $this->service_request->updateRequest($id, $data, $item_table);

        session::put('plant_hire.item_table', null);
        Session::forget('plant_hire');

        return redirect()->route('my-job-request')->with('message.success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $this->service_request->delete($id);
        return redirect()->route('my-job-request')->with('message.info', 'Job Request Removed');
    }
}
