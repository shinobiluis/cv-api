<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
	Profile
};

use App\Traits\ApiResponseTrait;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ApiResponseTrait;

	public function insertProfile( 
		Profile $profile,
		ProfileRequest $request
    ){
        $input = $request->all();
        // insertamos el id del usuario
        $input['user_id'] =  Auth::id(); 
        // insertamos el registro desde su modelo.
        $insert = $profile->insertProfile( $input ); 
        // metodo del ApiResponseTrait
        return $this->showOne( $insert );
	}

    public function consultProfile( Profile $profile ){
        $consult = $profile->consultProfile( Auth::id() ); 
        //retornamos el perfil del usuario desde el ApiResponseTrait
        return $this->showOne( $consult );
    }

    public function uploadImage( Request $request ){
        $input = $request->all();
        $archivo = $request->file('file');
        // dd( $archivo[1] );
        // return $request->file('file'); 
        if( $request->hasFile('file') ){
            $file = $request->file('file');
            $name = "nombre".".png";
            $destinationPath = public_path('/images/cv/users');
            if(!$file[0]->move($destinationPath, $name)){
                return response()->json([
                    'status' => 'false',
                    'message' => 'La imagen no se subio correctamente'
                ]);
            }else{
                return response()->json([
                    'status' => 'true',
                    'message' => 'La imagen se subio correctamente',
                    'nameImage' => $name
                ]);
            }
        }
    }

}
