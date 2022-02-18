<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Owner']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Seller']);
        $role4 = Role::create(['name' => 'Vip']);

        Permission::create(['name' => 'edit articles'])->assignRole($role1);
    }
}
