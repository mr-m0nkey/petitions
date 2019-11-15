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

        $hasVoted = false;
        //TODO get hasVoted from cookies
        return view('petition', [
            'petition' => $petition,
            'hasVoted' => $hasVoted
            ]);
    }

    public function getAllPetitions() {
        return view('all-petitions', ['petitions' => Petition::all()]);
    }

    public function upvotePetition($id) {
        $petition = Petition::findOrFail($id);
        if($petition->enable_yes) {
            $petition->upvotes += 1;
            $petition->save();
            return redirect()->back();
        } else {
            return redirect()->back()->with(['message' => 'Wrong answer!']);
        }
    }

    public function downvotePetition($id) {
        $petition = Petition::findOrFail($id);
        if($petition->enable_yes) {
            $petition->upvotes -= 1;
            $petition->save();
            return redirect()->back();
        } else {
            return redirect()->back()->with(['message' => 'Wrong answer!']);
        }
    }

    public function updatePetiton(Request $request) {

    }

    public function deletePetition($id) {

    }

    public function home(Request $request) {
        return view('welcome');
    }

}
