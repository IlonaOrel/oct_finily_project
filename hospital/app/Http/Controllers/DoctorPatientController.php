<?php


namespace App\Http\Controllers;

use App\models\Doctor;
use App\models\Examination;
use App\models\Status;
use Illuminate\Http\Request;
use App\models\Patient;
use App\models\DoctorPatient;
use App\Http\Requests;
use App\Http\Requests\CardRequest;

class DoctorPatientController extends Controller
{
    /*
     * Создаем новый визит в карточке пациента
     */
    public function createVisit(){
        $patients = Patient::all();
        $doctors = Doctor::all();
        $examinations = Examination::all();
        $statuses = Status::all();
        return view('hospital.cards.create', ['patients'=>$patients, 'doctors'=>$doctors, 'examinations'=>$examinations, 'statuses'=>$statuses]);
    }
    /*
     * Сохраняем данные о новом визите в карточке пациента
     */
    public function storeVisit(CardRequest $request){

        $card = new DoctorPatient();
        $card->patient_id = $request->patient_id;
        $card->doctor_id = $request->doctor_id;
        $card->examination_id = $request->examination_id;
        $card->conclusion = $request->conclusion;
        $card->treatment = $request->treatment;
        $card->date_visit = $request->date_visit;
        $card->status_id = $request->status_id;
        $card->save();
        $patientId = $request->patient_id;
        $patient= Patient::find($patientId);
        $visits = DoctorPatient::with('status', 'doctor', 'patient')->where('patient_id', $patientId)->get();
        return redirect(route('patients.show', ['patient'=>$patient, 'visits'=>$visits]));
    }
    /*
     * Редактируем данные о новом визите в карточке пациента
     */
    public function editVisit($id){
        $card = DoctorPatient::with('doctor', 'patient', 'examination', 'status')->find($id);
        $examinations = Examination::all();
        $statuses = Status::all();
        return view ('hospital.cards.edit', ['card'=>$card, 'examinations'=>$examinations, 'statuses'=>$statuses]);
    }
    /*
     * Обновляем данные о новом визите в карточке пациента
     */
    public function updateVisit($id, CardRequest $request){
        $cardEdit=DoctorPatient::find($id);
        if ($request->date_visit!==''){
            $cardEdit->date_visit = $request->date_visit;
        }
        $cardEdit->patient_id = $request->patient_id;
        $cardEdit->doctor_id = $request->doctor_id;
        $cardEdit->examination_id = $request->examination_id;
        $cardEdit->conclusion = $request->conclusion;
        $cardEdit->treatment = $request->treatment;
        $cardEdit->status_id = $request->status_id;
        $cardEdit->save();
        $patientId = $request->patient_id;
        $patient= Patient::find($patientId);
        $visits = DoctorPatient::with('status', 'doctor', 'patient')->where('patient_id', $patientId)->get();
        return redirect(route('patients.show', ['patient'=>$patient, 'visits'=>$visits]));

    }
}