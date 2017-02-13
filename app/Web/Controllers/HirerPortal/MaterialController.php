<?php

namespace Web\Controllers\HirerPortal;

use Illuminate\Http\Request;
use App\Models\MaterialType;
use Illuminate\Support\Facades\Auth;
use Services\JobRequest\Material\MaterialRequestService;
use Web\Requests\MaterialValidation;

class MaterialController
{

    protected $materialType;
    protected $service_request;

    public function __construct(MaterialType $materialType,
                                MaterialRequestService $service_request){

        $this->materialType = $materialType;
        $this->service_request = $service_request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $material_type = $this->materialType->all();
        return view('job_requests.material.create')->with(compact( 'material_type'));
    }

    public function checkValidation(MaterialValidation $request){

        return 'true';
    }
    
    public function store(MaterialValidation $request)
    {
        $data=$request->all();

        $entity_id = 1;
        $entity_type = 'Hire';
        $user_id = Auth::user()->id;

        $this->service_request->storeMaterialRequestData($entity_id, $entity_type, $user_id, $data);

        return redirect()->route('my-job-request')->with('message.success', 'Material Request Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material_data = $this->service_request->getMaterialRequestData($id);
        ///dd($material_data);

        if($material_data){
            $material_type = $this->materialType->all();
            return view('job_requests.material.create')->with(compact('material_data', 'id', 'material_type'));
        }else{
            return redirect()->route('my-job-request')->with('message.error', 'Invalid Information');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaterialValidation $request, $id)
    {
        $data=$request->all();

        $entity_id = 1;
        $entity_type = 'Hire';
        $user_id = Auth::user()->id;

        $this->service_request->updateMaterialRequestData($id, $data);

        return redirect()->route('my-job-request')->with('message.success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service_request->delete($id);
        return redirect()->route('my-job-request')->with('message.info', 'Job Request Removed');
    }
}
