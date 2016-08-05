<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLocationMetaRequest;
use App\Http\Requests\UpdateLocationMetaRequest;
use App\Repositories\LocationMetaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LocationMetaController extends InfyOmBaseController
{
    /** @var  LocationMetaRepository */
    private $locationMetaRepository;

    public function __construct(LocationMetaRepository $locationMetaRepo)
    {
        $this->locationMetaRepository = $locationMetaRepo;
    }

    /**
     * Display a listing of the LocationMeta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->locationMetaRepository->pushCriteria(new RequestCriteria($request));
        $locationMetas = $this->locationMetaRepository->all();

        return view('locationMetas.index')
            ->with('locationMetas', $locationMetas);
    }

    /**
     * Show the form for creating a new LocationMeta.
     *
     * @return Response
     */
    public function create()
    {
        return view('locationMetas.create');
    }

    /**
     * Store a newly created LocationMeta in storage.
     *
     * @param CreateLocationMetaRequest $request
     *
     * @return Response
     */
    public function store(CreateLocationMetaRequest $request)
    {
        $input = $request->all();

        $locationMeta = $this->locationMetaRepository->create($input);

        Flash::success('LocationMeta saved successfully.');

        return redirect(route('locationMetas.index'));
    }

    /**
     * Display the specified LocationMeta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $locationMeta = $this->locationMetaRepository->findWithoutFail($id);

        if (empty($locationMeta)) {
            Flash::error('LocationMeta not found');

            return redirect(route('locationMetas.index'));
        }

        return view('locationMetas.show')->with('locationMeta', $locationMeta);
    }

    /**
     * Show the form for editing the specified LocationMeta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $locationMeta = $this->locationMetaRepository->findWithoutFail($id);

        if (empty($locationMeta)) {
            Flash::error('LocationMeta not found');

            return redirect(route('locationMetas.index'));
        }

        return view('locationMetas.edit')->with('locationMeta', $locationMeta);
    }

    /**
     * Update the specified LocationMeta in storage.
     *
     * @param  int              $id
     * @param UpdateLocationMetaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLocationMetaRequest $request)
    {
        $locationMeta = $this->locationMetaRepository->findWithoutFail($id);

        if (empty($locationMeta)) {
            Flash::error('LocationMeta not found');

            return redirect(route('locationMetas.index'));
        }

        $locationMeta = $this->locationMetaRepository->update($request->all(), $id);

        Flash::success('LocationMeta updated successfully.');

        return redirect(route('locationMetas.index'));
    }

    /**
     * Remove the specified LocationMeta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $locationMeta = $this->locationMetaRepository->findWithoutFail($id);

        if (empty($locationMeta)) {
            Flash::error('LocationMeta not found');

            return redirect(route('locationMetas.index'));
        }

        $this->locationMetaRepository->delete($id);

        Flash::success('LocationMeta deleted successfully.');

        return redirect(route('locationMetas.index'));
    }
}
