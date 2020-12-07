<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Citizen;
use App\Models\Election;
use App\Models\ElectivePosition;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VotesController extends Controller
{
    public function index() {
        $elective_positions = ElectivePosition::all()->where('state', 1)->where('id', '>', 0);

        return view('positions', [
            'elective_positions' => $elective_positions
        ]);
    }

    public function login(Request $request) {
        $cedula = $request->input('cedula');


        $election = Election::where('state', 1)->first();
        if(!$election) {
            return view('validation', [
                'no_active_election' => true,
            ]);
        }

        $citizen = Citizen::find($cedula);
        if(!$citizen || !$citizen->state) {
            return view('validation', [
               'inactive_citizen' => true,
            ]);
        }

        $positions = ElectivePosition::where('state', 1)->count() - 1;
        $vote_count = Vote::where('id_citizen', $citizen->identification_document)->where('id_election', $election->id)->count();
        if($vote_count === $positions) {
            return view('validation', [
                'already_voted' => true,
            ]);
        }

        session([
            'user_hash' => Hash::make($cedula),
            'username' => $cedula,
        ]);

        return redirect(route('positions'));
    }

    public function candidates(ElectivePosition $elective_position) {
        if($elective_position->has_voted(Auth::user()['username'])) {
            return redirect(route('positions'));
        }

        return view('candidates', [
            'elective_position' => $elective_position,
        ]);
    }

    public function vote(Request $request, ElectivePosition $elective_position) {
        if($elective_position->has_voted(Auth::user()['username'])) {
            return redirect(route('positions'));
        }

        $election = Election::where('state', 1)->first();
        Vote::create([
            'id_election' => $election->id,
            'id_citizen' => Auth::user()['username'],
            'id_candidate' => $request->input('candidate'),
            'id_position' => $elective_position->id,
        ]);

        return redirect(route('positions'));
    }
}

# 402-1424386-4