<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Patient;
use App\models\Card;
use App\Http\Requests;

class CardController
{
    /*
     * New visit
     */
    public function createVisit(){
        return view('hospital.cards.create');
    }
    /*
     * Save new visit
     */
    public function storeVisit(Requests\CardRequest $request){
       // return redirect(route('patients.show', ['patient'=>$patient, 'visits'=>$visits]));
        return 'ok';
    }

}