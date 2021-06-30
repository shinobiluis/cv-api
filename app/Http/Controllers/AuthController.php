<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegistroRequest;

class AuthController extends Controller
{
    public function register( RegistroRequest $request ){
        // dd( $request->all() );
        $validated = $request->validated();  
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'acess_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function login( Request $request ){
        if ( !Auth::attempt( $request->only( 'email', 'password' ) ) ) {
            return response()->json([
                'message' => 'Invalid Login details'
            ], 401);
        }

        $user = User::where( 'email', $request['email'] )->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'acess_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function infoUser( Request $request ){
        $user = Auth::user();
        $user->tokens()->delete();
        return $request->user();
    }
}
