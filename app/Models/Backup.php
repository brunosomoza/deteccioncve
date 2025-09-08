<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Backup extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruta_archivo',
        'fecha_respaldo',
        'estado',
    ];
}
