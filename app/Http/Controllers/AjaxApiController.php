<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use App\Repositories\DistrictRepository;
use App\Repositories\StreetRepository;
use App\Repositories\ServiceTypeRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SurveyRepository;
use App\Repositories\QuestionRepository;
use function response;

class AjaxApiController extends Controller {

    /** @var  CityRepository */
    private $cityRepository;

    /** @var  DistrictRepository */
    private $districtRepository;

    /** @var  StreetRepository */
    private $streetRepository;

    /** @var  ServiceTypeRepository */
    private $serviceTypeRepository;

    /** @var  ProjectRepository */
    private $projectRepository;

    /** @var  SurveyRepository */
    private $surveyRepository;

    /** @var  QuestionRepository */
    private $questionRepository;

    public function __construct(CityRepository $cityRepo, DistrictRepository $districtRepo, StreetRepository $streetRepo, ServiceTypeRepository $serviceTypeRepo,ProjectRepository $projectRepo,SurveyRepository $surveyRepo,QuestionRepository $questionRepo) {
        $this->cityRepository = $cityRepo;
        $this->districtRepository = $districtRepo;
        $this->streetRepository = $streetRepo;
        $this->serviceTypeRepository = $serviceTypeRepo;
        $this->projectRepository = $projectRepo;
        $this->surveyRepository=$surveyRepo;
        $this->questionRepository = $questionRepo;

    }

    public function cities($area_id) {
        $cities = $this->cityRepository->findByField('area_id', $area_id, array('id', 'name'));
        return response()->json($cities);
    }

    public function districts($city_id) {
        $districts = $this->districtRepository->findByField('city_id', $city_id, array('id', 'name'));
        return response()->json($districts);
    }

    public function streets($district_id) {
        $streets = $this->streetRepository->findByField('district_id', $district_id, array('id', 'name'));
        return response()->json($streets);
    }

    public function serviceTypes($sector_id) {
        $serviceTypes = $this->serviceTypeRepository->findByField('sector_id', $sector_id, array('id', 'name'));
        return response()->json($serviceTypes);
    }
    public function projects($service_provider_id) {
        $projects = $this->projectRepository->findByField('service_provider_id', $service_provider_id, array('id', 'name'));
        return response()->json($projects);
    }
    public function surveys($project_id) {
        $surveys = $this->surveyRepository->findByField('project_id', $project_id, array('id', 'subject'));
        return response()->json($surveys);
    }
    public function questions($survey_id) {
        $questions = $this->questionRepository->findByField('survey_id', $survey_id, array('id', 'body'));
        return response()->json($questions);
    }

}
