<?php
Route::auth();

Route::get('/', 'HospitalController@index')->name('hospital.home');

Route::get('/about', 'HospitalController@getAbout')->name('hospital.about');

Route::get('/contact', 'HospitalController@getContact')->name('hospital.contact');


//================doctors=============================

Route::get('/doctors', 'DoctorController@getAllDoctors')->name('hospital.doctors');

Route::get('/register', 'DoctorController@formByDoc')->name('doctors.create');

Route::post('/doctors', 'DoctorController@createDoctor')->name('doctors.store');

Route::get('/doctors/{doctor}', 'DoctorController@infoDoctor')->name('doctors.show');//todo написать запрос

Route::get('/doctors/{doctor}/edit', 'DoctorController@editDoctor')->name('doctors.edit');

Route::patch('/doctors/{doctor}', 'DoctorController@updateDoctor')->name('doctors.update');

//=============patients===================================
Route::get('/patients', 'PatientController@getAllPatients')->name('hospital.patients');

Route::get('/patients/{patient}', 'PatientController@infoPatient')->name('patients.show');




Route::get('/patients/create', function (){
    return view('hospital.patients.create');
})->name('patients.create');

Route::post('/patients', function (\App\Http\Requests\Request $request){
    $validator = Validator::make($request->all(), [
        'photo' => 'image| dimensions:min_width=100,min_height=200',
        'name' => 'required|max:255',
        'birthday'=>'before:date 01/01/2015',
        'address'=>'required|max:255',
        'phone' => 'required|min:7',
        'email' => 'required|email|max:255|unique:users',
        'cinfidant'=>'json',
    ]);

    if ($validator->fails()) {
        return redirect(route('patients.create'))
            ->withInput()
            ->withErrors($validator);
    }
    $patient = new \App\Models\Patient();
    $patient->photo = $validator->photo;
    $patient->name = $request->name;
    $patient->birthday = $request->birthday;
    $patient->address = $request->address;
    $patient->phone = $request->phone;
    $patient->email = $request->email;
    $patient->cinfidant = $request->cinfidant;
    $patient->save();
    return view('hospital.patients.index');
})->name('patients.store');

Route::get('/patients/{patient}/edit', function (\App\Models\Patient $patient){
    return view('hospital.patients.edit', ['patient'=>$patient]);
})->name('patients.edit');

Route::patch('/patients/{patient}', function (\App\Models\Patient $patient, Request $request){
    $validator = Validator::make($request->all(), [
        'photo' => 'image| dimensions:min_width=100,min_height=200',
        'name' => 'required|max:255',
        'birthday'=>'before:date 01/01/2015',
        'address'=>'required|max:255',
        'phone' => 'required|min:7',
        'email' => 'required|email|max:255|unique:users',
        'cinfidant'=>'json',
    ]);

    if ($validator->fails()) {
        return redirect(route('patients.edit'))
            ->withInput()
            ->withErrors($validator);
    }
    $patientEdit =  \App\Models\Patient::find($patient);

    $patientEdit->photo = $validator->photo;
    $patientEdit->name = $request->name;
    $patientEdit->birthday = $request->birthday;
    $patientEdit->address = $request->address;
    $patientEdit->phone = $request->phone;
    $patientEdit->email = $request->email;
    $patientEdit->cinfidant = $request->cinfidant;
    $patientEdit->save();
    return redirect(route('hospital.patients.index'));
})->name('patients.update');














