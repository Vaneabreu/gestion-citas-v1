<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with('paciente')->get(); // Cargar las citas con la relación de pacientes
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $pacientes = Paciente::all();  // Obtener todos los pacientes
        return view('citas.create', compact('pacientes'));
    }

    public function store(Request $request)
    {
        // Para depurar y ver los datos recibidos
        //dd($request->all());

        // Validar los datos del formulario
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_cita' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'procedimiento' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'con_seguro' => 'required|boolean',
            'seguro' => 'nullable|string|max:255',
            'nombre_doctor' => 'required|string|max:255',
        ]);

        // Crear una nueva cita
        $cita = new Cita([
            'paciente_id' => $request->paciente_id,
            'fecha_cita' => $request->fecha_cita,
            'hora' => $request->hora,
            'procedimiento' => $request->procedimiento,
            'descripcion' => $request->descripcion,
            'con_seguro' => $request->con_seguro,
            'seguro' => $request->seguro,
            'nombre_doctor' => $request->nombre_doctor,
        ]);

        // Guardar la cita en la base de datos
        $cita->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('citas.create')->with('success', 'Cita registrada exitosamente.');
    }
}
