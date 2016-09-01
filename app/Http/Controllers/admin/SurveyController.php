<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SurveyDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSurveyRequest;
use App\Http\Requests\UpdateSurveyRequest;
use App\Repositories\SurveyRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ServiceProviderRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class SurveyController extends AppBaseController
{
    /** @var  SurveyRepository */
    private $surveyRepository;

    /** @var  ServiceProviderRepository */
    private $serviceProviderRepository;

    /** @var  ProjectRepository */
    private $projectRepository;


    public function __construct(SurveyRepository $surveyRepo, ServiceProviderRepository $serviceProviderRepo, ProjectRepository $projectRepo)
    {
        $this->surveyRepository = $surveyRepo;
        $this->serviceProviderRepository = $serviceProviderRepo;
        $this->projectRepository = $projectRepo;

    }

    /**
     * Display a listing of the Survey.
     *
     * @param SurveyDataTable $surveyDataTable
     * @return Response
     */
    public function index(SurveyDataTable $surveyDataTable)
    {
        return $surveyDataTable->render('admin.surveys.index');
    }

    /**
     * Show the form for creating a new Survey.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.surveys.create', [
            'projects' => $this->projectRepository->all()->lists('name', 'id')->toarray(),
            'serviceProviders' => $this->serviceProviderRepository->all()->lists('name', 'id')->toarray(),
        ]);
    }

    /**
     * Store a newly created Survey in storage.
     *
     * @param CreateSurveyRequest $request
     *
     * @return Response
     */
    public function store(CreateSurveyRequest $request)
    {
        $input = $request->all();

        $survey = $this->surveyRepository->create($input);

        Flash::success('Survey saved successfully.');

        return redirect(route('admin.surveys.index'));
    }

    /**
     * Display the specified Survey.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $survey = $this->surveyRepository->findWithoutFail($id);

        if (empty($survey)) {
            Flash::error('Survey not found');

            return redirect(route('admin.surveys.index'));
        }

        return view('admin.surveys.show')->with('survey', $survey);
    }

    /**
     * Show the form for editing the specified Survey.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $survey = $this->surveyRepository->findWithoutFail($id);

        if (empty($survey)) {
            Flash::error('Survey not found');

            return redirect(route('admin.surveys.index'));
        }

        return view('admin.surveys.edit')->with('survey', $survey);
    }

    /**
     * Update the specified Survey in storage.
     *
     * @param  int $id
     * @param UpdateSurveyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSurveyRequest $request)
    {
        $survey = $this->surveyRepository->findWithoutFail($id);

        if (empty($survey)) {
            Flash::error('Survey not found');

            return redirect(route('admin.surveys.index'));
        }

        $survey = $this->surveyRepository->update($request->all(), $id);

        Flash::success('Survey updated successfully.');

        return redirect(route('admin.surveys.index'));
    }

    /**
     * Remove the specified Survey from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $survey = $this->surveyRepository->findWithoutFail($id);

        if (empty($survey)) {
            Flash::error('Survey not found');

            return redirect(route('admin.surveys.index'));
        }

        $this->surveyRepository->delete($id);

        Flash::success('Survey deleted successfully.');

        return redirect(route('admin.surveys.index'));
    }
}
