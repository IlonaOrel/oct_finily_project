<?php

namespace App\Http\Controllers;

use App\models\Doctor;
use App\models\Patient;
use App\models\Specialization;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\docRequest;



class DoctorController extends Controller
{
    /*
     *
     */

   public function getAllDoctors(){
       $doctors = Doctor::with('specialization')->get();
       dd($doctors);
       return view('hospital.allDoctors',['doctors'=>$doctors]);
   }
   /*
    *
    */
   public function infoDoctor($id){
       $doctor = Doctor::find($id);

       $patients = Patient::getPatientByDoctor($id);

       return view('hospital.doctors.index',['doctor'=>$doctor, 'patients'=>$patients]);
   }
   /*
    *
    */
   public function formByDoc(){
       $specializations = Specialization::all();
       return view('hospital.doctors.create', ['specializations'=>$specializations]);
   }
   /*
    *
    */
   public function createDoctor(DoctorRequest $request){
       $doctor = new Doctor();
       $doctor->photo = $request->photo;
       $doctor->name = $request->name;
       $doctor->phone = $request->phone;
       $doctor->email = $request->email;
       $doctor->specialization_id = $request->specialization_id;
       $doctor->password = $request->password;
       $doctor->save();
       return view('hospital.index');

   }
   /*
    *
    */
    public function editDoctor($id){
        $doctor = Doctor::find($id);
        $specializations = Specialization::all();
        return view('hospital.doctors.edit', ['doctor'=>$doctor, 'specializations'=>$specializations]);
    }
    /*
     *
     */
    public function updateDoctor($id, docRequest $request){

        $doctorEdit = Doctor::find($id);
        $doctorEdit->photo = $request->photo;
        $doctorEdit->name = $request->name;
        $doctorEdit->phone = $request->phone;
        $doctorEdit->specialization_id = $request->specialization;
        $doctorEdit->password = $request->password;
        $doctorEdit->save();
        return redirect(route('doctors.show', $id));
    }

}
