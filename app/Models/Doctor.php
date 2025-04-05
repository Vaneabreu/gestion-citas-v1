<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctores';
    protected $primaryKey = 'id_doctores';
    protected $fillable = ['nombre', 'especialidad'];
}
