<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slide::create([
            'name' => 'slider1',
            'img' => 'slider1',
            'description' => 'slider1',
            'active' => 1,
            ]);


            Slide::create([
                'name' => 'slider2',
                'img' => 'slider2',
                'description' => 'slider2',
                'active' => 1,
                ]);

                Slide::create([
                    'name' => 'slider3',
                    'img' => 'slider3',
                    'description' => 'slider3',
                    'active' => 1,
                    ]);
    }
}
