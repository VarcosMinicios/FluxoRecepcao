<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;
use App\Models\Queue;
use App\Http\Requests\AttendanceRequest;

class AttendanceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $citizen = Citizen::find($id);

        $attendance_code = Queue::max('id');

        if ($attendance_code == null) {
            $attendance_code = 1;
        } else {
            $attendance_code ++;
        }

        $attendance_id = $attendance_code;

        while (strlen($attendance_code) < 6) {
            $attendance_code = "0".$attendance_code;
        }

        return view('attendance.index', compact('citizen', 'attendance_code', 'attendance_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceRequest $request)
    {
        Queue::create($request->all());
        return redirect()->route('list')->with(['success' => true, 'message' => 'Paciente Agendado!']);
    }

}
