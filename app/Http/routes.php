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

Route::get('/test', function () {
    return view('user_profile');
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

Route::get('/home', 'HomeController@index');

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


Route::resource('users', 'UserController');

Route::resource('sectors', 'SectorController');

Route::resource('serviceTypes', 'ServiceTypeController');

Route::resource('serviceProviders', 'ServiceProviderController');

Route::resource('serviceProviderTypes', 'ServiceProviderTypeController');

Route::resource('locationMetas', 'LocationMetaController');

Route::resource('areas', 'AreaController');

Route::resource('cities', 'CityController');

Route::resource('districts', 'DistrictController');

Route::resource('streets', 'StreetController');

Route::resource('services', 'ServiceController');

Route::resource('marginalizedSituations', 'MarginalizedSituationController');

Route::resource('projects', 'ProjectController');

Route::resource('surveyMetas', 'SurveyMetasController');

Route::resource('surveys', 'SurveyController');

Route::resource('questions', 'QuestionController');

Route::resource('answers', 'AnswerController');

Route::resource('services', 'ServiceController');

Route::resource('serviceRequests', 'ServiceRequestsController');


