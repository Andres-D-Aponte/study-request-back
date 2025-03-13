<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyRequest extends Model
{
    protected $table = 'solicitudes';
    protected $fillable = ['candidato_id', 'tipo_estudio_id', 'estado', 'fecha_solicitud', 'fecha_completado'];
}
