<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HospitalController extends Controller
{
    public function index(){
        return view('hospital.index');
    }
    public function getAbout(){
        return view('hospital.about');
    }

    public function getContact(){
        return view('hospital.contact');
    }
}
