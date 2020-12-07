<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\ElectivePosition;
use App\Models\ElectoralParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\ErrorHandler\Debug;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all()->where('id', '>', 0)->filter(function($candidate) {
            return $candidate->electoral_party->state && $candidate->elective_position->state;
        });

        $electoral_parties = ElectoralParty::all()->where('state', true)->where('id', '>', 0);
        $elective_positions = ElectivePosition::all()->where('state', true)->where('id', '>', 0);

        return view('admin.candidates', [
            'candidates' => $candidates,
            'electoral_parties' => $electoral_parties,
            'elective_positions' => $elective_positions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        $candidates = Candidate::all()->where('id', '>', 0)->filter(function($candidate) {
            return $candidate->electoral_party->state && $candidate->elective_position->state;
        });

        $electoral_parties = ElectoralParty::all()->where('state', 1)->where('id', '>', 0);
        $elective_positions = ElectivePosition::all()->where('state', 1)->where('id', '>', 0);

        return view('admin.candidates', [
            'edit' => $candidate,
            'candidates' => $candidates,
            'electoral_parties' => $electoral_parties,
            'elective_positions' => $elective_positions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate_data = $request->only(
            'first_name',
            'last_name',
            'party_to_which_it_belongs',
            'position_to_which_it_aspires',
            'profile_picture',
            'state'
        );

        $candidate_data['profile_picture'] = Storage::url($request->file('profile')->storePublicly('pictures', 'public'));

        Candidate::create($candidate_data);
        return redirect(route('candidates.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $candidate_data = $request->only(
            'first_name',
            'last_name',
            'party_to_which_it_belongs',
            'position_to_which_it_aspires',
            'profile_picture',
            'state'
        );

        if($request->file('profile')) {
            $candidate_data['profile_picture'] = Storage::url($request->file('profile')->storePublicly('pictures', 'public'));
        }

        $candidate->update($candidate_data);

        return redirect(route('candidates.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->state = 0;
        $candidate->save();
        return redirect(route('candidates.index'));
    }
}
