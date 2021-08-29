<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponseTrait;
use App\Models\AdditionalInformationModel;
use App\Http\Requests\AdditionalInformationRequest;
class AdditionalInformationController extends Controller
{
    use ApiResponseTrait;
    //
    public function insertAdditionalInformation( 
        AdditionalInformationModel $additionalInformation, 
        AdditionalInformationRequest $request 
    ){
        $request->request->add(['user_id' => Auth::id()]);
        $insert = $additionalInformation->insert( $request );
        return $this->showOne( $insert );
    }

    public function consultAdditionalInformation( AdditionalInformationModel $additionalInformation ){
        $consult = $additionalInformation->consult( Auth::id() );
        return $this->showOne( $consult );
    }

    public function updateAdditionalInformation( AdditionalInformationModel $additionalInformation, Request $request ){
        $update = $additionalInformation->updateAdditionalInformation( Auth::id(), $request );
        return $this->showArray( $update );
    }
}
