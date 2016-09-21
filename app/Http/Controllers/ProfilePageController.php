<?php

namespace App\Http\Controllers;

use App\Models\MarginalizedSituation;
use App\Models\User;
use App\Repositories\AreaRepository;
use App\Repositories\MarginalizedSituationRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SectorRepository;
use App\Repositories\ServiceProviderRepository;
use App\Repositories\ServiceProviderTypeRepository;
use App\Repositories\ServiceRequestsRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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

    /** @var  ServiceProviderTypeRepository */
    private $serviceProviderTypeRepository;

    /** @var  MarginalizedSituationRepository */
    private $marginalizedSituationRepository;


    public function __construct(AreaRepository $areaRepo, SectorRepository $sectorRepo, ServiceRequestsRepository $serviceRequestsRepo, ServiceProviderRepository $serviceProviderRepo, ProjectRepository $projectRepo, UserRepository $userRepo, ServiceProviderTypeRepository $serviceProviderTypeRepo, MarginalizedSituationRepository $marginalizedSituationRepo)
    {
        $this->areaRepository = $areaRepo;
        $this->sectorRepository = $sectorRepo;
        $this->serviceRequestsRepository = $serviceRequestsRepo;
        $this->serviceProviderRepository = $serviceProviderRepo;
        $this->projectRepository = $projectRepo;
        $this->userRepository = $userRepo;
        $this->serviceProviderTypeRepository = $serviceProviderTypeRepo;
        $this->marginalizedSituationRepository=$marginalizedSituationRepo;
    }

    public function getProfile(Request $request)
    {
        $user = Auth::user();

        if ($user->isServiceProvider()) {
            return view('profiles.serviceProviders.index', [
                "user" => $user,
                "sp"=>$user->serviceProvider()->first(),
                'projects' => $this->projectRepository->findByField('service_provider_id', $user->serviceProvider()->first()->id, ['id', 'name'])->lists('name', 'id')->toarray(),
                "user_attrs" => $this->userRepository->getFieldsSearchable(),
                'marginalizedSituations'=>$this->marginalizedSituationRepository->all()->lists('name', 'id')->toarray(),
                'sectors' => $user->serviceProvider()->first()->sectors()->lists('name', 'id')->toarray(),

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
                "types" => $this->serviceProviderTypeRepository->all()->lists('name', 'id')->toarray(),
                'sectors' => $this->sectorRepository->all()->lists('name', 'id')->toarray(),
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

        if ($user->isServiceProvider()) {
            $rules = [
                'name' => 'required',
                'email' => 'required|unique:users,email,' . $user->id,
                'serviceProvider.mission_statement' => 'required',
                'serviceProvider.service_provider_type_id' => 'required|exists:service_provider_types,id',
                'serviceProvider.sector_id' => 'required|exists:sectors,id'
            ];

            $validator = Validator::make($request->input(), $rules);
            if ($validator->fails()) {
                return Response::json($validator->errors()->all(), 400); // 400 being the HTTP code for an invalid request.
            }
            $sv = $user->serviceProvider;
            $sv->update($request->input('serviceProvider'));
            $sv->save();

            $user->update($request->all());
            $user->save();

        } else if ($user->isCitizen()) {
            $rules = [
                'name' => 'required',
                'email' => 'required|unique:users,email,' . $user->id,
            ];

            $validator = Validator::make($request->input(), $rules);
            if ($validator->fails()) {
                return Response::json($validator->errors()->all(), 400); // 400 being the HTTP code for an invalid request.
            }
            $citizen = $user->citizen;
            $citizen->update($request->input('citizen'));
            $citizen->save();

            $user->update($request->all());
            $user->save();
        }

        Session::flash('flash_message', 'Profile updated successfully');

        return ['flash_message' => 'Profile updated successfully'];

    }

    public function postImage(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'file' => 'image',
        ];

        $validator = Validator::make($request->input(), $rules);

        if ($validator->fails()) {
            return Response::json($validator->errors()->all(), 400); // 400 being the HTTP code for an invalid request.
        }
//        return Response::json(array('success' => true), 200);

        //   dd(array_add($request->all(), 'user_id', $user->id));

//        $serviceProvider->save();

        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $destinationPath = storage_path('assets\images\\' . $user->id . '\\');
                $fileName = uniqid() . '.' . $request->file('file')->getClientOriginalExtension();
                $request->file('file')->move($destinationPath, $fileName); // uploading file to given path
                $user->avatar = $fileName;
                $user->save();
            }
        }

        Session::flash('flash_message', 'Profile updated successfully');

        return ['flash_message' => 'Profile updated successfully'];

//        return Image::make(storage_path('assets\images\\' . $user->avatar));
    }

    public function getImage(Request $request)
    {
        $user = Auth::user();
        if ($user->avatar != null)
            $img = Image::make(storage_path('assets\images\\' . $user->id . '\\' . $user->avatar))->resize(150, 150);
        else
            $img = Image::make("http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image")->resize(150, 150);


        return $img->response('jpg');
//        return Image::make(storage_path('assets\images\\' . $user->avatar));
    }
}
