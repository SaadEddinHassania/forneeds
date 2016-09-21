<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\CitizenRepository;
use App\Repositories\ServiceProviderRepository;
use App\Repositories\ServiceProviderTypeRepository;
use App\Repositories\ServiceRequestsRepository;
use App\Repositories\SurveyRepository;
use App\Repositories\UserRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class DashboardController extends AppBaseController
{

    /** @var  CitizenRepository */
    private $citizenRepository;

    /** @var  ServiceRequestsRepository */
    private $serviceRequestsRepository;

    /** @var  SurveyRepository */
    private $surveyRepository;

    /** @var  ServiceProviderRepository */
    private $serviceProviderRepository;

    public function __construct(CitizenRepository $citizenRepository,ServiceRequestsRepository $serviceRequestsRepository,SurveyRepository $surveyRepository,ServiceProviderRepository $serviceProviderRepository)
    {
        $this->citizenRepository = $citizenRepository;
        $this->serviceRequestsRepository = $serviceRequestsRepository;
        $this->surveyRepository = $surveyRepository;
        $this->serviceProviderRepository = $serviceProviderRepository;
    }
    public function getDashboard(){
        $citizenCount = $this->citizenRepository->getActiveCitizen()->get()->count();
        $serviceProviderCount = $this->serviceProviderRepository->getActiveServiceProvider()->get()->count();
        $surveyCount = $this->surveyRepository->all()->count();
        $serviceRequestsCount = $this->serviceRequestsRepository->all()->count();
        return view('admin.dashboard',compact('citizenCount','serviceProviderCount','surveyCount','serviceRequestsCount'));
    }
}
