<?php

namespace Services\Company;


use App\Models\Company;
use App\Models\CompanyLocation;
use App\Models\CompanyProfile;
use App\Models\OperatingCategory;
use App\Models\Region;
use App\Models\CompanyLocationRegion;

class CompanyService
{
    /**
     * @var Company
     */
    private $company;
    /**
     * @var CompanyLocation
     */
    private $companyLocation;
    /**
     * @var CompanyProfile
     */
    private $companyProfile;

    private $region;

    private $companyLocationRegion;

    public function __construct(Company $company, CompanyLocation $companyLocation, CompanyProfile $companyProfile, Region $region, CompanyLocationRegion $companyLocationRegion)
    {
        $this->company = $company;
        $this->companyLocation = $companyLocation;
        $this->companyProfile = $companyProfile;
        $this->region = $region;
        $this->companyLocationRegion = $companyLocationRegion;
    }

    public function create($data, $tenant)
    {
        return $this->company->create(
            $this->attributes($data, $tenant)
        );
    }

    public function addLocationToCompany($data, $company_id, $type = "branch", $locationName = "HQ")
    {
        $allRegions = array();
        $reg = Region::where('states_id', $data['states_id'])->get();
        foreach($reg as $Reg){
            $allRegions[] = $Reg->id;
        }

        $data['location_name'] = $locationName;
        $data['type'] = $type;
        $data['company_id'] = $company_id;


        $companyLocation = $this->companyLocation->create(
            $this->locationAttributes($data)
        );

        if(!empty($data['select_all_regions'])){
            $regions = $allRegions;
        }else{
            if(is_array($data["regions_id"])){
                $regions = $data["regions_id"];
            }else{
                $regions = [$data["regions_id"]];
            }
        }


        foreach($regions as $key => $val){
            $this->companyLocationRegion->create(['company_location_id' => $companyLocation->id, 'region_id' => $val]);
        }
    }

    public function updateLocationToCompany($data, $company_id, $type = "branch", $locationName = "HQ")
    {
        $allRegions = array();
        $reg =  $this->region->where('states_id', $data['states_id'])->get();


        foreach($reg as $Reg){
            $allRegions[] = $Reg->id;
        }

        $data['location_name'] = $locationName;
        $data['type'] = $type;
        $data['company_id'] = $company_id;


        /* save to companyLocation table */
        $locationId = $data['id'];


        $companyLocation = $this->companyLocation->find($locationId);

         $companyLocation->street_address_1 = $data['street_address'];
         $companyLocation->street_address_2 =  $data['street_address'];
         $companyLocation->states_id =  $data['states_id'];

         $companyLocation->suburb = $data['suburb'];
         $companyLocation->post_code = $data['post_code'];
         $companyLocation->phone = $data['phone'];

         $companyLocation->email =  $data['email'];

         $companyLocation->company_id = $data['company_id'];
         $companyLocation->membership_id = $data['membership_id'];
         $companyLocation->type = $data["type"];



         $companyLocation->save();


        if(!empty($data['select_all_regions'])){
            $regions = $allRegions;
        }
        else{
            $regions = $data["regions_id"];
        }

        $this->companyLocationRegion->where('company_location_id',$companyLocation->id)->delete();

        /* save to companyLocationRegion table */
        foreach($regions as $key => $val){
            //$companyLocationRegion->save(['region_id' => $val]);
            $this->companyLocationRegion->create(['company_location_id' => $companyLocation->id,'region_id' => $val]);
        }
    }

    public function updateLocationCompany($data, $company_id){
        $companyLocation = $this->companyLocation->where('company_id',$company_id)->first();
        $companyLocation->street_address_1 = $data['street_address'];
        $companyLocation->street_address_2 =  $data['street_address'];
        $companyLocation->suburb = $data['suburb'];
        $companyLocation->post_code = $data['post_code'];
        $companyLocation->states_id =  $data['states_id'];
        $companyLocation->save();
        
        if(!empty($data["regions_id"])) {
            $this->companyLocationRegion->where('company_location_id', $companyLocation->id)->delete();
            $regions[] = $data["regions_id"];
            /* save to companyLocationRegion table */
            foreach ($regions as $key => $val) {
                $this->companyLocationRegion->create(['company_location_id' => $companyLocation->id, 'region_id' => $val]);
            }
        }
    }

    private function attributes($data, $tenant)
    {
        return [
            "name" => __get($data, "company_name"),
            "tenant_id" => $tenant->id,
        ];
    }

