<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        Permission::create(['name' => 'crear proyectos']);
        Permission::create(['name' => 'editar proyectos']);
        Permission::create(['name' => 'ver proyectos']);
        Permission::create(['name' => 'aprobar proyectos']);
        Permission::create(['name' => 'rechazar proyectos']);
        // ... otros permisos que necesites

        // Crear roles y asignar permisos
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(['crear proyectos', 'editar proyectos', 'ver proyectos']);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all()); // Dar todos los permisos al administrador

        // Crear usuarios y asignar roles
        $user = User::factory()->create([
            'name' => 'usuario',
            'email' => 'usuario@enlidi.pro',
            'password' => bcrypt('12345678'), // Usa una contraseña segura
        ]);
        $user->assignRole($userRole);

        $admin = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@enlidi.pro',
            'password' => bcrypt('12345678'), // Usa una contraseña segura
        ]);
        $admin->assignRole($adminRole);
    }
}