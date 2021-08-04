<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
	Profile
};

use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
	public function insertProfile( 
		Profile $profile,
		ProfileRequest $request
    ){
        // insertamos el perfil y retornamos la informacion
        // del registro.
        $insert = $profile->insertProfile( $request->all() ); 
        return $insert;
	}

}
