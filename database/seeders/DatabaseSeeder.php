<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(SpesialisSeeder::class);
        $this->call(FaskesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DokterSeeder::class);
        $this->call(ObatSeeder::class);
    }
}
