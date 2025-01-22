<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'project_id',    // Relación con el proyecto
        'stage_id',      // Relación con la etapa
        'path',          // Ruta del archivo
        'mime_type',     // Tipo MIME del archivo
        'size',          // Tamaño del archivo en bytes
    ];

    /**
     * Relación con el modelo Project (proyecto).
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relación con el modelo Stage (etapa).
     */
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
