<?php

namespace Services\Company;


use App\Models\Company;
use App\Models\CompanyDocument;
use App\Models\CompanyProfile;
use App\Models\ProfileGallery;
use App\Models\IndustryCertification;
use Exception;
use Services\FileService;

class CompanyProfileService
{
    protected $imageLimit = 20;


    /**
     * @var Company
     */
    private $company;
    /**
     * @var CompanyProfile
     */
    private $companyProfile;
    /**
     * @var FileService
     */
    private $file;
    /**
     * @var ProfileGallery
     */
    private $gallery;
    /**
     * @var CompanyDocument
     */
    private $document;
    private $industryCertification;

    public function __construct(Company $company,
                                CompanyProfile $companyProfile,
                                FileService $file,
                                ProfileGallery $gallery,
                                CompanyDocument $document,
                                IndustryCertification $industryCertification
    )
    {

        $this->company = $company;
        $this->companyProfile = $companyProfile;
        $this->file = $file;
        $this->gallery = $gallery;
        $this->document = $document;
        $this->industryCertification = $industryCertification;
    }

    public function findByTenant($tenant_id)
    {
        return $this->company->with(['profile' => function ($q) {
            return $q->with('gallery','operating', 'industryCertification');
        }, 'locations' => function ($q) {
            return $q->with('states', 'region');
        }, 'documents','tenant'])->where('tenant_id', $tenant_id)
            ->first();
    }

    public function updateServiceCategory($content){

        $profile = $this->getProfile();
        $profile->operating_category_id = null;
        if($content){
            $profile->operating_category_id = $content;
        }
        $profile->save();
    }

    public function updateAbout($content)
    {
        $profile = $this->getProfile();
        $profile->about = $content;
        $profile->save();
    }

    public function updateService($content)
    {
        $profile = $this->getProfile();

        $profile->services = $content;
        $profile->save();
    }

    public function updateProjects($content)
    {
        $profile = $this->getProfile();
        $profile->projects = $content;
        $profile->save();
    }

    public function updateContactDetails($content)
    {
        $profile = $this->getProfile();
        $profile->email = $content['email'];
        $profile->phone_1 = $content['phone_1'];
        $profile->phone_2 = $content['phone_2'];
        $profile->website = $content['website'];
        $profile->save();
    }

    public function addImage($image)
    {
        $this->validateAssetCount("gallery", $this->gallery->limit);
        list($url, $name) = $this->file->upload($image, $this->gallery->path);
        $profile_id = $this->getProfile()->id;
        $image = $this->gallery->create(compact('profile_id', 'name', 'url'));
        return $image->url;
    }

    public function addDocument($doc)
    {
        $this->validateAssetCount("documents", $this->document->limit);
        list($url, $name, $size) = $this->file->upload($doc, $this->document->path);
        $company_id = $this->getCompany()->id;
        $image = $this->document->create(compact('company_id', 'name', 'url', 'size'));
        return $image->url;
    }

    public function deleteImage($imageId)
    {
        $image = $this->gallery->find($imageId);
        $path = public_path($image->url);
        $this->file->delete($path);
        $image->delete();
        return;
    }

    public function deleteDocument($documentId)
    {
        $doc = $this->document->find($documentId);
        $path = public_path($doc->url);
        $this->file->delete($path);
        $doc->delete();
        return;
    }

    public function changeLogo($logo)
    {
        $profile = $this->getProfile();
        $logoPath = $this->companyProfile->logoPath;
        $path = public_path($profile->logo);

        //Delete existing logo
        if (is_file($path)) {
            $this->file->delete($path);
        }

        list($url, $name) = $this->file->upload($logo, $logoPath);
        $profile->logo = $url;
        $profile->save();

        return;
    }

    public function deleteIndustryCertification($id){

        $industry_certificate = $this->industryCertification->find($id);
        $logoPath = $this->industryCertification->logoPath;

        $path = public_path($industry_certificate->path);
        $this->file->delete($path);

        $industry_certificate->delete();

        return;
    }

    public function manageIndustryCertification($image , $num=1){

        $IndustryCertification = $this->getIndustryCertification();
        $logoPath = $this->industryCertification->logoPath;

        $profile = $this->getProfile();
        $profile_id = $profile->id;

        $current_id = 0;

        foreach($IndustryCertification as $ind_cer){
            if($ind_cer->num==$num){
                $current_id = $ind_cer->id;
                $path = public_path($ind_cer->path);
                $this->file->delete($path);
            }
        }

        list($url, $name) = $this->file->upload($image, $logoPath);

        if($profile_id){
            if($current_id){

                $current_certificate        =   $this->industryCertification->find($current_id);
                $current_certificate->path  =   $url;
                $current_certificate->save();
            }else{
                $new_certificate            =   new $this->industryCertification;
                $new_certificate->profile_id=   $profile_id;
                $new_certificate->num       =   $num;
                $new_certificate->path      =   $url;
                $new_certificate->save();
            }
        }
        return;
    }

    private function getIndustryCertification()
    {
        $company = $this->company->with(['profile' => function ($q) {
            return $q->with('industryCertification');
        }])->where('tenant_id', tenant())
            ->first();

        return $company->profile->industryCertification;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    private function getProfile()
    {
        $company = $this->company->with('profile')->where('tenant_id', tenant())
            ->first();
        return $company->profile;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    private function getCompany()
    {
        $company = $this->company->where('tenant_id', tenant())
            ->first();
        return $company;
    }

    private function validateAssetCount($type = "gallery", $limit = 5)
    {
        if ($type == "gallery") {
           $asset = $this->getGalleries();
        }

        if ($type == "documents") {
           $asset = $this->getDocuments();
        }

        if ($asset->count() > $limit) {
            throw new Exception("Asset limit exceeded", 426);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    private function getGalleries()
    {
        $company = $this->company->with(['profile' => function ($q) {
            return $q->with('gallery');
        }])->where('tenant_id', tenant())
            ->first();

        return $company->profile->gallery;
    }

    private function getDocuments()
    {
        $company = $this->company->with('documents')->where('tenant_id', tenant())
            ->first();

        return $company->documents;
    }


}