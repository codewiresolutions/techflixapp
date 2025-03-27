<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Roles
            ['name' => 'Role View', 'guard_name' => 'web'],
            ['name' => 'Role Add', 'guard_name' => 'web'],
            ['name' => 'Role Edit', 'guard_name' => 'web'],
            ['name' => 'Role Delete', 'guard_name' => 'web'],
            ['name' => 'Role Permission Edit', 'guard_name' => 'web'],

            // Permissions
            ['name' => 'Permission View', 'guard_name' => 'web'],
            ['name' => 'Permission Add', 'guard_name' => 'web'],
            ['name' => 'Permission Edit', 'guard_name' => 'web'],
            ['name' => 'Permission Delete', 'guard_name' => 'web'],

            // Users
            ['name' => 'User View', 'guard_name' => 'web'],
            ['name' => 'User Add', 'guard_name' => 'web'],
            ['name' => 'User Edit', 'guard_name' => 'web'],
            ['name' => 'User Delete', 'guard_name' => 'web'],

            // Staff Member
            ['name' => 'Staff Member View', 'guard_name' => 'web'],
            ['name' => 'Staff Member Add', 'guard_name' => 'web'],
            ['name' => 'Staff Member Edit', 'guard_name' => 'web'],
            ['name' => 'Staff Member Delete', 'guard_name' => 'web'],

            // Jobs
            ['name' => 'Job View', 'guard_name' => 'web'],
            ['name' => 'Job Add', 'guard_name' => 'web'],
            ['name' => 'Job Edit', 'guard_name' => 'web'],
            ['name' => 'Job Delete', 'guard_name' => 'web'],

            // Schedulers
            ['name' => 'Scheduler View', 'guard_name' => 'web'],
            ['name' => 'Scheduler Add', 'guard_name' => 'web'],
            ['name' => 'Scheduler Edit', 'guard_name' => 'web'],
            ['name' => 'Scheduler Delete', 'guard_name' => 'web'],

            // Clients
            ['name' => 'Client View', 'guard_name' => 'web'],
            ['name' => 'Client Add', 'guard_name' => 'web'],
            ['name' => 'Client Edit', 'guard_name' => 'web'],
            ['name' => 'Client Delete', 'guard_name' => 'web'],

            // places
            ['name' => 'Place View', 'guard_name' => 'web'],
            ['name' => 'Place Add', 'guard_name' => 'web'],
            ['name' => 'Place Edit', 'guard_name' => 'web'],
            ['name' => 'Place Delete', 'guard_name' => 'web'],

            // Teams
            ['name' => 'Team View', 'guard_name' => 'web'],
            ['name' => 'Team Add', 'guard_name' => 'web'],
            ['name' => 'Team Edit', 'guard_name' => 'web'],
            ['name' => 'Team Delete', 'guard_name' => 'web'],

            // skills
            ['name' => 'Skill View', 'guard_name' => 'web'],
            ['name' => 'Skill Add', 'guard_name' => 'web'],
            ['name' => 'Skill Edit', 'guard_name' => 'web'],
            ['name' => 'Skill Delete', 'guard_name' => 'web'],

             // Customer
             ['name' => 'Customer View', 'guard_name' => 'web'],
             ['name' => 'Customer Add', 'guard_name' => 'web'],
             ['name' => 'Customer Edit', 'guard_name' => 'web'],
             ['name' => 'Customer Delete', 'guard_name' => 'web'],


        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}