<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'v1/lbb', 'middleware' => 'cors'], function () {

    Route::resource('lembaga', 'Api\Lbb\TutoringAgencyController');
//    Route::resource('contact', 'Api\Lbb\ContactController', ['only' => ['show','update']]);

    Route::get('excellence/{tutoring_agency}/datatables', 'Api\Lbb\ExcellenceController@datatablesLoad');
    Route::post('excellence/{tutoring_agency}', 'Api\Lbb\ExcellenceController@store');
    Route::resource('excellence', 'Api\Lbb\ExcellenceController', ['only' => ['edit','update','destroy']]);

    Route::get('facility/{tutoring_agency}/datatables', 'Api\Lbb\FacilityController@datatablesLoad');
    Route::post('facility/{tutoring_agency}', 'Api\Lbb\FacilityController@store');
    Route::resource('facility', 'Api\Lbb\FacilityController', ['only' => ['edit','update','destroy']]);

    Route::get('study-program/{tutoring_agency}/datatables', 'Api\Lbb\StudyProgramController@datatablesLoad');
    Route::post('study-program/{tutoring_agency}', 'Api\Lbb\StudyProgramController@store');
    Route::resource('study-program', 'Api\Lbb\StudyProgramController', ['only' => ['edit','update','destroy']]);


    Route::post('login', 'Api\Lbb\AuthController@login');

    Route::get('mainkan', 'Api\Lbb\AuthController@mainkan');
    Route::group(['middleware' => 'jwt'], function () {
        Route::get('bermain/{bermain}', 'Api\Lbb\AuthController@bermain');
        Route::resource('contact', 'Api\Lbb\ContactController', ['only' => ['show','update']]);
    });

});

Route::group(['prefix' => 'v1/user'], function () {
    Route::get('user', 'Api\User\ExampleController@index');
});