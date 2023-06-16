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
            'img' => 'https://thumbs.dreamstime.com/z/refilling-car-fuel-gas-station-blurry-staff-background-black-refuel-concept-energy-image-backgroung-153784820.jpg',
            'description' => 'slider1',
            'active' => 1,
            ]);


            Slide::create([
                'name' => 'slider2',
                'img' => 'https://img.freepik.com/free-vector/lightened-luxury-sedan-car-darkness-with-headlamps-rear-lights-lit-realistic-image-reflection_1284-28803.jpg?w=1060&t=st=1679748443~exp=1679749043~hmac=3ea2d9ca1f196af4627c2c819dfe0c2fe00b84d4b6fd10a62a6c1b219bfb7fad',
                'description' => 'slider2',
                'active' => 1,
                ]);

                Slide::create([
                    'name' => 'slider3',
                    'img' => 'https://media.istockphoto.com/id/1271779268/photo/calling-roadside-assistance.jpg?b=1&s=170667a&w=0&k=20&c=szckV2fv4NS1xyghKqoVlT9xLCGRGkjIPCgN3NYF_cc=',
                    'description' => 'slider3',
                    'active' => 1,
                    ]);
    }
}
