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

Route::group(['prefix' => 'v1/lbb'], function () {

    Route::resource('lembaga', 'Api\Lbb\TutoringAgencyController');
    Route::resource('contact', 'Api\Lbb\ContactController', ['only' => ['show','update']]);

    Route::get('pelayanan-lembaga/{tutoring_agency}', 'Api\Lbb\PelayananLembagaController@show');

    Route::resource('excellence', 'Api\Lbb\ExcellenceController', ['only' => ['store','edit','update','destroy']]);
    Route::resource('facility', 'Api\Lbb\FacilityController', ['only' => ['store','edit','update','destroy']]);
    Route::resource('study-program', 'Api\Lbb\StudyProgramController', ['only' => ['store','edit','update','destroy']]);

    Route::post('login', 'Api\Lbb\AuthController@login');
    Route::get('belajar', 'Api\Lbb\AuthController@belajar')->name('register');

});

Route::group(['prefix' => 'v1/user'], function () {
    Route::get('user', 'Api\User\ExampleController@index');
});