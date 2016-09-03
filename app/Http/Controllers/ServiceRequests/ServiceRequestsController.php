<?php

namespace App\Http\Controllers\ServiceRequests;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ServiceRequestsRepository;
use App\Http\Requests\CreateServiceRequestsRequest;
use App\Models\Street;
use Flash;


class ServiceRequestsController extends Controller
{
    /** @var  ServiceRequestsRepository */
    private $serviceRequestsRepository;

    public function __construct(ServiceRequestsRepository $serviceRequestsRepo)
    {
        $this->serviceRequestsRepository = $serviceRequestsRepo;
    }

    /**
     * Store a newly created ServiceRequests in storage.
     *
     * @param CreateServiceRequestsRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceRequestsRequest $request)
    {
        $input = $request->all();
        $st = Street::findOrFail($input['street_id']);
        $input['location_meta_id'] = $st->location_meta_id;
        $input['citizen_id'] = Auth::user()->citizen()->first()->id;
        $serviceRequest = $this->serviceRequestsRepository->create($input);

        Flash::success('ServiceRequests saved successfully.');

        return response()->json(collect(["id" => $serviceRequest->id]));
    }
}

