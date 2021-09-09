<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Status;
use App\models\Examination;
use App\models\Doctor;
use App\models\Patient;

class DoctorPatient extends Model
{
    protected $fillable = ['patient_id', 'doctor_id', 'examination_id', 'conclusion','treatment', 'date', 'status_id',];

/*
 *
 */
    public function status(){
        return $this->belongsTo(Status::class);
    }
    /*
 *
 */
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    /*
     *
     */
    public function examination(){
        return $this->belongsTo(Examination::class);
    }
    /*
 *
 */
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
