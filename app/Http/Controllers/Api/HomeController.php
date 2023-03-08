<?php

namespace App\Http\Controllers\Api;

use App\Models\Slide;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function Slide(){
        $slides = Slide::where('active',1)->get();
        if($slides){
            return response()
            ->json(['data' => $slides,'Status'=>200]);
        }else{
            return response()
            ->json(['message' => ['data not found']], 404);
        }

    }


    public function Fav_Service(){
        $slides = Service::where('active',1)->get();
        if($slides){
            return response()
            ->json(['data' => $slides,'Status'=>200]);
        }else{
            return response()
            ->json(['message' => ['data not found']], 404);
        }

    }

    public function Products(){
        $products = Product::where('active',1)->get('img');
        if($products){
            return response()
            ->json(['data' => $products,'Status'=>200]);
        }else{
            return response()
            ->json(['message' => ['data not found']], 404);
        }

    }
    public function getProduct($id){
        $product = Product::find($id);
        if($product){
            return response()
            ->json(['data' => $product,'Status'=>200]);
        }else{
            return response()
            ->json(['message' => ['data not found']], 404);
        }

    }
}
