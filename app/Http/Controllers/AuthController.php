<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegistroRequest;

class AuthController extends Controller
{
	// registro de usuarios
	public function register( RegistroRequest $request ){
		// realizamos validacion de valores
        $validated = $request->validated();  
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
		]);
		// creamos el tocken 
		$token = $user->createToken('auth_token')->plainTextToken;
		// respondemos con el token
        return response()->json([
            'acess_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
	
	// login de usuario
	public function login( Request $request ){
		// valida que el usuario este registrado
        if ( !Auth::attempt( 
                $request->only( 'email', 'password' ) 
            ) 
        ) {
            return response()->json([
                'message' => 'Invalid Login details'
            ], 401);
        }
		// consultamos su informacion
		$user = User::where([
			  ['email', $request['email']] 
		])->firstOrFail();
		// creamos el token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'acess_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

	/**
	 * Este metodo solo ayuda para validar el funcionamiento de un token
	 */
    public function infoUser( Request $request ){
        $user = Auth::user();
        return $request->user();
	}

	/**
	 * cerrar sesion del usuario
	 */
	public function logout(Request $request){
		// obtenemos informacion del usuario
		// $user = Auth::user();
		// // eliminamos todos los tokens que tenga el usaurio
		// $user->tokens()->delete();
		// Auth()->logout;
        // return response()->json([
        //     'message' => 'Sesion cerrada',
        // ]);  
		auth()->user()->tokens()->delete();
		return [
			'message' => 'Logged out'
		];	
	}

}
