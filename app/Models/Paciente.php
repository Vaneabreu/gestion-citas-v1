<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';
    protected $primaryKey = 'id_pacientes'; // Set the primary key to match the database field
    protected $fillable = [
        'nombre', 'documento', 'sexo', 'whatsapp', 
        'direccion', 'id_aseguradoras', 'no_seguro', 'estado'
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class, 'paciente_id');
    }
}
