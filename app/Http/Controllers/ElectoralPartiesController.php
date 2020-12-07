<?php

namespace App\Http\Controllers;

use App\Models\ElectoralParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElectoralPartiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $electoral_parties = ElectoralParty::all()->where('id', '>', 0);

        return view('admin.electoral-parties', [
            'electoral_parties' => $electoral_parties,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ElectoralParty  $electoral_party
     * @return \Illuminate\Http\Response
     */
    public function edit(ElectoralParty $electoral_party)
    {
        $electoral_parties = ElectoralParty::all()->where('id', '>', 0);

        return view('admin.electoral-parties', [
            'edit' => $electoral_party,
            'electoral_parties' => $electoral_parties,
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
        $electoral_party_data = $request->only(
            'name',
            'description',
            'party_logo',
            'state'
        );

        $electoral_party_data['party_logo'] = Storage::url($request->file('logo')->storePublicly('pictures', 'public'));

        ElectoralParty::create($electoral_party_data);
        return redirect(route('electoral-parties.index'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ElectoralParty  $electoral_party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ElectoralParty $electoral_party)
    {
        $electoral_party_data = $request->only(
            'name',
            'description',
            'party_logo',
            'state'
        );

        if($request->file('logo')) {
            $electoral_party_data['party_logo'] = Storage::url($request->file('logo')->storePublicly('pictures', 'public'));
        }

        $electoral_party->update($electoral_party_data);

        return redirect(route('electoral-parties.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ElectoralParty  $electoralParty
     * @return \Illuminate\Http\Response
     */
    public function destroy(ElectoralParty $electoralParty)
    {
        $electoralParty->state = 0;
        $electoralParty->save();
        return redirect(route('electoral-parties.index'));
    }
}
