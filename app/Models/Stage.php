<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'tipo', // Asegúrate de que este campo exista en tu tabla stages si es necesario.
    ];

    /**
     * Define the relationship to the Project model.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}