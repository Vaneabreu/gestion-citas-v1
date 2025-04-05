<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aseguradora extends Model
{
    use HasFactory;

    protected $table = 'aseguradoras';
    protected $primaryKey = 'id_aseguradoras';
    protected $fillable = ['descripcion', 'estado'];
}
