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

Route::group(['prefix' => 'v1/lbb','middleware' => 'cors'], function () {

    Route::post('login', 'Api\Lbb\AuthController@login');

    Route::get('mainkan', 'Api\Lbb\AuthController@mainkan');

    Route::group(['middleware' => 'jwt'], function () {

        Route::post('check-cookies/{token}', 'Api\Lbb\AuthController@checkCookies');

        Route::resource('lembaga', 'Api\Lbb\TutoringAgencyController');
        Route::get('lembaga/short-profile/{token}', 'Api\Lbb\TutoringAgencyController@shortProfile');

        Route::get('bermain/{bermain}', 'Api\Lbb\AuthController@bermain');
        Route::resource('contact', 'Api\Lbb\ContactController', ['only' => ['show','update']]);

        Route::get('excellence/{tutoring_agency}/datatables', 'Api\Lbb\ExcellenceController@datatablesLoad');
        Route::post('excellence/{tutoring_agency}', 'Api\Lbb\ExcellenceController@store');
        Route::resource('excellence', 'Api\Lbb\ExcellenceController', ['only' => ['edit','update','destroy']]);

        Route::get('facility/{tutoring_agency}/datatables', 'Api\Lbb\FacilityController@datatablesLoad');
        Route::post('facility/{tutoring_agency}', 'Api\Lbb\FacilityController@store');
        Route::resource('facility', 'Api\Lbb\FacilityController', ['only' => ['edit','update','destroy']]);

        Route::get('study-program/{tutoring_agency}/datatables', 'Api\Lbb\StudyProgramController@datatablesLoad');
        Route::post('study-program/{tutoring_agency}', 'Api\Lbb\StudyProgramController@store');
        Route::resource('study-program', 'Api\Lbb\StudyProgramController', ['only' => ['edit','update','destroy']]);

        Route::resource('setup/account-login', 'Api\Lbb\AccountLoginController', ['only' => ['show','update']]);

    });
});

Route::group(['prefix' => 'v1/user', 'middleware' => 'cors'], function () {
    Route::get('lembaga/{slug}', 'Api\User\TutoringAgencyController@show');
    Route::get('list-popular-lembaga', 'Api\User\TutoringAgencyController@showPopularLembaga');

    Route::post('lembaga/{slug}/feedback', 'Api\User\FeedbackController@doFeedback');

    Route::get('lembaga/kategori/{slug}', 'Api\User\TutoringAgencyController@showByCategory');

    Route::get('list-all-lembaga', 'Api\User\TutoringAgencyController@listAllLembaga');

    Route::get('list-category', 'Api\User\CategoryController@listCategory');
    Route::get('category/{slug}', 'Api\User\CategoryController@showByCategory');

    Route::get('list-sub-category', 'Api\User\SubCategoryController@listSubCategory');
    Route::get('sub-category/{slug}', 'Api\User\SubCategoryController@showBySubCategory');

    Route::get('list-alphabet-directory', 'Api\User\DirectoryController@showAlphabetDirectory');
    Route::get('direktori/{alphabet}', 'Api\User\DirectoryController@showDirectoryByOneAlphabet');

    Route::get('search', 'Api\User\SearchController@doSearch');

    Route::post('login', 'Api\User\AuthController@doLogin');
    Route::post('oauth', 'Api\User\AuthController@handleOAuthProvider');
    Route::post('register', 'Api\User\AuthController@doRegister');
    Route::post('reset-password', 'Api\User\AuthController@doResetPassword');
});