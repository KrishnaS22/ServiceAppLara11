<?php

namespace Database\Seeders;

use App\Models\Complaint;
use App\Models\Service;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the RolesAndPermissionsSeeder
        $this->call(RolesAndPermissionsSeeder::class);

        User::factory()->create([
            'name' => 'Krishna Swarnkar',
            'email' => 'kswarnkar216@gmail.com',
        ])->assignRole('admin');

        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('staff');
        });
        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('user');
        });
        Service::factory(10)->create();
        Staff::factory(10)->create();
        Complaint::factory(10)->create();
    }
}
