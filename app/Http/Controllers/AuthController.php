<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register( Request $request ){
        // dd( $request->all() );
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        
        
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
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
        return $request->user();
    }
}
