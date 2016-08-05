<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateServiceProviderTypeRequest;
use App\Http\Requests\UpdateServiceProviderTypeRequest;
use App\Repositories\ServiceProviderTypeRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServiceProviderTypeController extends InfyOmBaseController
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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceProviderTypeRepository->pushCriteria(new RequestCriteria($request));
        $serviceProviderTypes = $this->serviceProviderTypeRepository->all();

        return view('serviceProviderTypes.index')
            ->with('serviceProviderTypes', $serviceProviderTypes);
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
