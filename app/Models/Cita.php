<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';
    protected $primaryKey = 'id_citas';

    protected $fillable = [
        'id_doctores',
        'fechacita',
        'id_pacientes',
        'id_aseguradoras',
        'seguro',
        'id_tipos_citas',
        'hora_reserva',
        'hora_entrada',
        'hora_salida',
        'honorarios',
        'estado',
    ];

    // Relationship with Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctores', 'id_doctores');
    }

    // Relationship with Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_pacientes', 'id_pacientes');
    }

    // Relationship with Aseguradora
    public function aseguradora()
    {
        return $this->belongsTo(Aseguradora::class, 'id_aseguradoras', 'id_aseguradoras');
    }

    // Relationship with TipoCita
    public function tipoCita()
    {
        return $this->belongsTo(TipoCita::class, 'id_tipos_citas', 'id_tipos_citas');
    }
}
