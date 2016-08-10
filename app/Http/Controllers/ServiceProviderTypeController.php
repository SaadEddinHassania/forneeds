<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceProviderTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateServiceProviderTypeRequest;
use App\Http\Requests\UpdateServiceProviderTypeRequest;
use App\Repositories\ServiceProviderTypeRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class ServiceProviderTypeController extends AppBaseController
{
    /** @var  ServiceProviderTypeRepository */
    private $serviceProviderTypeRepository;

    public function __construct(ServiceProviderTypeRepository $serviceProviderTypeRepo)
    {
        $this->serviceProviderTypeRepository = $serviceProviderTypeRepo;
    }

    /**
     * Display a listing of the ServiceProviderType.
     *
     * @param ServiceProviderTypeDataTable $serviceProviderTypeDataTable
     * @return Response
     */
    public function index(ServiceProviderTypeDataTable $serviceProviderTypeDataTable)
    {
        return $serviceProviderTypeDataTable->render('serviceProviderTypes.index');
    }

    /**
     * Show the form for creating a new ServiceProviderType.
     *
     * @return Response
     */
    public function create()
    {
        return view('serviceProviderTypes.create');
    }

    /**
     * Store a newly created ServiceProviderType in storage.
     *
     * @param CreateServiceProviderTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceProviderTypeRequest $request)
    {
        $input = $request->all();

        $serviceProviderType = $this->serviceProviderTypeRepository->create($input);

        Flash::success('ServiceProviderType saved successfully.');

        return redirect(route('serviceProviderTypes.index'));
    }

    /**
     * Display the specified ServiceProviderType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceProviderType = $this->serviceProviderTypeRepository->findWithoutFail($id);

        if (empty($serviceProviderType)) {
            Flash::error('ServiceProviderType not found');

            return redirect(route('serviceProviderTypes.index'));
        }

        return view('serviceProviderTypes.show')->with('serviceProviderType', $serviceProviderType);
    }

    /**
     * Show the form for editing the specified ServiceProviderType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceProviderType = $this->serviceProviderTypeRepository->findWithoutFail($id);

        if (empty($serviceProviderType)) {
            Flash::error('ServiceProviderType not found');

            return redirect(route('serviceProviderTypes.index'));
        }

        return view('serviceProviderTypes.edit')->with('serviceProviderType', $serviceProviderType);
    }

    /**
     * Update the specified ServiceProviderType in storage.
     *
     * @param  int              $id
     * @param UpdateServiceProviderTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceProviderTypeRequest $request)
    {
        $serviceProviderType = $this->serviceProviderTypeRepository->findWithoutFail($id);

        if (empty($serviceProviderType)) {
            Flash::error('ServiceProviderType not found');

            return redirect(route('serviceProviderTypes.index'));
        }

        $serviceProviderType = $this->serviceProviderTypeRepository->update($request->all(), $id);

        Flash::success('ServiceProviderType updated successfully.');

        return redirect(route('serviceProviderTypes.index'));
    }

    /**
     * Remove the specified ServiceProviderType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceProviderType = $this->serviceProviderTypeRepository->findWithoutFail($id);

        if (empty($serviceProviderType)) {
            Flash::error('ServiceProviderType not found');

            return redirect(route('serviceProviderTypes.index'));
        }

        $this->serviceProviderTypeRepository->delete($id);

        Flash::success('ServiceProviderType deleted successfully.');

        return redirect(route('serviceProviderTypes.index'));
    }
}
