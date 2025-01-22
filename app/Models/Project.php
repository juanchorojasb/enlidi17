<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'client_name',
        'nit',
        'email',
        'phone',
        'city',
        'installation_address',
        'project_description',
        'project_value',
        'start_date',
        'rut_path',
        'chamber_of_commerce_path',
        'financial_statements_path',
        'legal_representative_id_path',
        'credit_request_path',
        'project_information_path',
        'approval_query_path',
        'status', // Puede ser 'pending', 'approved', 'rejected', etc.
    ];

    /**
     * Define la relación: Un proyecto pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define la relación: Un proyecto tiene muchas etapas (stages).
     */
    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    /**
     * Define la relación: Un proyecto tiene muchos documentos.
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Define un accesor para obtener la URL del archivo RUT.
     */
    public function getRutUrlAttribute()
    {
        return $this->rut_path ? asset('storage/' . $this->rut_path) : null;
    }

    /**
     * Define un accesor para obtener la URL del archivo de Cámara de Comercio.
     */
    public function getChamberOfCommerceUrlAttribute()
    {
        return $this->chamber_of_commerce_path ? asset('storage/' . $this->chamber_of_commerce_path) : null;
    }

    /**
     * Scope para buscar proyectos por estado.
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope para buscar proyectos de un usuario específico.
     */
    public function scopeOfUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
