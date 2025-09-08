<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'asset_id',
        'tipo',
        'contenido',
        'formato',
    ];

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con activo
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
