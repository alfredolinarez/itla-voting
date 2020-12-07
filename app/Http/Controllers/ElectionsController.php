<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;

class ElectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = Election::all()->sortByDesc('state');

        return view('admin.elections', [
            'elections' => $elections,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function edit(Election $election)
    {
        $elections = Election::all()->sortByDesc('state');

        return view('admin.elections', [
            'edit' => $election,
            'elections' => $elections,
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
        $election_data = $request->only(
            'name',
            'date_of_realization',
            'state',
        );

        if($election_data['state']) {
            Election::where('state', 1)->update([
                'state' => 0,
            ]);
        }

        Election::create($election_data);
        return redirect(route('elections.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {
        return view('admin.election', [
            'election' => $election,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Election $election)
    {
        $election_data = $request->only(
            'name',
            'date_of_realization',
            'state'
        );

        if($election_data['state']) {
            Election::where('state', 1)->update([
                'state' => 0,
            ]);
        }

        $election->update($election_data);

        return redirect(route('elections.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        $election->state = 0;
        $election->save();
        return redirect(route('elections.index'));
    }
}
