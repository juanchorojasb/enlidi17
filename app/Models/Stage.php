<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'project_id',
        'status', // Puede ser "pending", "in_progress", "completed", etc.
    ];

    /**
     * Relación: Una etapa pertenece a un proyecto.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relación: Una etapa tiene muchos documentos.
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Scope para buscar etapas por estado.
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope para buscar etapas por proyecto.
     */
    public function scopeOfProject($query, $projectId)
    {
        return $query->where('project_id', $projectId);
    }

    /**
     * Método para verificar si la etapa está completada.
     */
    public function isCompleted()
    {
        return $this->status === 'completed';
    }
}
