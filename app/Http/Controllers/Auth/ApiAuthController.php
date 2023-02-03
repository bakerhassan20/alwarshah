<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\sections;
use App\Models\services;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;


class ApiAuthController extends Controller
{


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users,phone',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if($validator->fails()){
            return response(['message'=>$validator->errors()->all()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type'=>"customer",
         ]);
        $user->assignRole('user');

        $token = $user->createToken('auth_token')->plainTextToken;
        $sections = sections::all();
        return response()
            ->json(['user_data' => $user,'sections'=>$sections,'access_token' => $token, 'token_type' => 'Bearer', 'Status'=>200]);
    }


    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('phone', 'password')))
        {
            return response()
                ->json(['message' => ['Unauthorized']], 401);
        }

        $user = User::where('phone', $request['phone'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $sections = sections::all();

        return response()
            ->json(['user_data' => $user,'sections'=>$sections,'access_token' => $token, 'token_type' => 'Bearer', ]);
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


}
