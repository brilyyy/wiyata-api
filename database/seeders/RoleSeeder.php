<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $roles = ['Super Admin', 'Admin', 'Instructor', 'Student'];
        foreach ($roles as $role) {
            Role::create(['name' => $role, 'guard_name' => 'api']);
        }
    }
}
