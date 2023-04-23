<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Service;
use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompleteInfo
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
        $company=Companies::where('user_id', Auth::user()->id)->first();
        if($company){
            return $next($request);
        }else{
            $services = Service::where('active',1)->get();
            return response()->view('auth.complete',compact('services'));
        }

    }
}
