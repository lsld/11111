<?php

namespace Web\Controllers;


use App\Models\IndustryCertification;
use Illuminate\Http\Request;
use Services\Company\CompanyProfileService;
use Services\Company\CompanyService;
use Web\Requests\LogoUploadRequest;

class CompanyProfileController
{

    /**
     * @var CompanyService
     */
    private $profile;
    private $certificate;

    public function __construct(CompanyProfileService $profile, IndustryCertification $certificate)
    {
        $this->profile = $profile;
        $this->certificate = $certificate;
    }


    public function show($tenant_id)
    {
        $company = $this->profile->findByTenant($tenant_id);
        $ImagePath = $this->certificate->getImagePath();

        return view('pages.company-profile')
                ->with(compact('company','ImagePath'));
    }

    public function updateServiceCategory(Request $request){

        $this->profile->updateServiceCategory($request->get('operating_category_id'));
        return redirect()->back()
            ->with('status', 'Service Category successfully updated!');
    }

    public function updateAbout(Request $request)
    {
        $this->profile->updateAbout($request->get('about'));
        return redirect()->back()
            ->with('status', 'Company about successfully updated!');
    }

    public function updateServices(Request $request)
    {

        $this->profile->updateService($request->get('services'));
        return redirect()->back()
            ->with('status', 'Company services successfully updated !');
    }

    public function updateProjects(Request $request)
    {
        $this->profile->updateProjects($request->get('projects'));
        return redirect()->back()
            ->with('status', 'Company projects successfully updated !');
    }

    public function updateContactDetails(Request $request)
    {
        $this->profile->updateContactDetails($request->all());
        return redirect()->back()
            ->with('status', 'Contact details successfully updated !');
    }

    public function addImage(Request $request)
    {
        $file = $this->profile->addImage($request->file('file'));
        return $file;
    }

    public function addDocument(Request $request)
    {
        $file = $this->profile->addDocument($request->file('file'));
        return $file;
    }

    public function deleteImage($id)
    {
        $this->profile->deleteImage($id);
        return redirect()->back()->with('status', 'Image successfully deleted !');
    }

    public function deleteDocument($id)
    {
        $this->profile->deleteDocument($id);
        return redirect()->back()->with('status', 'Document successfully deleted !');
    }

    public function changeLogo(LogoUploadRequest $request)
    {
        $this->profile->changeLogo($request->file('logo'));
        return redirect()->back()->with('status', 'Logo successfully uploaded !');
    }

    public function manageIndustryCertification(LogoUploadRequest $request){

        $this->profile->manageIndustryCertification( $request->file('logo'), $request->get('num'));
        return redirect()->back()->with('status', 'Certification successfully uploaded !');
    }

    public function deleteIndustryCertification($id){

        $this->profile->deleteIndustryCertification($id);
        return redirect()->back()->with('status', 'Certification successfully deleted !');
    }
}