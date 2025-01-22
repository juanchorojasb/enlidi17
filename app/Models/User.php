<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone', // Campo opcional, si lo necesitas
        'profile_picture', // Ruta de la foto de perfil, si la usas
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Hashea automáticamente las contraseñas al asignarlas
    ];

    /**
     * Relación: Un usuario tiene muchos proyectos.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Accesor para obtener la URL de la foto de perfil.
     */
    public function getProfilePictureUrlAttribute()
    {
        return $this->profile_picture ? asset('storage/' . $this->profile_picture) : asset('images/default-profile.png');
    }

    /**
     * Scope para buscar usuarios por rol.
     */
    public function scopeWithRole($query, $role)
    {
        return $query->role($role); // Usa la funcionalidad de Spatie para filtrar roles
    }

    /**
     * Scope para buscar usuarios activos.
     */
    public function scopeActive($query)
    {
        return $query->whereNotNull('email_verified_at');
    }

    /**
     * Método para verificar si el usuario es administrador.
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}
