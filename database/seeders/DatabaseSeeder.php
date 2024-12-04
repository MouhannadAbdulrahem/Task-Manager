<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Role as RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
        ]);

        $admin = User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@gmail.com',
        ]);

        $userRole = Role::create(['name' => RoleEnum::USER->value]);
        $adminRole = Role::create(['name' => RoleEnum::ADMIN->value]);

        $user->assignRole($userRole);   
        $admin->assignRole($adminRole);
    }
}
