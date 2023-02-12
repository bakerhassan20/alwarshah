<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
   public function profile(){
    return view('website.profile');
   }
}
