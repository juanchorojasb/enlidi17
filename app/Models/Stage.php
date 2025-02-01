<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany; // Importa la clase HasMany

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
        'status',
        'tipo', // Asegúrate de que este campo exista en tu tabla stages si lo vas a usar.
    ];

    /**
     * Define the relationship to the Project model.
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
      * Define the relationship to the Document model.
      *
      * @return HasMany
      */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}