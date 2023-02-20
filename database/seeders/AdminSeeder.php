<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'profile' => 'admin.png'
        ]);

        $writer = User::create([
            'name' => 'writer',
            'email' => 'writer@writer.com',
            'password' => bcrypt('password')
        ]);


        $admin_role = Role::create(['name' => 'admin']);
        $writer_role = Role::create(['name' => 'writer']);

        $permission = Permission::create(['name' => 'Post access']);
        $permission = Permission::create(['name' => 'Post edit']);
        $permission = Permission::create(['name' => 'Post create']);
        $permission = Permission::create(['name' => 'Post delete']);

        // Department
        $permission = Permission::create(['name' => 'Department access']);
        $permission = Permission::create(['name' => 'Department edit']);
        $permission = Permission::create(['name' => 'Department create']);
        $permission = Permission::create(['name' => 'Department delete']);

        // Faculty
        $permission = Permission::create(['name' => 'Faculty access']);
        $permission = Permission::create(['name' => 'Faculty edit']);
        $permission = Permission::create(['name' => 'Faculty create']);
        $permission = Permission::create(['name' => 'Faculty delete']);

        // Budget
        $permission = Permission::create(['name' => 'Budget access']);
        $permission = Permission::create(['name' => 'Budget edit']);
        $permission = Permission::create(['name' => 'Budget create']);
        $permission = Permission::create(['name' => 'Budget delete']);

        // Project
        $permission = Permission::create(['name' => 'Project access']);
        $permission = Permission::create(['name' => 'Project edit']);
        $permission = Permission::create(['name' => 'Project create']);
        $permission = Permission::create(['name' => 'Project delete']);
        // invoice
        $permission = Permission::create(['name' => 'Invoice access']);
        $permission = Permission::create(['name' => 'Invoice edit']);
        $permission = Permission::create(['name' => 'Invoice create']);
        $permission = Permission::create(['name' => 'Invoice delete']);
        // Fund RElese
        $permission = Permission::create(['name' => 'Fund access']);
        $permission = Permission::create(['name' => 'Fund edit']);
        $permission = Permission::create(['name' => 'Fund create']);
        $permission = Permission::create(['name' => 'Fund delete']);
        // funding agency
        $permission = Permission::create(['name' => 'FundingAgency access']);
        $permission = Permission::create(['name' => 'FundingAgency edit']);
        $permission = Permission::create(['name' => 'FundingAgency create']);
        $permission = Permission::create(['name' => 'FundingAgency delete']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        $permission = Permission::create(['name' => 'Mail access']);
        $permission = Permission::create(['name' => 'Mail edit']);



        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);


        $admin_role->givePermissionTo(Permission::all());
    }
}
