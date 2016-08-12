<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateServiceTypeRequest;
use App\Http\Requests\UpdateServiceTypeRequest;
use App\Repositories\ServiceTypeRepository;
use App\Repositories\SectorRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class ServiceTypeController extends AppBaseController
{
    /** @var  ServiceTypeRepository */
    private $serviceTypeRepository;

    /** @var  SectorRepository */
    private $sectorRepository;

    public function __construct(ServiceTypeRepository $serviceTypeRepo,SectorRepository $sectorRepo )
    {
        $this->serviceTypeRepository = $serviceTypeRepo;
        $this->sectorRepository = $sectorRepo;

    }

    /**
     * Display a listing of the ServiceType.
     *
     * @param ServiceTypeDataTable $serviceTypeDataTable
     * @return Response
     */
    public function index(ServiceTypeDataTable $serviceTypeDataTable)
    {
        return $serviceTypeDataTable->render('serviceTypes.index');
    }

    /**
     * Show the form for creating a new ServiceType.
     *
     * @return Response
     */
    public function create()
    {
        return view('serviceTypes.create',['sectors'=>$this->sectorRepository->all()->lists('name','id')->toarray()]);
    }

    /**
     * Store a newly created ServiceType in storage.
     *
     * @param CreateServiceTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceTypeRequest $request)
    {
        $input = $request->all();

        $serviceType = $this->serviceTypeRepository->create($input);

        Flash::success('ServiceType saved successfully.');

        return redirect(route('serviceTypes.index'));
    }

    /**
     * Display the specified ServiceType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceType = $this->serviceTypeRepository->findWithoutFail($id);

        if (empty($serviceType)) {
            Flash::error('ServiceType not found');

            return redirect(route('serviceTypes.index'));
        }

        return view('serviceTypes.show')->with('serviceType', $serviceType);
    }

    /**
     * Show the form for editing the specified ServiceType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceType = $this->serviceTypeRepository->findWithoutFail($id);

        if (empty($serviceType)) {
            Flash::error('ServiceType not found');

            return redirect(route('serviceTypes.index'));
        }

        return view('serviceTypes.edit')->with('serviceType', $serviceType);
    }

    /**
     * Update the specified ServiceType in storage.
     *
     * @param  int              $id
     * @param UpdateServiceTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceTypeRequest $request)
    {
        $serviceType = $this->serviceTypeRepository->findWithoutFail($id);

        if (empty($serviceType)) {
            Flash::error('ServiceType not found');

            return redirect(route('serviceTypes.index'));
        }

        $serviceType = $this->serviceTypeRepository->update($request->all(), $id);

        Flash::success('ServiceType updated successfully.');

        return redirect(route('serviceTypes.index'));
    }

    /**
     * Remove the specified ServiceType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceType = $this->serviceTypeRepository->findWithoutFail($id);

        if (empty($serviceType)) {
            Flash::error('ServiceType not found');

            return redirect(route('serviceTypes.index'));
        }

        $this->serviceTypeRepository->delete($id);

        Flash::success('ServiceType deleted successfully.');

        return redirect(route('serviceTypes.index'));
    }
}
