<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Repositories\MarginalizedSituationRepository;
use App\Repositories\ProjectRepository;
use App\Http\Requests\CreateProjectRequest;
use Flash;

class ProjectsController extends Controller
{
    /** @var  ProjectRepository */
    private $projectRepository;

    /** @var  MarginalizedSituationRepository */
    private $marginalizedSituationRepository;

    public function __construct(ProjectRepository $projectRepo, MarginalizedSituationRepository $marginalizedSituationRepo)
    {
        $this->projectRepository = $projectRepo;

        $this->marginalizedSituationRepository = $marginalizedSituationRepo;

    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        $project = $this->projectRepository->create($input);

        Flash::success('Project saved successfully.');

        return response()->json(collect(['id'=>$project->id,'sp_id'=>$project->service_provider_id]));
    }
}
