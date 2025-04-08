<?php

namespace App\Http\Controllers;

use App\Models\Aseguradora;
use App\Models\Paciente;
use App\Models\Cita;
use Illuminate\Http\Request;
use App\Models\TipoCita;
use App\Models\Doctor;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with(['paciente', 'aseguradora', 'doctor', 'tipoCita'])->paginate(10); // Paginate all citas
      
        $pacientes = Paciente::all();
        $aseguradoras = Aseguradora::all();
        $tiposCitas = TipoCita::all();
        $doctores = Doctor::all();

        return view('citas.index', compact(/* 'citasHoy',  */'citas', 'pacientes', 'aseguradoras', 'tiposCitas', 'doctores'));
    }

    public function create()
    {
        $pacientes = Paciente::all();  // Obtener todos los pacientes
        return view('citas.create', compact('pacientes'));
    }

    public function store(Request $request)
    {
        //dd($request->all()); 
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id_pacientes',
            'fecha_cita' => 'required|date',
            'id_aseguradoras' => 'nullable|exists:aseguradoras,id_aseguradoras',
            'paciente_whatsapp' => 'nullable|numeric', // Validate but do not store in citas
            'id_tipos_citas' => 'required|exists:tipos_citas,id_tipos_citas',
            'honorarios' => 'nullable|numeric',
            'is_update' => 'required|boolean',
            'cita_id' => 'nullable|exists:citas,id_citas',
            'estado' => 'required|string',
        ]);


        if ($validatedData['is_update']) {
            // Edición
            $cita = Cita::findOrFail($validatedData['cita_id']);
            $cita->update([
                'id_pacientes' => $validatedData['paciente_id'],
                'fechacita' => $validatedData['fecha_cita'],
                'id_aseguradoras' => $validatedData['id_aseguradoras'],
                'id_tipos_citas' => $validatedData['id_tipos_citas'],
                'honorarios' => $validatedData['honorarios'],
                'id_doctores' => 1,
                'estado' => $validatedData['estado'] ?? 'Pendiente',
            ]);
            return redirect()->back()->with('success', 'Cita actualizada correctamente.');
        } else {
            // Creación
            Cita::create([
                'id_pacientes' => $validatedData['paciente_id'],
                'fechacita' => $validatedData['fecha_cita'],
                'id_aseguradoras' => $validatedData['id_aseguradoras'],
                'id_tipos_citas' => $validatedData['id_tipos_citas'],
                'honorarios' => $validatedData['honorarios'],
                'id_doctores' => 1,
                'estado' => $validatedData['estado'] ?? 'Pendiente',
            ]);
            return redirect()->back()->with('success', 'Cita creada correctamente.');
        }
    }


    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        $pacientes = Paciente::all();
        $aseguradoras = Aseguradora::all();
        $tiposCitas = TipoCita::all();
        $doctores = Doctor::all();

        return response()->json([
            'cita' => $cita,
            'pacientes' => $pacientes,
            'aseguradoras' => $aseguradoras,
            'tiposCitas' => $tiposCitas,
            'doctores' => $doctores,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Check if the request is intended for an update
        if ($request->input('_method') === 'PATCH') {
            // Validate the data
            $validatedData = $request->validate([
                'fecha_cita' => 'required|date_format:Y-m-d\TH:i',
                'paciente_id' => 'required|exists:pacientes,id_pacientes',
                'id_aseguradoras' => 'nullable|exists:aseguradoras,id_aseguradoras',
                'id_doctores' => 'required|exists:doctores,id_doctores',
                'id_tipos_citas' => 'required|exists:tipos_citas,id_tipos_citas',
                'honorarios' => 'required|numeric',
                'whatsapp' => 'nullable|numeric',
            ]);

            // Find the appointment by ID
            $cita = Cita::findOrFail($id);

            // Update the appointment data
            $cita->update([
                'fechacita' => $validatedData['fecha_cita'],
                'id_pacientes' => $validatedData['paciente_id'],
                'id_aseguradoras' => $validatedData['id_aseguradoras'],
                'id_doctores' => $validatedData['id_doctores'],
                'id_tipos_citas' => $validatedData['id_tipos_citas'],
                'honorarios' => $validatedData['honorarios'],
                'whatsapp' => $validatedData['whatsapp'],
            ]);

            // Redirect with a success message
            return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
        }

    }

    public function marcarEntrada($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->hora_entrada = now(); // Registrar la hora de entrada
        $cita->save();

        return response()->json(['success' => true, 'message' => 'Entrada marcada correctamente.']);
    }

    public function marcarSalida($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->hora_salida = now(); // Registrar la hora de salida
        $cita->save();

        return response()->json(['success' => true, 'message' => 'Salida marcada correctamente.']);
    }

    public function cancelarCita($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->estado = 'Cancelada'; // Cambiar el estado a 'Cancelada'
        $cita->save();

        return response()->json(['success' => true, 'message' => 'Cita cancelada correctamente.']);
    }
}
