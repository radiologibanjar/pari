<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProvincesSeeder;
use Database\Seeders\CitiesSeeder;
use Database\Seeders\BranchesSeeder;
use Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProvincesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(BranchesSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
