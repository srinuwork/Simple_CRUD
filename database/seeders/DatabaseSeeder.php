<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 2 Admins
        User::factory(2)->admin()->create();

        // 3 Normal Users
        User::factory(3)->create();

        // 25 Clients (Normal Users)
        User::factory(25)->create();
    }
}
