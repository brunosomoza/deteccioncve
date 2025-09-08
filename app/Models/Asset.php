<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_equipo',
        'tipo',
        'sistema_operativo',
        'estado',
    ];

    // Relación con software
    public function softwares()
    {
        return $this->hasMany(Software::class);
    }

    // Relación con vulnerabilidades
    public function vulnerabilities()
    {
        return $this->hasMany(Vulnerability::class);
    }

    // Relación con reportes
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
