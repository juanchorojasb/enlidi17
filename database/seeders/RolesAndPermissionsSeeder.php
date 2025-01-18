<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        Permission::create(['name' => 'crear proyectos']);
        Permission::create(['name' => 'editar proyectos']);
        Permission::create(['name' => 'ver proyectos']);
        Permission::create(['name' => 'aprobar proyectos']);
        Permission::create(['name' => 'rechazar proyectos']);
        // ... otros permisos que necesites

        // Crear roles
        $role = Role::create(['name' => 'Usuario']);
        $role->givePermissionTo(['crear proyectos', 'editar proyectos', 'ver proyectos']);

        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo(Permission::all()); // Dar todos los permisos al administrador
    }
}