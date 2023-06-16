<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $user = User::find(Auth::user()->id);
        $bookingsOfSubscriber = app('rinvex.subscriptions.plan_subscription')->ofSubscriber($user)->where('canceled_at','=',null)->where('ends_at','>', carbon::now())->first();
        if($bookingsOfSubscriber){
            return $next($request);
        }else{

            return response()->json(['message' => 'The user is not subscribed'],405);

        }
    }
}
