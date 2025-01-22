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
        'status',
    ];

    /**
     * Define la relación: Un proyecto pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define la relación: Un proyecto tiene muchas etapas.
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
}