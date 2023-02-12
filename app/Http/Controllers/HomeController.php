<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use App\Models\User;
use App\Models\invoices;
use App\Models\ColorTheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function adminHome()
    {
         return view('admin.adminHome');
    }

    public function service_provider()
    {
        return view('website.home');
    }

    public function index()
    {
        return view('website.home');
    }




    function theme(Request $request){
    $theme = ColorTheme::first();
     if($theme->mode == 'dark'){

            $theme->update([
                'mode'=> 'light',
            ]);

        }
        else{
            $theme->update([
                'mode'=> 'dark',
            ]);
        }
        return response()->json(['message'=>$theme->mode]);
        }

}

