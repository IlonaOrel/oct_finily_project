<?php

//Route::auth();

//Route::get('/home', 'HomeController@index');


Route::get('/', 'HospitalController@index')->name('hospital.home');

Route::get('/hospital/about', 'HospitalController@getAbout')->name('hospital.about');

Route::get('/hospital/contact', 'HospitalController@getContact')->name('hospital.contact');

Route::get('/hospital/doctors', 'DoctorController@getAllDoctors')->name('hospital.doctors');
//=======================================================
Route::group(['middleware' => 'doctor'], function() {

});

//================================= Маршруты регистрации...
Route::get('/register', 'AuthDoctor\LoginController@createDoctor')->name('doctors.create');
Route::post('/doctors', 'AuthDoctor\LoginController@storeDoctor')->name('doctors.store');

//============================= Маршруты аутентификации...
//Route::get('/doctor','DoctorController@index');
Route::get('/doctors/{doctor}', 'DoctorController@showDoctor')->name('doctors.show');

Route::get('/doctor/login',['as' => 'doctor.login','uses' => 'AuthDoctor\LoginController@showLoginForm']);

Route::post('/doctor/login',['uses' => 'AuthDoctor\LoginController@login']);

Route::get('/doctor/logout',['as' => 'doctor.logout','uses' => 'AuthDoctor\LoginController@logout']);

//================doctors=============================

//Route::get('auth/register', 'Auth\AuthController@getRegister');

//Route::get('/register', 'DoctorController@createDoctor')->name('doctors.create');

//Route::post('/doctors', 'DoctorController@storeDoctor')->name('doctors.store');

//Route::get('/doctors/{doctor}', 'DoctorController@showDoctor')->name('doctors.show');

Route::get('/doctors/{doctor}/edit', 'DoctorController@editDoctor')->name('doctors.edit');

Route::patch('/doctors/{doctor}', 'DoctorController@updateDoctor')->name('doctors.update');

//=============patients===================================
Route::get('/doctors/{doctor}/patients', 'PatientController@getAllPatients')->name('hospital.patients');

Route::get('/doctors/{doctor}/patients/{patient}', 'PatientController@showPatient')->name('patients.show');

Route::get('/doctors/{doctor}/patients/create', 'PatientController@createPatient')->name('patients.create');

Route::post('/doctors/{doctor}/patients', 'PatientController@storePatient')->name('patients.store');

Route::get('/doctors/{doctor}/patients/{patient}/edit', 'PatientController@editPatient')->name('patients.edit');

Route::patch('/doctors/{doctor}/patients/{patient}', 'PatientController@updatePatient')->name('patients.update');

//===============================cards=======================
Route::get('/doctors/{doctor}/patients/{patient}/cards/create', 'DoctorPatientController@createVisit')->name('cards.create');

Route::post('/doctors/{doctor}/patients/{patient}/cards', 'DoctorPatientController@storeVisit')->name('cards.store');

Route::get('/doctors/{doctor}/patients/{patient}/cards/{card}/edit', 'DoctorPatientController@editVisit')->name('cards.edit');

Route::patch('/doctors/{doctor}/patients/{patient}/cards/{card}', 'DoctorPatientController@updateVisit')->name('cards.update');














