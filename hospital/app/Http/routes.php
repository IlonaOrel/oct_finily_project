<?php

Route::auth();

Route::get('/', 'HospitalController@index')->name('hospital.home');

Route::get('/about', 'HospitalController@getAbout')->name('hospital.about');

Route::get('/contact', 'HospitalController@getContact')->name('hospital.contact');

//================doctors=============================

Route::get('/doctors', 'DoctorController@getAllDoctors')->name('hospital.doctors');

Route::get('/register', 'DoctorController@createDoctor')->name('doctors.create');

Route::post('/doctors', 'DoctorController@storeDoctor')->name('doctors.store');

Route::get('/doctors/{doctor}', 'DoctorController@showDoctor')->name('doctors.show');

Route::get('/doctors/{doctor}/edit', 'DoctorController@editDoctor')->name('doctors.edit');

Route::patch('/doctors/{doctor}', 'DoctorController@updateDoctor')->name('doctors.update');

//=============patients===================================
Route::get('/patients', 'PatientController@getAllPatients')->name('hospital.patients');

Route::get('/patients/{patient}', 'PatientController@showPatient')->name('patients.show');

Route::get('/patients/create', 'PatientController@createPatient')->name('patients.create');

Route::post('/patients', 'PatientController@storePatient')->name('patients.store');

Route::get('/patients/{patient}/edit', 'PatientController@editPatient')->name('patients.edit');

Route::patch('/patients/{patient}', 'PatientController@updatePatient')->name('patients.update');

//===============================cards=======================
Route::get('/cards/create', 'CardController@createVisit')->name('cards.create');

Route::post('/cards', 'PatientController@storeVisit')->name('cards.store');













