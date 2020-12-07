<?php

namespace App\Http\Controllers;

use App\Models\ElectivePosition;
use Illuminate\Http\Request;

class ElectivePositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elective_positions = ElectivePosition::all()->where('id', '>', 0);

        return view('admin.elective-positions', [
            'elective_positions' => $elective_positions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ElectivePosition  $electivePosition
     * @return \Illuminate\Http\Response
     */
    public function edit(ElectivePosition $elective_position)
    {
        $elective_positions = ElectivePosition::all()->where('id', '>', 0);

        return view('admin.elective-positions', [
            'edit' => $elective_position,
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
        $elective_position_data = $request->only(
            'name',
            'description',
            'state',
        );

        ElectivePosition::create($elective_position_data);
        return redirect(route('elective-positions.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ElectivePosition  $electivePosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ElectivePosition $elective_position)
    {
        $elective_position_data = $request->only(
            'name',
            'description',
            'state',
        );

        $elective_position->update($elective_position_data);

        return redirect(route('elective-positions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ElectivePosition  $electivePosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(ElectivePosition $elective_position)
    {
        $elective_position->state = 0;
        $elective_position->save();
        return redirect(route('elective-positions.index'));
    }
}
