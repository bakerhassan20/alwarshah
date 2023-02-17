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
            if ($user->type == 'customer'){
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()
                    ->json(['user_data' => $user,'access_token' => $token, 'token_type' => 'Bearer', 'Status'=>200]);
            }else{
                return response()
                ->json(['message' => ['Unauthorized']], 401);
            }

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

/*
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('phone')))
        {
            return response()
                ->json(['message' => ['Unauthorized']], 401);
        }
         if (auth()->user()->type == 'customer'){

            $user = User::where('phone', $request['phone'])->firstOrFail();

            $token = $user->createToken('auth_token')->plainTextToken;

            $sections = sections::all();

            return response()
                ->json(['user_data' => $user,'sections'=>$sections,'access_token' => $token, 'token_type' => 'Bearer', ]);
         }else{
            return response()
                ->json(['message' => ['Unauthorized']], 401);
        }

    }


    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
        return response()
                ->json(['message' => 'You have successfully logged out and the token was successfully deleted'], 200);
    }



    public function sendOtp(Request $request){
        $otp = rand(1000,9999);
        $user = User::where('phone',$request->phone)->first();
         if($user!= null){

        $useropt = Otp::where('user_id', $user->id)->first();
                if($useropt) {
                    $useropt->update([
                        'otp'=>$otp
                    ]);
                } else {
                    Otp::create([
                        'user_id'=>$user->id,
                        'otp'=>$otp
                    ]);
                }
                $token = $user->createToken('send-opt-code')->plainTextToken;

                return response()
                ->json(['user_data' => $user,
                        'access_token' => $token,
                        'token_type' => 'Bearer',
                        'message' => 'Otp Send To Your Phone',
                    ], 200);
    }else{
        return response()->json([
            'message' => 'Phone Not Found',
        ], 404);
    }

    }


    public function verifyOpt(Request $request){
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user =  $token->tokenable;
        $user_opt = Otp::where('user_id',$user->id)->where('otp',$request->opt)->first();
        if( $user_opt != null){
            $token = $user->createToken('correct-opt-code')->plainTextToken;
            return response()->json([
                'user_data' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'message' => 'Opt Is Correct',
            ], 200);
        }
        else{
            return response()->json([
                'message' => 'Otp Is Incorrect',
            ], 400);
        }
    }


    public function change_password(Request $request){

        $validator = Validator::make($request->all(),[
            'password' => 'required|string|min:8|confirmed'
        ]);

        if($validator->fails()){
            return response(['message'=>$validator->errors()->all()], 422);
        }

        $token = PersonalAccessToken::findToken($request->bearerToken());
        if($token){
        $user =  $token->tokenable;
        $user = User::where('id',$user->id)->first();
        if($user){
            $user->update([
                'password'=>Hash::make($request->password)
            ]);

            $token = $user->createToken('change_password')->plainTextToken;
            return response()->json([
                'user_data' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'message' => 'password update successfully',
            ], 200);

        }else{
            return response()->json([
                'message' => 'user not found',
            ], 404);
        }
        }else{
            return response()->json([
                'message' => 'user not found',
            ], 404);
        }



    } */

}
