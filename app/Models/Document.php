<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'project_id',
        'file_path',
        'mime_type',
        'size',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}