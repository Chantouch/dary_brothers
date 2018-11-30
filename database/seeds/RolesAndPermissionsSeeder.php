<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'publish products']);
        Permission::create(['name' => 'unpublish products']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit products');

        $role = Role::create(['name' => 'moderator']);
        $role->givePermissionTo(['publish products', 'unpublish products']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
