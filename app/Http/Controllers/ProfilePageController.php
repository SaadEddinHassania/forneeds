<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\AreaRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SectorRepository;
use App\Repositories\ServiceProviderRepository;
use App\Repositories\ServiceRequestsRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfilePageController extends Controller
{
    /** @var  AreaRepository */
    private $areaRepository;

    /** @var  SectorRepository */
    private $sectorRepository;

    /** @var  AreaRepository */
    private $serviceRequestsRepository;

    /** @var  ServiceProviderRepository */
    private $serviceProviderRepository;

    /** @var  ProjectRepository */
    private $projectRepository;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(AreaRepository $areaRepo, SectorRepository $sectorRepo, ServiceRequestsRepository $serviceRequestsRepo, ServiceProviderRepository $serviceProviderRepo, ProjectRepository $projectRepo, UserRepository $userRepo)
    {
        $this->areaRepository=$areaRepo;
        $this->sectorRepository=$sectorRepo;
        $this->serviceRequestsRepository=$serviceRequestsRepo;
        $this->serviceProviderRepository = $serviceProviderRepo;
        $this->projectRepository = $projectRepo;
        $this->userRepository = $userRepo;
    }

    public function getIndex(Request $request)
    {
        $user = Auth::user();

        if($user->isServiceProvider()) {
            return view('profiles.serviceProviders.index', [
                "user" => $user,
                'serviceProviders' => $this->serviceProviderRepository->all()->lists('name', 'id')->toarray(),
                "user_attrs" => $this->userRepository->getFieldsSearchable()
            ]);
        }else if($user->isCitizen()){
            $sRequests = $user->citizen->servicesRequests;
//            dd($sRequests);

            return view('profiles.users.index',[
                "user"=>$user,
                "sRequests"=>$sRequests,
                'areas' => $this->areaRepository->all()->lists('name', 'id')->toarray(),
                'sectors' => $this->sectorRepository->all()->lists('name', 'id')->toarray(),

            ]);
        }
    }

    public function getImage(Request $request){
        $user = Auth::user();
        $img = Image::make(storage_path('assets\images\\' . $user->avatar))->resize(150, 150);

        return $img->response('jpg');
//        return Image::make(storage_path('assets\images\\' . $user->avatar));
    }
}
