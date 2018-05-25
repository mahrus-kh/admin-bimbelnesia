<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('tampilkan/{tutoring_agency}', 'TutoringAgencyController@tampilkan');
Route::get('stem', 'Api\User\FeedbackController@countRating');


Route::middleware('guest')->group(function () {

    Route::get('login', 'AuthController@getLogin')->name('login');
    Route::post('login', 'AuthController@postLogin')->name('auth.postLogin');
});

Route::middleware('auth:admin')->group(function () {

    Route::get('logout', 'AuthController@getLogout')->name('auth.getLogout');

    Route::group(['prefix' => 'institution'], function () {
        Route::get('tutoring-agency/datatables', 'TutoringAgencyController@datatablesLoad')->name('tutoring-agency.datatables');
        Route::resource('tutoring-agency', 'TutoringAgencyController');

        Route::get('tutoring-agency/account/{tutoring_agency}', 'AccountLoginController@show');
        Route::patch('tutoring-agency/account/{account}', 'AccountLoginController@update');

        Route::get('tutoring-agency/contact/{tutoring_agency}', 'ContactController@show');
        Route::patch('tutoring-agency/contact/{contact}', 'ContactController@update');

        Route::get('tutoring-agency/{tutoring_agency}/excellence/datatables', 'ExcellenceController@datatablesLoad')->name('excellence.datatables');
        Route::post('tutoring-agency/excellence/{tutoring_agency}', 'ExcellenceController@store');
        Route::get('tutoring-agency/excellence/{excellence}/edit', 'ExcellenceController@edit');
        Route::patch('tutoring-agency/excellence/{excellence}', 'ExcellenceController@update');
        Route::delete('tutoring-agency/excellence/{excellence}', 'ExcellenceController@destroy');

        Route::get('tutoring-agency/{tutoring_agency}/facility/datatables', 'FacilityController@datatablesLoad')->name('facility.datatables');
        Route::post('tutoring-agency/facility/{tutoring_agency}', 'FacilityController@store')->name('facility.store');
        Route::get('tutoring-agency/facility/{facility}/edit', 'FacilityController@edit')->name('facility.edit');
        Route::patch('tutoring-agency/facility/{facility}', 'FacilityController@update')->name('facility.update');
        Route::delete('tutoring-agency/facility/{facility}', 'FacilityController@destroy')->name('facility.destroy');

        Route::get('tutoring-agency/{tutoring_agency}/study-program/datatables', 'StudyProgramController@datatablesLoad')->name('study-program.datatables');
        Route::post('tutoring-agency/study-program/{tutoring_agency}', 'StudyProgramController@store')->name('study-program.store');
        Route::get('tutoring-agency/study-program/{study_program}/edit', 'StudyProgramController@edit')->name('study-program.edit');
        Route::patch('tutoring-agency/study-program/{study_program}', 'StudyProgramController@update')->name('study-program.update');
        Route::delete('tutoring-agency/study-program/{study_program}', 'StudyProgramController@destroy')->name('study-program.destroy');
    });

    Route::group(['prefix' => 'setup'], function () {
        Route::get('category-sub', 'CategoryController@index')->name('category.sub.index');

        Route::get('category/datatables', 'CategoryController@datatablesLoad')->name('category.datatables');
        Route::resource('category', 'CategoryController');

        Route::get('sub-category/datatables', 'SubCategoryController@datatablesLoad')->name('sub-category.datatables');
        Route::resource('sub-category', 'SubCategoryController');
    });

    Route::group(['prefix' => 'users-visitors'], function () {
        Route::get('user/datatables', 'DataUserController@datatablesLoad')->name('user.datatables');
        Route::resource('user', 'DataUserController');
    });


    Route::group(['prefix' => 'master'], function () {
        Route::get('administrator/admin/datatables', 'AdminController@datatablesLoad')->name('admin.datatables');
        Route::resource('administrator/admin', 'AdminController');
        Route::patch('administrator/admin/{admin}/setting-account', 'AdminController@settingAccount')->name('admin.setting-account');
    });


});


