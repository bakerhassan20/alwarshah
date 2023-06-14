<?php

namespace App\Http\Controllers\website;

use App\Models\Companies;
use App\Models\SubService;
use App\Models\WinchOrder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CompanyServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceProviderController extends Controller
{
   public function profile(){
    return view('website.profile');
   }


}
