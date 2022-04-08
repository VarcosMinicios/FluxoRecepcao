<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;
use App\Models\Queue;
use App\Http\Requests\MedicalRequest;
use App\Models\Treatment;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queue = Queue::all();

        $citizens = Citizen::all();

        $treat = Treatment::all();

        return view('medical.queue', compact('queue', 'citizens', 'treat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @param  int  $attendance_id
     * @return \Illuminate\Http\Response
     */
    public function create($id, $attendance_id)
    {
        $citizen = Citizen::find($id);

        $attendance = Queue::find($attendance_id);

        return view('medical.sorting', compact('citizen', 'attendance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MedicalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicalRequest $request)
    {
        
        $sorted_citizen = Queue::find($request->id);
        $sorted_citizen->sorted = 1;

        Treatment::create($request->all());

        $id_treatment = Treatment::max('id');

        $sorted_citizen->id_treatment = $id_treatment;

        $sorted_citizen->save();

        return redirect()->route('medical_index')->with(['success' => true, 'message' => 'Pré-Consulta Finalizada!']);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $queue = Queue::all();

        $citizens = Citizen::all();

        $treatments = Treatment::all();

        return view('medical.sorted_queue', compact('queue', 'citizens', 'treatments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param int $attendance_id
     * @param  int  $treat_id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $attendance_id, $treatment_id)
    {
        $citizen = Citizen::find($id);

        $attendance = Queue::find($attendance_id);

        $treat = Treatment::find($treatment_id);

        return view('medical.index', compact('citizen', 'attendance', 'treat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MedicalRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $treatment = Treatment::find($id);

        $treatment->update($request->all());

        return redirect()->route('medical_show')->with(['success' => true, 'message' => 'Atendimento Finalizado!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
