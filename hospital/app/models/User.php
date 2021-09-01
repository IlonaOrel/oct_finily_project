<?php

namespace App\model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo','name', 'phone', 'email', 'specializations', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getByAll(){
        $doctors = DB::table('users')
            ->join('specializations', 'users.specialization_id', '=', 'specializations.id')
            ->select('users.id','users.name as doctor name','users.photo','users.phone','users.email','specializations.name as specialization')
            ->get();
        return $doctors;
    }
}
