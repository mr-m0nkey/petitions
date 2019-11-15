<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Petition;

class PetitionController extends Controller
{

    //TODO use constant to store petition view
    
    public function getFeaturedPetition() {
        $featuredPetitionId = Settings::first()->featured_petition;
        $petition = Petition::find($featuredPetitionId);
        if($petition == null) {
            $petition = Petition::first();
        }
        return view('petition', ['petition' => $petition]);
    }

    public function getAllPetitions() {
        
    }

    public function upvotePetition(Request $request) {

    }

    public function downvotePetition(Request $request) {

    }

    public function updatePetiton(Request $request) {

    }

    public function deletePetition($id) {

    }




}
