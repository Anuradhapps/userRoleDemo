<?php

namespace Database\Seeders;

use App\Models\permission;
use App\Models\PermissionedRole;
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
        Role::factory()->create([
            'name' => 'admin',
        ]);
        Role::factory()->create([
            'name' => 'user',
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'password' => Hash::make(12345),
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
        for($i = 1; $i < 23; $i++){
            PermissionedRole::factory()->create([
                'role_id' => 1,
                'permission_id' => $i
            ]);
        }
        
    }
}
