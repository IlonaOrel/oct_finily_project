<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\models\DoctorPatient;
use App\models\Status;

class Patient extends Model
{
    protected $fillable = ['photo','name', 'birthday', 'address', 'phone', 'email', 'confidant', ];

    /*
    *
    */
    public function doctorPatient(){
        return $this->hasMany(DoctorPatient::class);
    }
    /*
     * ко многим через
     */
    public function status(){
        return $this ->hasManyThrough(Patient::class, Status::class);
    }
/*
 *
 */
    public static function getByAllPatients()
    {
        $patients = DB::table('doctor_patients')
            ->join('doctors', 'doctor_patients.doctor_id', '=', 'doctors.id')
            ->join('patients', 'doctor_patients.patient_id', '=', 'patients.id')
            ->join('statuses', 'doctor_patients.status_id', '=', 'statuses.id')
            ->select('patients.id','patients.photo', 'patients.name as name', 'patients.birthday', 'doctors.id as doc', 'doctors.name as doctor ','statuses.name as status')
            ->get();

        return $patients;
    }
    /*
     *
     */
    public static function getPatientByDoctor($id){

        $patients = DB::table('doctor_patients')
            ->join('patients', 'doctor_patients.patient_id', '=', 'patients.id')
            ->join('statuses', 'doctor_patients.status_id', '=', 'statuses.id')
            ->where('doctor_patients.doctor_id', '=', $id)
            ->select('patients.id','patients.photo', 'patients.name as name', 'patients.birthday', 'statuses.name as status')
            ->get();

        return $patients;
    }
    /*
     *
     */
    public static function getPatientByVisitDoc($id){

        $visits = DB::table('doctor_patients')
            ->join('patients', 'doctor_patients.patient_id', '=', 'patients.id')
            ->join('examinations', 'doctor_patients.examination_id', '=', 'examinations.id')
            ->join('status', 'doctor_patients.status_id', '=', 'status.id')
            ->where('doctor_patients.patient_id', '=', $id)
            ->select('doctor_patients.date_visit as date', 'doctor_patients.conclusion', 'doctor_patients.treatment', 'status.name as status','examinations.name as examination')
            ->get();

        return $visits;
    }
    /*
     *
     */
    public static function getAboutPatient($id){
        $patient = DB::table('patients')
            ->where('patients.id', '=', $id)
            ->select('patients.id','patients.photo', 'patients.name as name', 'patients.birthday', 'patients.address', 'patients.phone','patients.email','patients.confidant')
            ->get();

        return $patient;
    }
    /*
     *
     */
    public static function getImage($imageUrl)
    {

        $noImage = 'no_image.jpg';
        $path = '/upload/images/patients/';
        $pathToProductImage = $path . $imageUrl;

        if (file_exists($pathToProductImage)) {
            return $pathToProductImage;
        }

        return '/upload/images/' . $noImage;
    }
}
