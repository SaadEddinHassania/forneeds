<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMarginalizedSituationRequest;
use App\Http\Requests\UpdateMarginalizedSituationRequest;
use App\Repositories\MarginalizedSituationRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MarginalizedSituationController extends InfyOmBaseController
{
    /** @var  MarginalizedSituationRepository */
    private $marginalizedSituationRepository;

    public function __construct(MarginalizedSituationRepository $marginalizedSituationRepo)
    {
        $this->marginalizedSituationRepository = $marginalizedSituationRepo;
    }

    /**
     * Display a listing of the MarginalizedSituation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->marginalizedSituationRepository->pushCriteria(new RequestCriteria($request));
        $marginalizedSituations = $this->marginalizedSituationRepository->all();

        return view('marginalizedSituations.index')
            ->with('marginalizedSituations', $marginalizedSituations);
    }

    /**
     * Show the form for creating a new MarginalizedSituation.
     *
     * @return Response
     */
    public function create()
    {
        return view('marginalizedSituations.create');
    }

    /**
     * Store a newly created MarginalizedSituation in storage.
     *
     * @param CreateMarginalizedSituationRequest $request
     *
     * @return Response
     */
    public function store(CreateMarginalizedSituationRequest $request)
    {
        $input = $request->all();

        $marginalizedSituation = $this->marginalizedSituationRepository->create($input);

        Flash::success('MarginalizedSituation saved successfully.');

        return redirect(route('marginalizedSituations.index'));
    }

    /**
     * Display the specified MarginalizedSituation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $marginalizedSituation = $this->marginalizedSituationRepository->findWithoutFail($id);

        if (empty($marginalizedSituation)) {
            Flash::error('MarginalizedSituation not found');

            return redirect(route('marginalizedSituations.index'));
        }

        return view('marginalizedSituations.show')->with('marginalizedSituation', $marginalizedSituation);
    }

    /**
     * Show the form for editing the specified MarginalizedSituation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $marginalizedSituation = $this->marginalizedSituationRepository->findWithoutFail($id);

        if (empty($marginalizedSituation)) {
            Flash::error('MarginalizedSituation not found');

            return redirect(route('marginalizedSituations.index'));
        }

        return view('marginalizedSituations.edit')->with('marginalizedSituation', $marginalizedSituation);
    }

    /**
     * Update the specified MarginalizedSituation in storage.
     *
     * @param  int              $id
     * @param UpdateMarginalizedSituationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarginalizedSituationRequest $request)
    {
        $marginalizedSituation = $this->marginalizedSituationRepository->findWithoutFail($id);

        if (empty($marginalizedSituation)) {
            Flash::error('MarginalizedSituation not found');

            return redirect(route('marginalizedSituations.index'));
        }

        $marginalizedSituation = $this->marginalizedSituationRepository->update($request->all(), $id);

        Flash::success('MarginalizedSituation updated successfully.');

        return redirect(route('marginalizedSituations.index'));
    }

    /**
     * Remove the specified MarginalizedSituation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $marginalizedSituation = $this->marginalizedSituationRepository->findWithoutFail($id);

        if (empty($marginalizedSituation)) {
            Flash::error('MarginalizedSituation not found');

            return redirect(route('marginalizedSituations.index'));
        }

        $this->marginalizedSituationRepository->delete($id);

        Flash::success('MarginalizedSituation deleted successfully.');

        return redirect(route('marginalizedSituations.index'));
    }
}
