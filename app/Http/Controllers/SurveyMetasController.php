<?php

namespace App\Http\Controllers;

use App\DataTables\SurveyMetasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSurveyMetasRequest;
use App\Http\Requests\UpdateSurveyMetasRequest;
use App\Repositories\SurveyMetasRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class SurveyMetasController extends AppBaseController
{
    /** @var  SurveyMetasRepository */
    private $surveyMetasRepository;

    public function __construct(SurveyMetasRepository $surveyMetasRepo)
    {
        $this->surveyMetasRepository = $surveyMetasRepo;
    }

    /**
     * Display a listing of the SurveyMetas.
     *
     * @param SurveyMetasDataTable $surveyMetasDataTable
     * @return Response
     */
    public function index(SurveyMetasDataTable $surveyMetasDataTable)
    {
        return $surveyMetasDataTable->render('surveyMetas.index');
    }

    /**
     * Show the form for creating a new SurveyMetas.
     *
     * @return Response
     */
    public function create()
    {
        return view('surveyMetas.create');
    }

    /**
     * Store a newly created SurveyMetas in storage.
     *
     * @param CreateSurveyMetasRequest $request
     *
     * @return Response
     */
    public function store(CreateSurveyMetasRequest $request)
    {
        $input = $request->all();

        $surveyMetas = $this->surveyMetasRepository->create($input);

        Flash::success('SurveyMetas saved successfully.');

        return redirect(route('surveyMetas.index'));
    }

    /**
     * Display the specified SurveyMetas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $surveyMetas = $this->surveyMetasRepository->findWithoutFail($id);

        if (empty($surveyMetas)) {
            Flash::error('SurveyMetas not found');

            return redirect(route('surveyMetas.index'));
        }

        return view('surveyMetas.show')->with('surveyMetas', $surveyMetas);
    }

    /**
     * Show the form for editing the specified SurveyMetas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $surveyMetas = $this->surveyMetasRepository->findWithoutFail($id);

        if (empty($surveyMetas)) {
            Flash::error('SurveyMetas not found');

            return redirect(route('surveyMetas.index'));
        }

        return view('surveyMetas.edit')->with('surveyMetas', $surveyMetas);
    }

    /**
     * Update the specified SurveyMetas in storage.
     *
     * @param  int              $id
     * @param UpdateSurveyMetasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSurveyMetasRequest $request)
    {
        $surveyMetas = $this->surveyMetasRepository->findWithoutFail($id);

        if (empty($surveyMetas)) {
            Flash::error('SurveyMetas not found');

            return redirect(route('surveyMetas.index'));
        }

        $surveyMetas = $this->surveyMetasRepository->update($request->all(), $id);

        Flash::success('SurveyMetas updated successfully.');

        return redirect(route('surveyMetas.index'));
    }

    /**
     * Remove the specified SurveyMetas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $surveyMetas = $this->surveyMetasRepository->findWithoutFail($id);

        if (empty($surveyMetas)) {
            Flash::error('SurveyMetas not found');

            return redirect(route('surveyMetas.index'));
        }

        $this->surveyMetasRepository->delete($id);

        Flash::success('SurveyMetas deleted successfully.');

        return redirect(route('surveyMetas.index'));
    }
}
