<?php

namespace App\Http\Controllers;

use App\DataTables\BeneficiariesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBeneficiariesRequest;
use App\Http\Requests\UpdateBeneficiariesRequest;
use App\Repositories\BeneficiariesRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class BeneficiariesController extends AppBaseController
{
    /** @var  BeneficiariesRepository */
    private $beneficiariesRepository;

    public function __construct(BeneficiariesRepository $beneficiariesRepo)
    {
        $this->beneficiariesRepository = $beneficiariesRepo;
    }

    /**
     * Display a listing of the Beneficiaries.
     *
     * @param BeneficiariesDataTable $beneficiariesDataTable
     * @return Response
     */
    public function index(BeneficiariesDataTable $beneficiariesDataTable)
    {
        return $beneficiariesDataTable->render('admin.beneficiaries.index');
    }

    /**
     * Show the form for creating a new Beneficiaries.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.beneficiaries.create');
    }

    /**
     * Store a newly created Beneficiaries in storage.
     *
     * @param CreateBeneficiariesRequest $request
     *
     * @return Response
     */
    public function store(CreateBeneficiariesRequest $request)
    {
        $input = $request->all();

        $beneficiaries = $this->beneficiariesRepository->create($input);

        Flash::success('Beneficiaries saved successfully.');

        return redirect(route('admin.beneficiaries.index'));
    }

    /**
     * Display the specified Beneficiaries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $beneficiaries = $this->beneficiariesRepository->findWithoutFail($id);

        if (empty($beneficiaries)) {
            Flash::error('Beneficiaries not found');

            return redirect(route('admin.beneficiaries.index'));
        }

        return view('admin.beneficiaries.show')->with('beneficiaries', $beneficiaries);
    }

    /**
     * Show the form for editing the specified Beneficiaries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $beneficiaries = $this->beneficiariesRepository->findWithoutFail($id);

        if (empty($beneficiaries)) {
            Flash::error('Beneficiaries not found');

            return redirect(route('admin.beneficiaries.index'));
        }

        return view('admin.beneficiaries.edit')->with('beneficiaries', $beneficiaries);
    }

    /**
     * Update the specified Beneficiaries in storage.
     *
     * @param  int              $id
     * @param UpdateBeneficiariesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBeneficiariesRequest $request)
    {
        $beneficiaries = $this->beneficiariesRepository->findWithoutFail($id);

        if (empty($beneficiaries)) {
            Flash::error('Beneficiaries not found');

            return redirect(route('admin.beneficiaries.index'));
        }

        $beneficiaries = $this->beneficiariesRepository->update($request->all(), $id);

        Flash::success('Beneficiaries updated successfully.');

        return redirect(route('admin.beneficiaries.index'));
    }

    /**
     * Remove the specified Beneficiaries from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $beneficiaries = $this->beneficiariesRepository->findWithoutFail($id);

        if (empty($beneficiaries)) {
            Flash::error('Beneficiaries not found');

            return redirect(route('admin.beneficiaries.index'));
        }

        $this->beneficiariesRepository->delete($id);

        Flash::success('Beneficiaries deleted successfully.');

        return redirect(route('admin.beneficiaries.index'));
    }
}
