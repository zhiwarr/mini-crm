<?php

namespace Database\Seeders;

use App\PermissionEnum;
use App\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>PermissionEnum::MANAGE_USER->value]);
        Permission::create(['name'=>PermissionEnum::DELETE_CLIENT->value]);
        Permission::create(['name'=>PermissionEnum::DELETE_PROJECT->value]);
        Permission::create(['name'=>PermissionEnum::DELETE_TASK->value]);
        $role = Role::findByName(RoleEnum::ADMIN->value);
        $role->givePermissionTo(Permission::all());
    }
}
