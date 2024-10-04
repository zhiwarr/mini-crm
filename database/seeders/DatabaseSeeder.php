<?php

namespace Database\Seeders;

use App\Models\User;
use App\RoleEnum;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        User::factory(10)->create();
        USer::create([
            'first_name'=> "admin",
            'last_name'=> "admin",
            'email'=> "admin@test.com",
            'password'=> 'password',
        ])->syncRoles(RoleEnum::ADMIN);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}