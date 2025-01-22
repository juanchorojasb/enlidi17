<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'project_id',
        'status',  // Por ejemplo: 'En revisión', 'Pendiente', 'Aprobado'...
    ];

    /**
     * Relación: Una etapa pertenece a un proyecto.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relación: Una etapa tiene muchos documentos (si en `documents` hay un `stage_id`).
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Scope para filtrar por estado, p.ej. Stage::status('Aprobado')->get();
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope para filtrar por ID de proyecto, p.ej. Stage::ofProject(1)->get();
     */
    public function scopeOfProject($query, $projectId)
    {
        return $query->where('project_id', $projectId);
    }

    /**
     * Ejemplo de helper: verificar si la etapa está completada.
     */
    public function isCompleted()
    {
        return $this->status === 'completed';
    }
}
