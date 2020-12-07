<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CitizensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citizens = Citizen::all();

        return view('admin.citizens', [
            'citizens' => $citizens,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function edit(Citizen $citizen)
    {
        $citizens = Citizen::all();

        return view('admin.citizens', [
            'edit' => $citizen,
            'citizens' => $citizens,
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
        $citizen_data = $request->only(
            'identification_document',
            'first_name',
            'last_name',
            'email',
            'state',
        );

        Citizen::create($citizen_data);
        return redirect(route('citizens.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizen $citizen)
    {
        $citizen_data = $request->only(
            'identification_document',
            'first_name',
            'last_name',
            'email',
            'state',
        );

        $citizen->update($citizen_data);

        return redirect(route('citizens.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citizen $citizen)
    {
        $citizen->state = 0;
        $citizen->save();
        return redirect(route('citizens.index'));
    }
}
