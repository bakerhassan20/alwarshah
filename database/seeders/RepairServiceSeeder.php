<?php

namespace Database\Seeders;

use App\Models\RepairService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RepairServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RepairService::create([
            'name' => 'service1',
            ]);

            RepairService::create([
                'name' => 'service2',
                ]);


                RepairService::create([
                    'name' => 'service3',
                    ]);

    }
}
