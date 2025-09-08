<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Software extends Model
{
    use HasFactory;
    protected $table = 'softwares';

    protected $fillable = [
        'asset_id',
        'nombre',
        'version',
    ];

    // Relación inversa con Asset
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    // Relación con vulnerabilidades
    public function vulnerabilities()
    {
        return $this->hasMany(Vulnerability::class);
    }

    // Relación con CVEs a través de Vulnerabilities
    public function cves()
    {
        return $this->belongsToMany(Cve::class, 'vulnerabilities');
    }

    public function software()
    {
        return $this->belongsTo(Software::class);
    }
}
