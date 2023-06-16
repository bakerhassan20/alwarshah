<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Rinvex\Subscriptions\Models\PlanFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => 'Basic',
            'description' => 'Basic plan',
            'price' => 9.99,
            'signup_fee' => 0,
            'invoice_period' => 1,
            'invoice_interval' => 'month',
            'trial_period' => 15,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);

        $plan->features()->saveMany([
            new PlanFeature(['name' => 'wash', 'value' => 2, 'sort_order' => 1]),
            new PlanFeature(['name' => 'winch', 'value' => 2, 'sort_order' => 1]),
            new PlanFeature(['name' => 'fuel', 'value' => 3,'sort_order' => 1]),
            new PlanFeature(['name' => 'repair', 'value' => 3, 'sort_order' => 1])
        ]);

        $plan2 = app('rinvex.subscriptions.plan')->create([
            'name' => 'Pro',
            'description' => 'Pro plan',
            'price' => 90.99,
            'signup_fee' => 0,
            'invoice_period' => 1,
            'invoice_interval' => 'year',
            'trial_period' => 30,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);

        $plan2->features()->saveMany([
            new PlanFeature(['name' => 'wash', 'value' => 20, 'sort_order' => 1]),
            new PlanFeature(['name' => 'winch', 'value' => 20, 'sort_order' => 1]),
            new PlanFeature(['name' => 'fuel', 'value' => 30,'sort_order' => 1] ),
            new PlanFeature(['name' => 'repair', 'value' => 30, 'sort_order' => 1])
        ]);


    }
}
