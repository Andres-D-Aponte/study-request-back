<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidatos';
    protected $fillable = ['nombre', 'apellido', 'documento_identidad', 'correo', 'telefono', 'fecha_creacion'];
}
