<?php

namespace Database\Seeders;

use App\Models\permission;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345),
        ]);

        Role::factory()->create([
            'name' => 'admin',
        ]);
        Role::factory()->create([
            'name' => 'user',
        ]);



        permission::factory()->create([
            'name' => 'dashboard',
            'slug' => 'dashboard',
            'group_by' => 0
        ]);

        $names = ['user' => 1, 'role' => 2, 'category' => 3, 'subcategory' => 4, 'product' => 5];
        $crud = ['', ' add', ' edit', ' delete'];
        foreach ($names as $name => $value) {
            foreach ($crud as $cru) {
                permission::factory()->create([
                    'name' => $name . $cru,
                    'slug' => $name . $cru,
                    'group_by' => $value
                ]);
            }
        }
        permission::factory()->create([
            'name' => 'settings',
            'slug' => 'settings',
            'group_by' => 6
        ]);
    }
}
