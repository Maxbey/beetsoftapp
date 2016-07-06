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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'AngularController@serveApp');

    Route::get('/unsupported-browser', 'AngularController@unsupported');

});

//public API routes
$api->group(['middleware' => ['api']], function ($api) {

    // Authentication Routes...
    $api->post('auth/login', 'Auth\AuthController@login');
    $api->post('auth/register', 'Auth\AuthController@register');

    $api->get('files/{link}', 'FilesController@show');
    $api->get('im', 'StatisticsController@index');
    $api->get('files/{link}/download', 'FilesController@download');

});

//protected API routes with JWT (must be logged in)
$api->group(['middleware' => ['api', 'api.auth']], function ($api) {

});

Route::post('api/files', 'FilesController@store');