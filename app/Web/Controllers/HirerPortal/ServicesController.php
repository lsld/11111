<?php

namespace Web\Controllers\HirerPortal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Services\JobRequest\Constructor\ConstructorRequestService;
use Services\JobRequest\Constructor\ConstructorService;
use Web\Requests\PlantHireValidation;
use Illuminate\Support\Facades\Session;

class ServicesController
{
    protected $service;
    protected $service_request;

    public function __construct(ConstructorService $service,
                                ConstructorRequestService $service_request){

        $this->service = $service;
        $this->service_request = $service_request;
    }


    public function loadDynamicPropertiesWithOptions($id = null){

        if($id){

            $properties = $this->service->getDynamicProperties($id);
            $session = session::get('construct.item_table');
            $session_data = null;
            if(isset($session[$properties['id']])){
                $session_data =$session[$properties['id']];
            }

            return view('job_requests.services.item_form')->with(compact('session_data', 'properties', 'id'));
        }
        return null;

    }

    public function create()
    {
        $properties = $this->service->getPropertyList();
        return view('job_requests.services.create')->with(compact('properties'));
    }

    public function checkValidation(PlantHireValidation $request){

        return 'true';
    }

    public function store(PlantHireValidation $request)
    {
        $data=$request->all();

        $entity_id = 1;
        $entity_type = 'Hire';
        $user_id = Auth::user()->id;

        $this->service_request->storeConstructorRequestData( $entity_id, $entity_type, $user_id, $data);

        return redirect()->route('my-job-request')->with('message.success', 'Construction Request Created Successfully');
    }

    public function edit($id)
    {
        $properties = $this->service->getPropertyList();
        $service_data = $this->service_request->loadServiceRequest($id);

        if($service_data){
            $session_data = $this->service_request->createSessionData($service_data['plant_hire']);
            session::put('construct.item_table', $session_data);
            //dd($session_data);
            return view('job_requests.services.create')->with(compact('properties', 'id', 'service_data'));
        }else{
            return redirect()->route('my-job-request')->with('message.error', 'Invalid Information');
        }

    }

    public function update(PlantHireValidation $request, $id)
    {

        $data=$request->all();
        $this->service_request->updateRequest($id, $data);

        session::put('construct.item_table', null);
        Session::forget('construct');

        return redirect()->route('my-job-request')->with('message.success', 'Updated Successfully');

    }

    public function destroy($id)
    {
        $this->service_request->delete($id);
        return redirect()->route('my-job-request')->with('message.info', 'Job Request Removed');
    }
}
