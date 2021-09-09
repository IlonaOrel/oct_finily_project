<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\DoctorPatient;

class Examination extends Model
{
    protected $fillable = ['name',];

    /*
    *
    */
    public function doctorPatient(){
        return $this->hasMany(DoctorPatient::class);
    }
}
