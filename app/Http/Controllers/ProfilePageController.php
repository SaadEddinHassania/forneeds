<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\AreaRepository;
use App\Repositories\SectorRepository;
use App\Repositories\ServiceRequestsRepository;
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

    public function __construct(AreaRepository $areaRepo, SectorRepository $sectorRepo,ServiceRequestsRepository $serviceRequestsRepo)
    {
        $this->areaRepository=$areaRepo;
        $this->sectorRepository=$sectorRepo;
        $this->serviceRequestsRepository=$serviceRequestsRepo;
    }

    public function getIndex(Request $request)
    {
        $user = Auth::user();

        if($user->isServiceProvider()) {
            return view('profiles.serviceProviders.index',compact('user'));
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
