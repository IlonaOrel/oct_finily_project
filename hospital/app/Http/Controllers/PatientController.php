<?php

namespace App\Http\Controllers;

use App\models\DoctorPatient;
use Illuminate\Http\Request;
use App\models\Patient;
use App\Http\Requests\PatientRequest;

class PatientController extends Controller
{
    /*
     *Отображение всех пациентов клиники
     */
     public function getAllPatients(){
        $patients=Patient::all();
        return view('hospital.patients.allPatients', ['patients'=>$patients]);
   }
   /*
    *Отображение карточки пациента. Все его данные и все визиты в больницу
    */
    public function showPatient($id){

        $patient = Patient::find($id);
        $visits = DoctorPatient::with('status', 'doctor', 'patient')->where('patient_id', $id)->get();
        return view('hospital.patients.index', ['patient'=>$patient, 'visits'=>$visits]);
    }
    /*
     * Создание карточки пациента
     */
    public function createPatient(){
        return view('hospital.patients.create');
    }
    /*
     * Сохранение данных пациента
     */
    public function storePatient(PatientRequest $request){
        $patient = new Patient();
        $patient->photo = $request->photo;
        $patient->name = $request->name;
        $patient->birthday = $request->birthday;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->email = $request->email;
        $patient->confidant = $request->confidant;
        $patient->save();
        $visits = null;
        return redirect(route('patients.show', ['patient'=>$patient, 'visits'=>$visits]));
    }
    /*
     * Редактирование данных пациента
     */
     public function editPatient($id){
         $patient=Patient::find($id);
         return view('hospital.patients.edit', ['patient'=>$patient]);
     }
    /*
     * Сохранение отредактированых данных
     */
    public function updatePatient($id, PatientRequest $request){
        $patientEdit = Patient::find($id);
        if ($request->photo!==''){
            $patientEdit->photo = $request->photo;
        }
        $patientEdit->name = $request->name;
        $patientEdit->birthday = $request->birthday;
        $patientEdit->address = $request->address;
        $patientEdit->phone = $request->phone;
        $patientEdit->email = $request->email;
        $patientEdit->confidant = $request->confidant;
        $patientEdit->save();
        $visits = DoctorPatient::with('status', 'doctor', 'patient')->where('patient_id', $id)->get();
        return redirect(route('patients.show', ['patient'=>$patientEdit, 'visits'=>$visits]));
    }


}
