<?php

namespace App\models;

use App\models\DoctorPatient;
use App\models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Patient extends Model
{
    protected $fillable = ['photo', 'name', 'birthday', 'address', 'phone', 'email', 'confidant', ];

    /*
    *
    */
    public function doctorPatient(){
        return $this->hasMany(DoctorPatient::class);
    }
    /*
     * ко многим через todo
     */
    public function status(){
        return $this ->hasManyThrough(Status::class, DoctorPatient::class);
    }
    /*
     * ко многим через todo
     */
    public function doctor(){
        return $this ->hasManyThrough(Doctor::class, DoctorPatient::class);
    }

    /*
     *
     */
    public static function getImage($imageUrl)
    {


        $noImage = 'no_image.jpg';
        $path = '/upload/images/patients/';
        $pathToProductImage = $path . $imageUrl;
        if (!file_exists($pathToProductImage)) {
            return $pathToProductImage;
        }

        return '/upload/images/' . $noImage;
    }
}
