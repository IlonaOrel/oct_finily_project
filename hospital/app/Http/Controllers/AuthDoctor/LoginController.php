<?php

namespace App\Http\Controllers\AuthDoctor;

use App\models\Doctor;
use App\models\Specialization;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DoctorController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Auth;


class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/doctors';
    protected $redirectAfterLogout = '/doctors';
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function showLoginForm()
    {
        return view('doctor.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('doctor');
    }

    /*
   *Создаем нового доктора
   */
    public function createDoctor(){
        $specializations = Specialization::all();
        return view('hospital.doctors.create', ['specializations'=>$specializations]);
    }
    /*
     *Сохраняем данные о докторе
     */
    public function storeDoctor(DoctorRequest $request){
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

}
