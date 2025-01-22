<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * Campos asignables por asignación masiva.
     */
    protected $fillable = [
        'name',
        'project_id',
        'stage_id',
        'path',
        'mime_type',
        'size',
    ];

    /**
     * Relación con el modelo Project (proyecto).
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relación con el modelo Stage (etapa), opcional si lo usas.
     */
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
