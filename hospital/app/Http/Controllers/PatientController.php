<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Patient;
use App\Http\Requests\PatientRequest;

class PatientController extends Controller
{
    /*
     *
     */
   public function getAllPatients(){
       $patients = Patient::getByAllPatients();
       return view('hospital.patients.allPatients', ['patients'=>$patients]);
   }
   /*
    *
    */
    public function infoPatient($id){

        $patient = Patient::getAboutPatient($id);

        $visits = Patient::getPatientByVisitDoc($id);

        return view('hospital.patients.index', ['patient'=>$patient, 'visits'=>$visits]);
    }

}
