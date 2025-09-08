<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cve extends Model
{
    use HasFactory;

    protected $casts = [
        'fecha_detectada' => 'datetime',
    ];

    protected $fillable = [
        'cve_id',
        'descripcion',
        'cvss',
        'criticidad',
    ];

    // Relación con vulnerabilidades
    public function vulnerabilities()
    {
        return $this->hasMany(Vulnerability::class);
    }

    // Relación con softwares a través de vulnerabilities
    public function softwares()
    {
        return $this->belongsToMany(Software::class, 'vulnerabilities');
    }
}
