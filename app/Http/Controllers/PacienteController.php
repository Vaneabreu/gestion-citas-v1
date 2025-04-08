<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{

    public function create()
    {
        return view('pacientes.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'documento' => 'required|string|max:50',
            'sexo' => 'required|string|max:10',
            'whatsapp' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'id_aseguradoras' => 'nullable|integer',
            'no_seguro' => 'nullable|string|max:50',
            'estado' => 'required|boolean',
        ]);

        Paciente::create($validatedData);

        return redirect()->route('pacientes.index')->with('success', 'Paciente creado exitosamente.');
    }

    public function index()
    {
        $pacientes = Paciente::get()->all() ;
        return view('pacientes.index', compact('pacientes'));
    }

    public function edit($id_pacientes)
    {
        $paciente = Paciente::where('id_pacientes', $id_pacientes)->firstOrFail();
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, $paciente_id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'documento' => 'required|string|max:50',
            'sexo' => 'required|string|max:10',
            'whatsapp' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'id_aseguradoras' => 'nullable|integer',
            'no_seguro' => 'nullable|string|max:50',
            'estado' => 'required|boolean',
        ]);

        $paciente = Paciente::findOrFail($paciente_id);
        $paciente->update($validatedData);

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    public function destroy($id_pacientes)
    {
        $paciente = Paciente::where('id_pacientes', $id_pacientes)->firstOrFail();
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente marcado como eliminado correctamente.');
    }
}


