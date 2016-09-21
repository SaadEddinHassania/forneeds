<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceRequestsDataTable;
use App\Http\Requests\CreateServiceRequestsRequest;
use App\Http\Requests\UpdateServiceRequestsRequest;
use App\Models\District;
use App\Models\Street;
use App\Repositories\CitizenRepository;
use App\Repositories\ServiceRequestsRepository;
use App\Repositories\SectorRepository;
use App\Repositories\AreaRepository;
use App\Repositories\UserRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class ServiceRequestsController extends AppBaseController
{
    /** @var  ServiceRequestsRepository */
    private $serviceRequestsRepository;

    /** @var  AreaRepository */
    private $areaRepository;

    /** @var  SectorRepository */
    private $sectorRepository;

    /** @var  CitizenRepository */
    private $citizenRepository;

    public function __construct(ServiceRequestsRepository $serviceRequestsRepo, AreaRepository $areaRepo, SectorRepository $sectorRepo, CitizenRepository $citizenRepo)
    {
        $this->serviceRequestsRepository = $serviceRequestsRepo;
        $this->areaRepository = $areaRepo;
        $this->sectorRepository = $sectorRepo;
        $this->citizenRepository = $citizenRepo;

    }

    /**
     * Display a listing of the ServiceRequests.
     *
     * @param ServiceRequestsDataTable $serviceRequestsDataTable
     * @return Response
     */
    public function index(ServiceRequestsDataTable $serviceRequestsDataTable)
    {
        return $serviceRequestsDataTable->render('admin.serviceRequests.index');
    }

    /**
     * Show the form for creating a new ServiceRequests.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.serviceRequests.create', [
            'areas' => $this->areaRepository->all()->lists('name', 'id')->toarray(),
            'sectors' => $this->sectorRepository->all()->lists('name', 'id')->toarray(),
            'users' => $this->citizenRepository->all()->lists('name', 'id')->toarray(),
        ]);
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
        $st = District::find($input['district_id']);
        $input['location_meta_id']=$st->location_meta_id;
        $serviceRequests = $this->serviceRequestsRepository->create($input);

        Flash::success('ServiceRequests saved successfully.');

        return redirect(route('admin.serviceRequests.index'));
    }

    /**
     * Display the specified ServiceRequests.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceRequests = $this->serviceRequestsRepository->findWithoutFail($id);

        if (empty($serviceRequests)) {
            Flash::error('ServiceRequests not found');

            return redirect(route('admin.serviceRequests.index'));
        }

        return view('admin.serviceRequests.show')->with('serviceRequests', $serviceRequests);
    }

    /**
     * Show the form for editing the specified ServiceRequests.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceRequests = $this->serviceRequestsRepository->findWithoutFail($id);

        if (empty($serviceRequests)) {
            Flash::error('ServiceRequests not found');

            return redirect(route('admin.serviceRequests.index'));
        }

        return view('admin.serviceRequests.edit', [
            'areas' => $this->areaRepository->all()->lists('name', 'id')->toarray(),
            'sectors' => $this->sectorRepository->all()->lists('name', 'id')->toarray(),
            'users' => $this->citizenRepository->all()->lists('name', 'id')->toarray(),
        ])->with('serviceRequests', $serviceRequests);
    }

    /**
     * Update the specified ServiceRequests in storage.
     *
     * @param  int $id
     * @param UpdateServiceRequestsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceRequestsRequest $request)
    {
        $serviceRequests = $this->serviceRequestsRepository->findWithoutFail($id);

        if (empty($serviceRequests)) {
            Flash::error('ServiceRequests not found');

            return redirect(route('admin.serviceRequests.index'));
        }

        $serviceRequests = $this->serviceRequestsRepository->update($request->all(), $id);

        Flash::success('ServiceRequests updated successfully.');

        return redirect(route('admin.serviceRequests.index'));
    }

    /**
     * Remove the specified ServiceRequests from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceRequests = $this->serviceRequestsRepository->findWithoutFail($id);

        if (empty($serviceRequests)) {
            Flash::error('ServiceRequests not found');

            return redirect(route('admin.serviceRequests.index'));
        }

        $this->serviceRequestsRepository->delete($id);

        Flash::success('ServiceRequests deleted successfully.');

        return redirect(route('admin.serviceRequests.index'));
    }
}
