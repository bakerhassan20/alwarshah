<?php

namespace App\Http\Controllers\Api;

use App\Models\FcmNotification;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

    public function Service(){
        $service = Service::where('active',1)->get();
        if($service){
            return response()
            ->json(['data' => $service,'Status'=>200]);
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

    public function getProfile(Request $request){
       $user = auth('sanctum')->user();

       if($user){
            return response()
            ->json(['data' => $user,'Status'=>200]);
        }else{
            return response()
        ->json(['message' => ['data not found']], 404);
        }
    }

    public function updateProfile(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'avatar'=>'required|max:255',

        ]);

        if($validator->fails()){
            return response(['message'=>$validator->errors()->all()], 422);
        }

        $user = auth('sanctum')->user();
        if($user){
            $user->update([
                'name'=>$request->name,
                'avatar'=>$request->avatar,
            ]);
            return response()
                ->json(['message' => ['profile updated successfully'],'data' => $user],200);
        }else{
            return response()
                ->json(['message' => ['data not found']], 404);
        }
    }

    public function getFcmNotification(){
        $user = auth('sanctum')->user();
        if($user){
              $FcmNotification = FcmNotification::where('user_id',$user->id)->orderBy('created_at', 'desc')->get();
            return response()
                ->json(['data' => $FcmNotification],200);
        }else{
            return response()
                ->json(['message' => ['data not found']], 404);
        }
    }
}
