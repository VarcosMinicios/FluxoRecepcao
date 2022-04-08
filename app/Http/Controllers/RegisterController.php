<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Citizen;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_prontuario = Citizen::max('id');

        if ($last_prontuario == null) {
            $last_prontuario = 1;
        } else {
            $last_prontuario ++;
        }

        while (strlen($last_prontuario) < 6) {
            $last_prontuario = "0".$last_prontuario;
        }
        
        return view('register.index', ['last_prontuario' => $last_prontuario]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {        
        Citizen::create($request->all());
        return redirect()->route('list')->with(['success' => true, 'message' => 'Paciente Cadastrado!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $citizen = Citizen::find($id);

        return view('register.edit', compact('citizen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegisterRequest $request, $id)
    {
        $citizen = Citizen::find($id);

        $citizen->update($request->all());

        $citizen->save();

        return redirect()->route('list')->with(['success' => true, 'message' => 'Cadastro Atualizado!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $citizen = Citizen::find($id);
        $citizen->delete();

        return redirect()->route('list')->with(['success' => true, 'message' => 'Exclusão concluída!']);
    }
}
