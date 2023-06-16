<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SubscriptionController extends Controller
{
    public function subscription(Request $request){

        $validator = Validator::make($request->all(),[
            'plane_id'=>'required|in:1,2'
        ]);
        if($validator->fails()){
            return response(['message'=>$validator->errors()->all()], 422);
        }
        $user = User::find(Auth::user()->id);

        $bookingsOfSubscriber = app('rinvex.subscriptions.plan_subscription')->ofSubscriber($user)->where('canceled_at','=',null)->where('ends_at','>', carbon::now())->first();

        if($bookingsOfSubscriber){
            return response()->json(['message' => 'The user is subscribed','data'=>$bookingsOfSubscriber],200);
        }
        if($request->plane_id ==1){
            $plan = app('rinvex.subscriptions.plan')->find($request->plane_id);
            $user->newPlanSubscription('basic', $plan);
        }else{
            $plan = app('rinvex.subscriptions.plan')->find($request->plane_id);
            $user->newPlanSubscription('pro', $plan);
        }

        return response()->json(['message' => 'User Subscribed Successfully'],200);
    }


    public function CancelSubscription(){

        $user = User::find(Auth::user()->id);

        $bookingsOfSubscriber = app('rinvex.subscriptions.plan_subscription')->ofSubscriber($user)->where('canceled_at','=',null)->where('ends_at','>', carbon::now())->first();

        $user->planSubscription($bookingsOfSubscriber->slug)->cancel(true);
        return response()->json(['message' => 'Canceled Subscribed Successfully','data'=>$bookingsOfSubscriber],200);

    }
    public function CheckSubscription(){

        $user = User::find(Auth::user()->id);
        $bookingsOfSubscriber = app('rinvex.subscriptions.plan_subscription')->ofSubscriber($user)->where('canceled_at','=',null)->where('ends_at','>', carbon::now())->first();
        if($bookingsOfSubscriber){
            return response()->json(['message' => 'The user is subscribed','data'=>$bookingsOfSubscriber],200);
        }else{
            return response()->json(['message' => 'The user is not subscribed'],405);

        }


    }



    public function RenewSubscription(){

        $user = User::find(Auth::user()->id);

        $bookingsOfSubscriber = app('rinvex.subscriptions.plan_subscription')->ofSubscriber($user)->where('canceled_at','=',null)->first();

        $user->planSubscription($bookingsOfSubscriber->slug)->renew();

        return response()->json(['message' =>'Subscription renewed successfully'],200);

    }

    public function UserSubscription(){

        $user = User::find(Auth::user()->id);

        $bookingsOfSubscriber = app('rinvex.subscriptions.plan_subscription')->ofSubscriber($user)->where('canceled_at','=',null)->first();

        return response()->json(['ends_at' => $bookingsOfSubscriber->ends_at],200);

    }

    public function AllUserSubscription(){

        $user = User::find(Auth::user()->id);

        $bookingsOfSubscriber = app('rinvex.subscriptions.plan_subscription')->ofSubscriber($user)->get();

        return response()->json(['data' => $bookingsOfSubscriber],200);

    }

}
