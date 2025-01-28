<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    /**
     * Campos asignables por asignación masiva.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'project_id', // Añadir project_id a fillable
        'file_path',  // Corregido: Usar 'file_path'
        'mime_type',
        'size',
        // 'stage_id', //Este campo se puede eliminar si es que nos vas a manejar la relacion con stages desde este modelo
    ];

    /**
     * Relación con el modelo Project (proyecto).
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relación con el modelo Stage (etapa), opcional si lo usas.
     *
     * @return BelongsTo
     */
    // public function stage(): BelongsTo
    // {
    //     return $this->belongsTo(Stage::class);
    // }
}