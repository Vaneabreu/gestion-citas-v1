<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCita extends Model
{
    use HasFactory;

    protected $table = 'tipos_citas';
    protected $primaryKey = 'id_tipos_citas';
    protected $fillable = ['descripcion', 'precio1', 'precio2', 'estado'];
}
