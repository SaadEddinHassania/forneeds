<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceRequestsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateServiceRequestsRequest;
use App\Http\Requests\UpdateServiceRequestsRequest;
use App\Repositories\ServiceRequestsRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class ServiceRequestsController extends AppBaseController
{
    /** @var  ServiceRequestsRepository */
    private $serviceRequestsRepository;

    public function __construct(ServiceRequestsRepository $serviceRequestsRepo)
    {
        $this->serviceRequestsRepository = $serviceRequestsRepo;
    }

    /**
     * Display a listing of the ServiceRequests.
     *
     * @param ServiceRequestsDataTable $serviceRequestsDataTable
     * @return Response
     */
    public function index(ServiceRequestsDataTable $serviceRequestsDataTable)
    {
        return $serviceRequestsDataTable->render('serviceRequests.index');
    }

    /**
     * Show the form for creating a new ServiceRequests.
     *
     * @return Response
     */
    public function create()
    {
        return view('serviceRequests.create');
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

        $serviceRequests = $this->serviceRequestsRepository->create($input);

        Flash::success('ServiceRequests saved successfully.');

        return redirect(route('serviceRequests.index'));
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

            return redirect(route('serviceRequests.index'));
        }

        return view('serviceRequests.show')->with('serviceRequests', $serviceRequests);
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

            return redirect(route('serviceRequests.index'));
        }

        return view('serviceRequests.edit')->with('serviceRequests', $serviceRequests);
    }

    /**
     * Update the specified ServiceRequests in storage.
     *
     * @param  int              $id
     * @param UpdateServiceRequestsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceRequestsRequest $request)
    {
        $serviceRequests = $this->serviceRequestsRepository->findWithoutFail($id);

        if (empty($serviceRequests)) {
            Flash::error('ServiceRequests not found');

            return redirect(route('serviceRequests.index'));
        }

        $serviceRequests = $this->serviceRequestsRepository->update($request->all(), $id);

        Flash::success('ServiceRequests updated successfully.');

        return redirect(route('serviceRequests.index'));
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

            return redirect(route('serviceRequests.index'));
        }

        $this->serviceRequestsRepository->delete($id);

        Flash::success('ServiceRequests deleted successfully.');

        return redirect(route('serviceRequests.index'));
    }
}
