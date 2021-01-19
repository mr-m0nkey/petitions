<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Petition;
use Illuminate\Support\Facades\Cookie;

class PetitionController extends Controller
{

    //TODO use constant to store petition view
    
    public function getFeaturedPetition() {
        $featuredPetitionId = Settings::first()->featured_petition;
        $petition = Petition::find($featuredPetitionId);
        if($petition == null) {
            $petition = Petition::first();
        }

        $decision = Cookie::get('decision');
        $hasVoted = $decision == null ? false : true;
        return view('petition', [
            'petition' => $petition,
            'hasVoted' => $hasVoted,
            'decision' => $decision
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
            $userCookie = cookie('decision', 'yes', 6000);
            return redirect()->back()->cookie($userCookie);
        } else {
            return redirect()->back()->with(['message' => 'Wrong answer!']);
        }
    }

    public function downvotePetition($id) {
        $petition = Petition::findOrFail($id);
        if($petition->enable_yes) {
            $petition->downvotes += 1;
            $petition->save();
            $userCookie = cookie('decision', 'no', 6000);
            return redirect()->back()->cookie($userCookie);
        } else {
            return redirect()->back()->with('message', 'Wrong answer!');
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
