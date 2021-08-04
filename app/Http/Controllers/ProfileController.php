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
        // insertamos el id del usuario
        $request->request->add([
            'user_id' => Auth::id()
        ]); 
        // insertamos el registro desde su modelo.
        $insert = $profile->insertProfile( $request->all() ); 
        // return $insert;
        // metodo del ApiResponseTrait
        return $this->showOne( $insert );
	}

    public function consultProfile( Profile $profile ){
        $consult = $profile->consultProfile( Auth::id() ); 
        //retornamos el perfil del usuario desde el ApiResponseTrait
        return $this->showOne( $consult );
    }

}
