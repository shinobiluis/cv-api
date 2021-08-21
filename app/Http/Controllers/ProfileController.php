<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    User,
	Profile,
    UserImageModel
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

    public function consultProfile( Profile $profile, User $user ){
        // $consult = $profile->consultProfile( Auth::id() ); 
        $consult = $user->consultProfile( Auth::id() );
        //retornamos el perfil del usuario desde el ApiResponseTrait
        return  $this->showOne( $consult );
    }

    public function uploadImage( UserImageModel $image, Request $request ){
        $input = $request->all();
        if( $request->hasFile('file') ){
            $file = $request->file('file');
            // return $file[0];
            $imagenBase64 = base64_encode(file_get_contents( $file[0] ));
        }
        $image->insertImage( Auth::id(), $imagenBase64 );
        return response()->json([
            'status' => 'true',
            'message' => 'La imagen se subio correctamente',
            'image' =>  $imagenBase64
        ]);
    }

    public function consultAvatar( UserImageModel $image ){
        $consult = $image->consultAvatar( Auth::id() );
        return $consult;
    }

    public function updateProfile( Profile $profile, Request $request ){
        $inputs = $request->all();
        $update = $profile->updateProfile( Auth::id(), $inputs );
        return $update;
    }

}
