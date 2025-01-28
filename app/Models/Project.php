<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

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
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date:d/m/Y', // Formato de fecha personalizado
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
}