    private function locationAttributes($data)
    {
        return [
            "name" => $data["location_name"],
            "description" => __get($data, "description"),
            "street_address_1" => __get($data, "street_address"),
            "street_address_2" => __get($data, "street_address_2"),
            "states_id" => $data["states_id"],
           /* "regions_id" => $data["regions_id"],*/
            "suburb" => __get($data, "suburb"),
            "post_code" => __get($data, "post_code"),
            "phone" => __get($data, "phone"),
            "mobile" => __get($data, "mobile"),
            "email" => __get($data, "email"),
            "fax" => __get($data, "fax"),
            "company_id" => $data["company_id"],
            "membership_id" => __get($data, "membership_id"),
            "type" => $data["type"]
        ];
    }

    public function operationCategories()
    {
        return OperatingCategory::all()->toArray();
    }

    public function createProfile($attributes, $company_id)
    {
        $attributes['company_id'] = $company_id;

        return $this->companyProfile->updateOrCreate(
                            ['company_id' =>  $company_id],
                            $this->profileAttributes($attributes)
                        );
    }

    private function profileAttributes($data = null)
    {
        return [
            "name" => __get($data, 'company_profile'),
            "logo" => __get($data, "logo"),
            "phone_1" => __get($data, "phone1"),
            "phone_2" => __get($data, "phone2"),
            "email" => __get($data, "company_email"),
            "website" => __get($data, "company_website"),
            "projects" => __get($data, "projects"),
            "services" => __get($data, "services"),
            "about" => __get($data, "about"),
            "operating_category_id" => __get($data, "operating_category_id"),
            "company_id" => $data["company_id"],
            "operating_states" => json_encode(__get($data, "states_id")),
        ];
    }

    public function locationsBy($company_id)
    {
        return $this->companyLocation->with('states', 'region')
            ->where("company_id", $company_id)
            ->get();
    }

    public function companyLocations($companyId)
    {
        return $this->company->with(['locations'])->find($companyId);
    }

    public  function statesWithRegions($companyId)
    {
        $list = [];
        $locations = $this->companyLocation->with(['states', 'region'])
            ->where('company_id',$companyId)->get();

        $locations->each(function($location) use(&$list){
           // $list[$location->states->id]['name'] = $location->states->name;
           // $list[$location->states->id]['regions'][$location->region->id] = $location->region->name;
            $list[$location->states->id][$location->region->id] = $location->region->name;
        });

        return $list;
    }

    public function locationsStatesRegions($company_id)
    {
        return $this->companyLocation->select('states_id','regions_id')->with('states')
            ->where("company_id", $company_id)
            ->groupBy('states_id','regions_id')
            ->get();
    }

    public function regionsByStatesId($company_id, $states_id)
    {
        return $this->companyLocation->select('regions_id')
            ->where("company_id", $company_id)
            ->where("states_id", $states_id)
            ->groupBy('regions_id')
            ->get();
    }

    public function locationById($id)
    {
        $location =  $this->companyLocation->where("id", $id)->with('states')->first();
        return $location;
    }

    public function companyLocationsWithcompanyLocationRegion($id){
        $location =  $this->companyLocation->where("id", $id)->with('companyLocationRegion')->get();
        return $location;
    }

    public function companyLocationsWithcompanyLocationReg($id){
        $location =  $this->companyLocation->where("company_id", $id)->with('companyLocationRegion')->first();
        return $location;
    }

    public function findByTenant($tenantId)
    {
        return $this->company->where('tenant_id', $tenantId)->first();
    }


    public function editCompanyLocations($data){
        $id = $data['id'];
        $companyLocation = CompanyLocation::find($id);
        $companyLocation->name = $data['name'];
        $companyLocation->email = $data['email'];
        $companyLocation->phone = $data['phone'];
        $companyLocation->membership_id = $data['membership_id'];
        $companyLocation->street_address_1 = $data['street_address'];
        $companyLocation->suburb = $data['suburb'];
        $companyLocation->post_code = $data['post_code'];
        $companyLocation->states_id = $data['states_id'];
        $companyLocation->regions_id = $data['regions_id'];
        $companyLocation->save();
    }

    public function deleteLocation($id){
        $companyLocation = CompanyLocation::find($id);
        $companyLocation->delete();
    }

    public function getCompanySettings($tenantId){
        return $this->company->where('tenant_id', $tenantId)->first();
    }

    public function updateCompanySettings($id, $request){
        $company = $this->company->find($id);
        $company->name = $request['company_name'];
        $company->save();
    }
}