<?php

namespace App\Http\Controllers\Surveys;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConfigRequest;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\CreateSurveyRequest;
use App\Models\Survey;
use App\Repositories\ConfigRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ServiceProviderRepository;
use App\Repositories\SurveyRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\AnswerRepository;
use App\Repositories\UserRepository;
use App\Http\Requests;
use Flash;
use Response;


class SurveysController extends Controller
{
    /** @var  SurveyRepository */
    private $surveyRepository;

    /** @var  ServiceProviderRepository */
    private $serviceProviderRepository;

    /** @var  ProjectRepository */
    private $projectRepository;

    /** @var  QuestionRepository */
    private $questionRepository;

    /** @var  AnswerRepository */
    private $answerRepository;

    /** @var  UsersRepository */
    private $userRepository;

    /** @var  ConfigRepository */
    private $configRepository;

    public function __construct(SurveyRepository $surveyRepo, ServiceProviderRepository $serviceProviderRepo, ProjectRepository $projectRepo, QuestionRepository $questionRepo, AnswerRepository $answerRepo, UserRepository $userRepo, ConfigRepository $configRepo)
    {
        $this->middleware('auth');
        $this->surveyRepository = $surveyRepo;
        $this->serviceProviderRepository = $serviceProviderRepo;
        $this->projectRepository = $projectRepo;
        $this->questionRepository = $questionRepo;
        $this->answerRepository = $answerRepo;
        $this->userRepository = $userRepo;
        $this->configRepositor = $configRepo;
    }

    public function create()
    {

        return view("surveys.complete", [
            'projects' => $this->projectRepository->all()->lists('name', 'id')->toarray(),
            'serviceProviders' => $this->serviceProviderRepository->all()->lists('name', 'id')->toarray(),
            'surveys' => $this->surveyRepository->all()->lists('subject', 'id')->toarray(),
            "user_attrs" => $this->userRepository->getFieldsSearchable()

        ]);
    }

    public function storeSurvey(CreateSurveyRequest $request)
    {
        $input = $request->all();
        $survey = $this->surveyRepository->create($input);
        Flash::success('Survey saved successfully.');
        return response()->json(collect(["id" => $survey->id]));
    }

    public function storeQuestions(CreateQuestionRequest $request)
    {
        $input = $request->all();
        $question = $this->questionRepository->create($input);
        $input['answer'] = array_filter($input['answer']);
        $input['order'] = array_filter($input['order']);

        foreach ($input['answer'] as $key => $val) {
            $this->answerRepository->create(
                array(
                    "question_id" => $question->id,
                    "order" => (isset($input['order'][$key])) ? $input['order'][$key] : 1,
                    "answer" => $input['answer'][$key]
                ));
        }
        Flash::success('Survey saved successfully.');
        return response()->json(collect(["id" => $question->id]));
    }

    public function storeConfig(CreateConfigRequest $request)
    {
        $input = $request->all();

       return $config = $this->configRepositor->create([
            "operator"=>$input["operator"],
            "user_attr_name"=>$input["user_attr_name"],
            "coefficient"=>$input["coefficient"]
        ])->surveys()->attach($input['survey_id']);

    }
}
