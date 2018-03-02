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

Route::get('home', function(){
    return view('templates.default');
})->name('home');

Route::resource('institution/tutoring-agency', 'TutoringAgencyController');
Route::patch('institution/tutoring-agency/contact/{contact}', 'ContactController@update')->name('tutoring-agency.contact.update');

Route::get('institution/tutoring-agency/{tutoring_agency}/edit-more', 'TutoringAgencyController@edit_more')->name('tutoring-agency.edit-more');

Route::resource('institution/tutoring-agency/{tutoring_agency}/excellence', 'ExcellenceController');
Route::resource('institution/tutoring-agency/{tutoring_agency}/facility', 'FacilityController');
Route::resource('institution/tutoring-agency/{tutoring_agency}/study-program', 'StudyProgramController');