<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceProviderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateServiceProviderRequest;
use App\Http\Requests\UpdateServiceProviderRequest;
use App\Repositories\ServiceProviderRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class ServiceProviderController extends AppBaseController
{
    /** @var  ServiceProviderRepository */
    private $serviceProviderRepository;

    public function __construct(ServiceProviderRepository $serviceProviderRepo)
    {
        $this->serviceProviderRepository = $serviceProviderRepo;
    }

    /**
     * Display a listing of the ServiceProvider.
     *
     * @param ServiceProviderDataTable $serviceProviderDataTable
     * @return Response
     */
    public function index(ServiceProviderDataTable $serviceProviderDataTable)
    {
        return $serviceProviderDataTable->render('serviceProviders.index');
    }

    /**
     * Show the form for creating a new ServiceProvider.
     *
     * @return Response
     */
    public function create()
    {
        return view('serviceProviders.create');
    }

    /**
     * Store a newly created ServiceProvider in storage.
     *
     * @param CreateServiceProviderRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceProviderRequest $request)
    {
        $input = $request->all();

        $serviceProvider = $this->serviceProviderRepository->create($input);

        Flash::success('ServiceProvider saved successfully.');

        return redirect(route('serviceProviders.index'));
    }

    /**
     * Display the specified ServiceProvider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceProvider = $this->serviceProviderRepository->findWithoutFail($id);

        if (empty($serviceProvider)) {
            Flash::error('ServiceProvider not found');

            return redirect(route('serviceProviders.index'));
        }

        return view('serviceProviders.show')->with('serviceProvider', $serviceProvider);
    }

    /**
     * Show the form for editing the specified ServiceProvider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceProvider = $this->serviceProviderRepository->findWithoutFail($id);

        if (empty($serviceProvider)) {
            Flash::error('ServiceProvider not found');

            return redirect(route('serviceProviders.index'));
        }

        return view('serviceProviders.edit')->with('serviceProvider', $serviceProvider);
    }

    /**
     * Update the specified ServiceProvider in storage.
     *
     * @param  int              $id
     * @param UpdateServiceProviderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceProviderRequest $request)
    {
        $serviceProvider = $this->serviceProviderRepository->findWithoutFail($id);

        if (empty($serviceProvider)) {
            Flash::error('ServiceProvider not found');

            return redirect(route('serviceProviders.index'));
        }

        $serviceProvider = $this->serviceProviderRepository->update($request->all(), $id);

        Flash::success('ServiceProvider updated successfully.');

        return redirect(route('serviceProviders.index'));
    }

    /**
     * Remove the specified ServiceProvider from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceProvider = $this->serviceProviderRepository->findWithoutFail($id);

        if (empty($serviceProvider)) {
            Flash::error('ServiceProvider not found');

            return redirect(route('serviceProviders.index'));
        }

        $this->serviceProviderRepository->delete($id);

        Flash::success('ServiceProvider deleted successfully.');

        return redirect(route('serviceProviders.index'));
    }
}
