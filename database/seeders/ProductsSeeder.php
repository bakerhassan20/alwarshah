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
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAmmDueySjMQmgdNuLvlj2X3jHBF-UsoWoNaZrNFnFSrj-K7XKEELIo6-1ryF7XeqG1Yo&usqp=CAU',
            'active' => 1,
            ]);

            Product::create([
                'user_id' => 1,
                'name' => 'product2',
                'price' => 100,
                'quantity' => 10,
                'description' => 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcRz3Re0XGwm7mJNL_2JI4FYHQNsrj369cP6IKxvr92EjHKse2q9wtGKSPFPLZRMdfU2cGOqoP1hQw&usqp=CAc',
                'img' => 'product2.jpg',
                'active' => 1,
                ]);

                Product::create([
                    'user_id' => 1,
                    'name' => 'product3',
                    'price' => 100,
                    'quantity' => 10,
                    'description' => 'product3',
                    'img' => 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRpmh3hKaDDklbSQBc7hVfLBnlHQJa9-0vCxh-ZJ1mA4rot_83ZKO9G7hN1A6seB22nbCTPoof2VP0&usqp=CAc',
                    'active' => 1,
                    ]);


                    Product::create([
                        'user_id' => 1,
                        'name' => 'product4',
                        'price' => 100,
                        'quantity' => 10,
                        'description' => 'product4',
                        'img' => 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSPbgX9FLi-t9q66CQOLZ0tPUdNRqSjnNZdQBeTifcT9gwFTupBnY9f8gPHuyhIitEgB3A5Wfmn&usqp=CAc',
                        'active' => 1,
                        ]);


                        Product::create([
                            'user_id' => 1,
                            'name' => 'product5',
                            'price' => 100,
                            'quantity' => 10,
                            'description' => 'product5',
                            'img' => 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcRbI0XL1sy62W-xbtWw8HvTkFz7kO3lclut5tG28sJDph3Y6I24pKfoEtasNsuH30lx6gtiJJYPWrw&usqp=CAc',
                            'active' => 1,
                            ]);

    }
}
