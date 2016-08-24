<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DistrictDataTable;
use App\Http\Requests\CreateDistrictRequest;
use App\Http\Requests\UpdateDistrictRequest;
use App\Repositories\DistrictRepository;
use App\Repositories\CityRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class DistrictController extends AppBaseController
{
    /** @var  DistrictRepository */
    private $districtRepository;

    /** @var  CityRepository */
    private $cityRepository;


    public function __construct(DistrictRepository $districtRepo,CityRepository $cityRepo)
    {
        $this->districtRepository = $districtRepo;
        $this->cityRepository = $cityRepo;

    }

    /**
     * Display a listing of the District.
     *
     * @param DistrictDataTable $districtDataTable
     * @return Response
     */
    public function index(DistrictDataTable $districtDataTable)
    {
        return $districtDataTable->render('admin.districts.index');
        $this->cityRepository = $cityRepo;

    }

    /**
     * Show the form for creating a new District.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.districts.create', ['cities' =>$this->cityRepository->all()->lists('name','id')]);
    }

    /**
     * Store a newly created District in storage.
     *
     * @param CreateDistrictRequest $request
     *
     * @return Response
     */
    public function store(CreateDistrictRequest $request)
    {
        $input = $request->all();

        $district = $this->districtRepository->create($input);

        Flash::success('District saved successfully.');

        return redirect(route('districts.index'));
    }

    /**
     * Display the specified District.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $district = $this->districtRepository->findWithoutFail($id);

        if (empty($district)) {
            Flash::error('District not found');

            return redirect(route('districts.index'));
        }

        return view('admin.districts.show')->with('district', $district);
    }

    /**
     * Show the form for editing the specified District.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $district = $this->districtRepository->findWithoutFail($id);

        if (empty($district)) {
            Flash::error('District not found');

            return redirect(route('districts.index'));
        }

        return view('admin.districts.edit')->with('district', $district);
    }

    /**
     * Update the specified District in storage.
     *
     * @param  int              $id
     * @param UpdateDistrictRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistrictRequest $request)
    {
        $district = $this->districtRepository->findWithoutFail($id);

        if (empty($district)) {
            Flash::error('District not found');

            return redirect(route('districts.index'));
        }

        $district = $this->districtRepository->update($request->all(), $id);

        Flash::success('District updated successfully.');

        return redirect(route('districts.index'));
    }

    /**
     * Remove the specified District from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $district = $this->districtRepository->findWithoutFail($id);

        if (empty($district)) {
            Flash::error('District not found');

            return redirect(route('districts.index'));
        }

        $this->districtRepository->delete($id);

        Flash::success('District deleted successfully.');

        return redirect(route('districts.index'));
    }
}
