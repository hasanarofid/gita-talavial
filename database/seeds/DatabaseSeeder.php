<?php

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
        $this->call(
            [
                UsersTableSeeder::class,
                // MasterKabupatenSeeder::class, 
                MarketplaceTableSeeder::class,
                SekolahMSeeder::class,
                GuruMSeeder::class,
            ]);
    }
}