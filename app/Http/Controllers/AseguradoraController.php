<?php
namespace App\Http\Controllers;

use App\Models\Aseguradora;
use Illuminate\Http\Request;

class AseguradoraController extends Controller
{
    public function index() {
        return Aseguradora::all();
    }

    public function store(Request $request) {
        return Aseguradora::create($request->all());
    }

    public function show($id) {
        return Aseguradora::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $aseguradora = Aseguradora::findOrFail($id);
        $aseguradora->update($request->all());
        return $aseguradora;
    }

    public function destroy($id) {
        Aseguradora::destroy($id);
        return response()->noContent();
    }
}