<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyType extends Model
{
    protected $table = 'tipo_estudios';
    protected $fillable = ['nombre', 'descripcion','precio'];
}
