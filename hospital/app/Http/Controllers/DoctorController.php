<?php

namespace App\Http\Controllers;

use App\models\Doctor;
use App\models\DoctorPatient;
use App\models\Patient;
use App\models\Specialization;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\docRequest;
use Auth;



class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isDoctor');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd( Auth::guard('doctor')->user());
    }

    /*
     *Получаем всех докторов больницы
     */

   public function getAllDoctors(){
       $doctors = Doctor::with('specialization')->get();
       return view('hospital.allDoctors',['doctors'=>$doctors]);
   }
   /*
    *Получаем информацию об обном докторе
    */
   public function showDoctor($id){
       $doctor = Doctor::find($id);
       $patients = DoctorPatient::with('status', 'doctor', 'patient')->where('doctor_id', $id)->get();
       return view('hospital.doctors.index',['doctor'=>$doctor, 'patients'=>$patients]);
   }
//   /*
//    *Создаем нового доктора
//    */
//   public function createDoctor(){
//       $specializations = Specialization::all();
//       return view('hospital.doctors.create', ['specializations'=>$specializations]);
//   }
//   /*
//    *Сохраняем данные о докторе
//    */
//   public function storeDoctor(DoctorRequest $request){
//       $doctor = new Doctor();
//       $doctor->photo = $request->photo;
//       $doctor->name = $request->name;
//       $doctor->phone = $request->phone;
//       $doctor->email = $request->email;
//       $doctor->specialization_id = $request->specialization_id;
//       $doctor->password = $request->password;
//       $doctor->save();
//       return view('hospital.index');
//
//   }
   /*
    *Редактируем данные о докторе
    */
    public function editDoctor($id){
        $doctor = Doctor::find($id);
        $specializations = Specialization::all();
        return view('hospital.doctors.edit', ['doctor'=>$doctor, 'specializations'=>$specializations]);
    }
    /*
     *Обновляем данные о докторе
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
