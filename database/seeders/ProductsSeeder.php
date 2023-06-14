<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'user_id' => 1,
            'name' => 'product1',
            'price' => 100,
            'quantity' => 10,
            'description' => 'product1',
            'img' => 'product1.jpg',
            'active' => 1,
            ]);

            Product::create([
                'user_id' => 1,
                'name' => 'product2',
                'price' => 100,
                'quantity' => 10,
                'description' => 'product2',
                'img' => 'product2.jpg',
                'active' => 1,
                ]);

                Product::create([
                    'user_id' => 1,
                    'name' => 'product3',
                    'price' => 100,
                    'quantity' => 10,
                    'description' => 'product3',
                    'img' => 'product3.jpg',
                    'active' => 1,
                    ]);


                    Product::create([
                        'user_id' => 1,
                        'name' => 'product4',
                        'price' => 100,
                        'quantity' => 10,
                        'description' => 'product4',
                        'img' => 'product4.jpg',
                        'active' => 1,
                        ]);


                        Product::create([
                            'user_id' => 1,
                            'name' => 'product5',
                            'price' => 100,
                            'quantity' => 10,
                            'description' => 'product5',
                            'img' => 'product5.jpg',
                            'active' => 1,
                            ]);

    }
}
