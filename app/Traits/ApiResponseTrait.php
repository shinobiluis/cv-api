<?php

namespace App\Traits;

use Illuminate\Support\Collection; 
use Illuminate\Database\Eloquent\Model; 

trait ApiResponseTrait{
    
    public function successRessponse( $data, $code ){
        return response()->json( $data, $code );
    }
    
    public function errorResponse(){
        return response()->json([
            'error' => $message,
            'code' => $code,
            'status' => false
        ], $code );
    }

    public function showAll( Collection $collection, $code = 200 ){
        return $this->successRessponse( [
            'data' => $collection,
            'status' => true
        ], $code );
    }

    public function showOne( Model $instance, $code = 200 ){
        return $this->successRessponse( [
            'data' => $instance,
            'status' => true
        ], $code );
    }

    public function showArray( $array, $status = true, $code = 200 ){
        return $this->successRessponse([
            'data' => $array,
            'status' => $status
        ], $code);
    }
}
?>
