<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Doctor;

class Specialization extends Model
{
    protected $fillable = ['name', ];

    public function doctor(){
        return $this->hasMany(Doctor::class);
    }

}
