<?php

namespace Database\Seeders;

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

        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(ColoeThemeTableSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(RepairServiceSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(PlansSeeder::class);
    }
}
