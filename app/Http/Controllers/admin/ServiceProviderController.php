<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceProviderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateServiceProviderRequest;
use App\Http\Requests\UpdateServiceProviderRequest;
use App\Repositories\ServiceProviderRepository;
use App\Repositories\SectorRepository;
use App\Repositories\UserRepository;
use App\Repositories\ServiceProviderTypeRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class ServiceProviderController extends AppBaseController
{
    /** @var  ServiceProviderRepository */
    private $serviceProviderRepository;

    /** @var  SectorRepository */
    private $sectorRepository;

    /** @var  UserRepository */
    private $userRepository;

    /** @var  ServiceProviderTypeRepository */
    private $serviceProviderTypeRepository;
    public function __construct(ServiceProviderRepository $serviceProviderRepo, SectorRepository $sectorRepo, UserRepository $userRepo,ServiceProviderTypeRepository $serviceProviderTypeRepo
    )
    {
        $this->serviceProviderRepository = $serviceProviderRepo;
        $this->sectorRepository = $sectorRepo;
        $this->userRepository = $userRepo;
        $this->serviceProviderTypeRepository = $serviceProviderTypeRepo;

    }

    /**
     * Display a listing of the ServiceProvider.
     *
     * @param ServiceProviderDataTable $serviceProviderDataTable
     * @return Response
     */
    public function index(ServiceProviderDataTable $serviceProviderDataTable)
    {
        return $serviceProviderDataTable->render('admin.serviceProviders.index');
    }

    /**
     * Show the form for creating a new ServiceProvider.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.serviceProviders.create',[
            'sectors' => $this->sectorRepository->all()->lists('name', 'id')->toarray(),
            'users' => $this->userRepository->all()->lists('name', 'id')->toarray(),
            'serviceProviderTypes' => $this->serviceProviderTypeRepository->all()->lists('name', 'id')->toarray(),
        ]);
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

        return redirect(route('admin.serviceProviders.index'));
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

            return redirect(route('admin.serviceProviders.index'));
        }

        return view('admin.serviceProviders.show')->with('serviceProvider', $serviceProvider);
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

            return redirect(route('admin.serviceProviders.index'));
        }

        return view('admin.serviceProviders.edit')->with('serviceProvider', $serviceProvider);
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

            return redirect(route('admin.serviceProviders.index'));
        }

        $serviceProvider = $this->serviceProviderRepository->update($request->all(), $id);

        Flash::success('ServiceProvider updated successfully.');

        return redirect(route('admin.serviceProviders.index'));
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

            return redirect(route('admin.serviceProviders.index'));
        }

        $this->serviceProviderRepository->delete($id);

        Flash::success('ServiceProvider deleted successfully.');

        return redirect(route('admin.serviceProviders.index'));
    }
}
