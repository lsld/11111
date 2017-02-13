<?php
namespace Services\JobRequest\Fill;

use App\Constants\JobRequestStatus;
use App\Events\AddingHirerJob;
use App\Models\Fill\FillRequestRestData;
use App\Models\JobRequests;
use Services\JobRequest\JobRequestManageService;
use Services\Matching\MatchingService;

class FillRequestService
{

    protected $jobRequests;
    protected $jobRequestManageService;
    protected $job_type_id = 4;
    protected $fillRequestRestData;

    public function __construct(
        JobRequests $jobRequests,
        JobRequestManageService $jobRequestManageService,
        FillRequestRestData $fillRequestRestData,
        MatchingService $matchingService
    ) {

        $this->jobRequests = $jobRequests;
        $this->jobRequestManageService = $jobRequestManageService;
        $this->fillRequestRestData = $fillRequestRestData;
        $this->matchingService = $matchingService;
    }

    public function getFillRequestData($id)
    {

        return $this->jobRequests->with(['fillRestData'])->find($id)->toArray();
    }

    public function delete($id)
    {

        return $this->jobRequests->find($id)->delete();
    }

    public function updateFillRequestData($id, $data)
    {

        $current_data = $this->getFillRequestData($id);

        $expires_in = date('Y-m-d', strtotime($data['expiry_date']));
        $required_date = date('Y-m-d', strtotime($data['required_date']));

        $jobRequests_ob = $this->jobRequests->find($id);
        $jobRequests_ob->street_address = $data['street_address'];
        $jobRequests_ob->suburb = $data['suburb'];
        $jobRequests_ob->post_code = $data['post_code'];
        $jobRequests_ob->duration = $data['duration'];
        $jobRequests_ob->state_id = $data['state_id'];
        $jobRequests_ob->regions_id = $data['regions_id'];
        $jobRequests_ob->description = $data['description'];
        $jobRequests_ob->expiry_date = $expires_in;

        $jobRequests_ob->save();


        $rest_data = $this->fillRequestRestData->find($current_data['fill_rest_data']['id']);
        $rest_data->required_date = $required_date;
        $rest_data->quantity = $data['quantity'];
        $rest_data->number_of_sites = $data['number_of_sites'];
        $rest_data->fill_type = $data['fill_type'];
        $rest_data->can_load_and_carry = $data['can_load_and_carry'];

        $distance = 0;
        if (isset($data['distance'])) {
            if ($data['distance']) {
                $distance = $data['distance'];
            }
        }


        $rest_data->distance = $distance;
        $rest_data->fill_quality = $data['fill_quality'];

        $rest_data->save();

        return true;

    }

    public function storeFillRequestData($entity_id, $entity_type, $user_id, $data)
    {

        $expires_in = date('Y-m-d', strtotime($data['expiry_date']));
        $required_date = date('Y-m-d', strtotime($data['required_date']));

        $request = $this->jobRequests->create([
            'entity_id' => $entity_id,
            'entity_type' => $entity_type,
            'street_address' => $data['street_address'],
            'suburb' => $data['suburb'],
            'post_code' => $data['post_code'],
            'duration' => $data['duration'],
            'state_id' => $data['state_id'],
            'regions_id' => $data['regions_id'],
            'description' => $data['description'],
            'expiry_date' => $expires_in,
            'user_id' => $user_id,

            'job_type_id' => $this->job_type_id,
            'required_date' => date('Y-m-d'),
            'status' => JobRequestStatus::PENDING,
        ]);


        $distance = 0;
        if (isset($data['distance'])) {
            if ($data['distance']) {
                $distance = $data['distance'];
            }
        }

        $request->fillRestData()->save(new FillRequestRestData([
            'required_date' => $required_date,
            'quantity' => $data['quantity'],
            'number_of_sites' => $data['number_of_sites'],
            'fill_type' => $data['fill_type'],
            'can_load_and_carry' => $data['can_load_and_carry'],
            'distance' => $distance,
            'fill_quality' => $data['fill_quality']
        ]));

        $this->matchingService->sendNotificationsToSupplier($request->id);
        event(new AddingHirerJob($request));
        return $request->id;
    }
}
