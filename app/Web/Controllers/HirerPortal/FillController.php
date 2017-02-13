<?php

namespace Web\Controllers\HirerPortal;

use Illuminate\Http\Request;
use App\Models\FillType;
use Illuminate\Support\Facades\Auth;
use Services\JobRequest\Fill\FillRequestService;
use Web\Requests\FillValidation;

class FillController
{

    protected $fillType;
    protected $service_request;

    public function __construct(FillType $fillType,
                                FillRequestService $service_request){

        $this->fillType = $fillType;
        $this->service_request = $service_request;
    }

    public function create()
    {
        $fill_type = $this->fillType->all();

        return view('job_requests.fill_type.create')->with(compact('fill_type'));
    }

    public function checkValidation(FillValidation $request){


        return 'true';

    }

    public function store(FillValidation $request)
    {
        $data=$request->all();

        $entity_id = 1;
        $entity_type = 'Hire';
        $user_id = Auth::user()->id;

        $this->service_request->storeFillRequestData($entity_id, $entity_type, $user_id, $data);

        return redirect()->route('my-job-request')->with('message.success', 'Fill Request Created Successfully');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $fill_data =  $this->service_request->getFillRequestData($id);
        $fill_type = $this->fillType->all();
            //dd($fill_data);

        if($fill_data){
            return view('job_requests.fill_type.create')->with(compact('fill_type', 'fill_data', 'id'));
        }else{
            return redirect()->route('my-job-request')->with('message.error', 'Invalid Information');
        }

    }

    public function update(FillValidation $request, $id)
    {
        $data=$request->all();

        $this->service_request->updateFillRequestData($id, $data);

        return redirect()->route('my-job-request')->with('message.success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $this->service_request->delete($id);
        return redirect()->route('my-job-request')->with('message.info', 'Job Request Removed');
    }
}
