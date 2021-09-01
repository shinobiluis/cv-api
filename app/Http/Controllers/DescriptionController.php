<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DescriptionRequest;
use App\Models\DescriptionModel;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponseTrait;
class DescriptionController extends Controller
{
    use ApiResponseTrait;
    //
    public function insertDescription( 
        DescriptionRequest $request, 
        DescriptionModel $description 
    ){
        $request->request->add(['user_id' => Auth::id()]);
        $insert = $description->insert( $request );
        return $this->showOne( $insert );
    }

    public function consultDescription( DescriptionModel $description ){
        $consult = $description->consult( Auth::id() );
        return $this->showOne( $consult );
    }
    
    public function updateDescription( 
        DescriptionRequest $request, 
        DescriptionModel $description 
    ){
        $update = $description->updateDescription( Auth::id(), $request );
        return $this->showArray( $update );
    }
}
