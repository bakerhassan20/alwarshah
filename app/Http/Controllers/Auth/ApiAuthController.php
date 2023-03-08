<?php

namespace App\Http\Controllers\Auth;
use App\Models\Otp;
use App\Models\User;
use App\Models\sections;
use App\Models\services;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;


class ApiAuthController extends Controller
{


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        if($validator->fails()){
            return response(['message'=>$validator->errors()->all()], 422);
        }


        $user = User::where('phone',$request->phone)->first();
        if($user){
          /*   if ($user->type == 'customer'){ */
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()
                    ->json(['user_data' => $user,'access_token' => $token, 'token_type' => 'Bearer', 'Status'=>200]);
      /*       }else{ */
                return response()
                ->json(['message' => ['Unauthorized']], 401);
        /*     } */

        }else{
            $user = User::create([
                'name' => 'customer',
                'phone' => $request->phone,
                'type'=>"customer",
                'password'=>"12345678",
             ]);

        $user->assignRole('user');
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()
        ->json(['user_data' => $user,'access_token' => $token, 'token_type' => 'Bearer', 'Status'=>200]);
        }

    }

}
