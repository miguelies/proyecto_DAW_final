<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    protected $primaryKey = 'cod_actividad';
    protected $fillable = ['nombre_actividad','descripcion_actividad','estado_actividades','fecha_cierre','hora_cierre'];
    use HasFactory;
}
