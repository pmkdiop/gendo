<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Create Permissions
        Permission::create(['name' => 'lire']);
        Permission::create(['name' => 'creer']);
        Permission::create(['name' => 'modifier']);
        Permission::create(['name' => 'supprimer']);

        // Permission::create(['name' => 'view permission']);
        // Permission::create(['name' => 'create permission']);
        // Permission::create(['name' => 'update permission']);
        // Permission::create(['name' => 'delete permission']);

        // Permission::create(['name' => 'view user']);
        // Permission::create(['name' => 'create user']);
        // Permission::create(['name' => 'update user']);
        // Permission::create(['name' => 'delete user']);

        // Permission::create(['name' => 'view product']);
        // Permission::create(['name' => 'create product']);
        // Permission::create(['name' => 'update product']);
        // Permission::create(['name' => 'delete product']);


        // Create Roles
        $superAdminRole = Role::create(['name' => 'Administrateur']); //as super-admin
        $adminRole = Role::create(['name' => 'Entite locale']);
        $staffRole = Role::create(['name' => 'Entite parapublique']);
        $userRole = Role::create(['name' => 'Admin']);

        // Lets give all permission to super-admin role.
        $allPermissionNames = Permission::pluck('name')->toArray();

        $superAdminRole->givePermissionTo($allPermissionNames);

        // Let's give few permissions to admin role.
        $adminRole->givePermissionTo(['lire', 'creer', 'modifier', 'supprimer']);
        // $adminRole->givePermissionTo(['lire', 'creer', 'modifier', 'supprimer']);
        // $adminRole->givePermissionTo(['create user', 'view user', 'update user']);
        // $adminRole->givePermissionTo(['create product', 'view product', 'update product']);


        // Let's Create User and assign Role to it.

        $superAdminUser = User::firstOrCreate([
            'email' => 'skillcodiing@gmail.com',
        ], [
            'prenom' => "Eric k",
            'nom' => "GLOTO",
            'nomUtilisateur' => "@EGLOTO",
            'email' => "skillcodiing@gmail.com",
            'password' => Hash::make('0987654321'),
            'actif' => 'Oui',
        ]);

        $superAdminUser->assignRole($superAdminRole);

        
    }
}
