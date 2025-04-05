<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCita;

class TipoCitaController extends Controller
{
    public function index()
    {
        $tiposCitas = TipoCita::all();
        return view('tipos-citas.index', compact('tiposCitas'));
    }

    public function create()
    {
        return view('tipos-citas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        TipoCita::create($request->all());
        return redirect()->route('tipos-citas.index')->with('success', 'Tipo de cita creado exitosamente.');
    }

    public function show($id)
    {
        $tipoCita = TipoCita::findOrFail($id);
        return view('tipos-citas.show', compact('tipoCita'));
    }

    public function edit($id)
    {
        $tipoCita = TipoCita::findOrFail($id);
        return view('tipos-citas.edit', compact('tipoCita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $tipoCita = TipoCita::findOrFail($id);
        $tipoCita->update($request->all());
        return redirect()->route('tipos-citas.index')->with('success', 'Tipo de cita actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $tipoCita = TipoCita::findOrFail($id);
        $tipoCita->delete();
        return redirect()->route('tipos-citas.index')->with('success', 'Tipo de cita eliminado exitosamente.');
    }
}
