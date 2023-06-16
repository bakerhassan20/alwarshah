<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rinvex\Subscriptions\Models\PlanFeature;

class subscriptionsController extends Controller
{
    public function index(){

        $user = User::find(1);
        dd($user->subscribedTo(2));

        //$plan = app('rinvex.subscriptions.plan')->find(2);

       // $user->newPlanSubscription('main', $plan);


    }
}
