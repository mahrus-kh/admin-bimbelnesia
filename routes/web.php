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
    return view('welcome');
});

Route::middleware('guest')->group(function (){
    Route::get('login', 'AuthController@getLogin')->name('login');
    Route::post('login', 'AuthController@postLogin')->name('auth.postLogin');
});

Route::middleware('auth')->group(function (){
    Route::get('logout', 'AuthController@getLogout')->name('auth.getLogout');

    Route::get('institution/tutoring-agency/datatables', 'TutoringAgencyController@datatablesLoad')->name('tutoring-agency.datatables');
    Route::resource('institution/tutoring-agency', 'TutoringAgencyController');

    Route::get('institution/tutoring-agency/account/{tutoring_agency}', 'AccountLoginController@show');
    Route::patch('institution/tutoring-agency/account/{account}', 'AccountLoginController@update');

    Route::get('institution/tutoring-agency/contact/{tutoring_agency}', 'ContactController@show');
    Route::patch('institution/tutoring-agency/contact/{contact}', 'ContactController@update');

    Route::get('institution/tutoring-agency/{tutoring_agency}/excellence/datatables', 'ExcellenceController@datatablesLoad')->name('excellence.datatables');
    Route::post('institution/tutoring-agency/excellence/{tutoring_agency}', 'ExcellenceController@store')->name('excellence.store');
    Route::get('institution/tutoring-agency/excellence/{excellence}/edit', 'ExcellenceController@edit')->name('excellence.edit');
    Route::patch('institution/tutoring-agency/excellence/{excellence}', 'ExcellenceController@update')->name('excellence.update');
    Route::delete('institution/tutoring-agency/excellence/{excellence}', 'ExcellenceController@destroy')->name('excellence.destroy');

    Route::get('institution/tutoring-agency/{tutoring_agency}/facility/datatables', 'FacilityController@datatablesLoad')->name('facility.datatables');
    Route::post('institution/tutoring-agency/facility/{tutoring_agency}', 'FacilityController@store')->name('facility.store');
    Route::get('institution/tutoring-agency/facility/{facility}/edit', 'FacilityController@edit')->name('facility.edit');
    Route::patch('institution/tutoring-agency/facility/{facility}', 'FacilityController@update')->name('facility.update');
    Route::delete('institution/tutoring-agency/facility/{facility}', 'FacilityController@destroy')->name('facility.destroy');

    Route::get('institution/tutoring-agency/{tutoring_agency}/study-program/datatables', 'StudyProgramController@datatablesLoad')->name('study-program.datatables');
    Route::post('institution/tutoring-agency/study-program/{tutoring_agency}', 'StudyProgramController@store')->name('study-program.store');
    Route::get('institution/tutoring-agency/study-program/{study_program}/edit', 'StudyProgramController@edit')->name('study-program.edit');
    Route::patch('institution/tutoring-agency/study-program/{study_program}', 'StudyProgramController@update')->name('study-program.update');
    Route::delete('institution/tutoring-agency/study-program/{study_program}', 'StudyProgramController@destroy')->name('study-program.destroy');

    Route::get('setup/category-sub', 'CategoryController@index')->name('category.sub.index');

    Route::get('setup/category/datatables', 'CategoryController@datatablesLoad')->name('category.datatables');
    Route::resource('setup/category', 'CategoryController');

    Route::get('setup/sub-category/datatables', 'SubCategoryController@datatablesLoad')->name('sub-category.datatables');
    Route::resource('setup/sub-category', 'SubCategoryController');

    Route::get('users-visitors/user/datatables', 'DataUserController@datatablesLoad')->name('user.datatables');
    Route::resource('users-visitors/user', 'DataUserController');

    Route::get('master/administrator/admin/datatables', 'AdminController@datatablesLoad')->name('admin.datatables');
    Route::resource('master/administrator/admin', 'AdminController');
    Route::patch('master/administrator/admin/{admin}/setting-account', 'AdminController@settingAccount')->name('admin.setting-account');


});


