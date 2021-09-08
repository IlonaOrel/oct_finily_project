<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DoctorPatient extends Model
{
    protected $fillable = ['patient_id', 'doctor_id', 'examination_id', 'conclusion','treatment', 'date', 'status_id',];



}
