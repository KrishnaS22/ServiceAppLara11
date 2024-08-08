<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleStaff = Role::create(['name' => 'staff']);
        $roleUser = Role::create(['name' => 'user']);

        $permissionViewServices = Permission::create(['name' => 'view services']);
        $permissionCreateServices = Permission::create(['name' => 'create services']);
        $permissionEditServices = Permission::create(['name' => 'edit services']);
        $permissionDeleteServices = Permission::create(['name' => 'delete services']);

        $permissionViewStaffs = Permission::create(['name' => 'view staffs']);
        $permissionCreateStaffs = Permission::create(['name' => 'create staffs']);
        $permissionEditStaffs = Permission::create(['name' => 'edit staffs']);
        $permissionDeleteStaffs = Permission::create(['name' => 'delete staffs']);

        $permissionViewComplaints = Permission::create(['name' => 'view complaints']);
        $permissionCreateComplaints = Permission::create(['name' => 'create complaints']);
        $permissionEditComplaints = Permission::create(['name' => 'edit complaints']);
        $permissionDeleteComplaints = Permission::create(['name' => 'delete complaints']);

        $roleAdmin->givePermissionTo($permissionViewServices);
        $roleAdmin->givePermissionTo($permissionCreateServices);
        $roleAdmin->givePermissionTo($permissionEditServices);
        $roleAdmin->givePermissionTo($permissionDeleteServices);

        $roleAdmin->givePermissionTo($permissionViewStaffs);
        $roleAdmin->givePermissionTo($permissionCreateStaffs);
        $roleAdmin->givePermissionTo($permissionEditStaffs);
        $roleAdmin->givePermissionTo($permissionDeleteStaffs);

        $roleAdmin->givePermissionTo($permissionViewComplaints);
        $roleAdmin->givePermissionTo($permissionCreateComplaints);
        $roleAdmin->givePermissionTo($permissionEditComplaints);
        $roleAdmin->givePermissionTo($permissionDeleteComplaints);
        
        $roleStaff->givePermissionTo($permissionViewComplaints);
        $roleStaff->givePermissionTo($permissionEditComplaints);

        $roleUser->givePermissionTo($permissionViewComplaints);
        $roleUser->givePermissionTo($permissionCreateComplaints);
        $roleUser->givePermissionTo($permissionEditComplaints);
    }
}
