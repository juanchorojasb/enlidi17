<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'client_name',
        'nit',
        'email',
        'phone',
        'city',
        'department',
        'country',
        'installation_address',
        'project_description',
        'project_value',
        'start_date',
        'status',
        'rut_path',
        'chamber_of_commerce_path',
        'financial_statements_path',
        'legal_representative_id_path',
        'credit_request_path',
        'project_information_path',
        'approval_query_path',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date:d/m/Y', // Formato de fecha personalizado
        'email_verified_at' => 'datetime',
    ];

    /**
     * Obtiene el usuario al que pertenece el proyecto.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtiene las etapas asociadas al proyecto.
     */
    public function stages(): HasMany
    {
        return $this->hasMany(Stage::class);
    }

    /**
     * Obtiene los documentos asociados al proyecto.
     */
    public function documents(): HasMany
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