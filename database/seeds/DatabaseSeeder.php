<?php

use Illuminate\Database\Seeder;
use Modules\Banco\Database\Seeders\ContaSeedTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ContaSeedTableSeeder::class);
    }
}
