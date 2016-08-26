<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\AreaRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SectorRepository;
use App\Repositories\ServiceProviderRepository;
use App\Repositories\ServiceProviderTypeRepository;
use App\Repositories\ServiceRequestsRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

    private $typesRepo;

    public function __construct(AreaRepository $areaRepo, SectorRepository $sectorRepo, ServiceRequestsRepository $serviceRequestsRepo, ServiceProviderRepository $serviceProviderRepo, ProjectRepository $projectRepo, UserRepository $userRepo ,ServiceProviderTypeRepository $typesRepo)
    {
        $this->areaRepository = $areaRepo;
        $this->sectorRepository = $sectorRepo;
        $this->serviceRequestsRepository = $serviceRequestsRepo;
        $this->serviceProviderRepository = $serviceProviderRepo;
        $this->projectRepository = $projectRepo;
        $this->userRepository = $userRepo;
        $this->typesRepo = $typesRepo;
    }

    public function getProfile(Request $request)
    {
        $user = Auth::user();

        if ($user->isServiceProvider()) {
            return view('profiles.serviceProviders.index', [
                "user" => $user,
                'serviceProviders' => $this->serviceProviderRepository->all()->lists('name', 'id')->toarray(),
                "user_attrs" => $this->userRepository->getFieldsSearchable()
            ]);
        } else if ($user->isCitizen()) {
            $sRequests = $user->citizen->servicesRequests;
//            dd($sRequests);

            return view('profiles.users.index', [
                "user" => $user,
                "sRequests" => $sRequests,
                'areas' => $this->areaRepository->all()->lists('name', 'id')->toarray(),
                'sectors' => $this->sectorRepository->all()->lists('name', 'id')->toarray(),

            ]);
        }
    }

    public function getSettings(Request $request)
    {
        $user = Auth::user();

        if ($user->isServiceProvider()) {
            return view('profiles.serviceProviders.settings', [
                "user" => $user->with('ServiceProvider')->first(),
                'serviceProviders' => $this->serviceProviderRepository->all()->lists('name', 'id')->toarray(),
                "user_attrs" => $this->userRepository->getFieldsSearchable(),
                "types" => $this->typesRepo->all()->lists('name','id')->toarray(),
                'sectors' =>$this->sectorRepository->all()->lists('name','id')->toarray(),
            ]);
        } else if ($user->isCitizen()) {
            $sRequests = $user->citizen->servicesRequests;
//            dd($sRequests);

            return view('profiles.users.settings', [
                "user" => $user,
                "sRequests" => $sRequests,
                'areas' => $this->areaRepository->all()->lists('name', 'id')->toarray(),
                'sectors' => $this->sectorRepository->all()->lists('name', 'id')->toarray(),

            ]);
        }
    }

    /**
     * @return AreaRepository
     */
    public function postUpdate(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'serviceProvider.mission_statement' => 'required',
            'serviceProvider.service_provider_type_id' => 'required|exists:service_provider_types,id',
            'serviceProvider.sector_id' => 'required|exists:sectors,id'
        ]);

        //   dd(array_add($request->all(), 'user_id', $user->id));
        $sv = $user->serviceProvider;
$sv->update($request->input('serviceProvider'));
        $sv->save();
//        $serviceProvider->save();

        Session::flash('flash_message', 'Registration Completed');

        return ['flash_message'=>'Registration Completed'];
    }

    public function getImage(Request $request)
    {
        $user = Auth::user();
        $img = Image::make(storage_path('assets\images\\' . $user->avatar))->resize(150, 150);

        return $img->response('jpg');
//        return Image::make(storage_path('assets\images\\' . $user->avatar));
    }
}
