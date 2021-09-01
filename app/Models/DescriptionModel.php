<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescriptionModel extends Model
{
    use HasFactory;
    
    protected $table = 'description';
    protected $fillable = [
        'user_id',
        'description'
    ];

    public function insert( $request ){
        return $this->create( $request->all() );
    }

    public function consult( $user_id ){
        return $this->where( 'user_id', $user_id )->first();
    }

    public function updateDescription( $user_id, $request ){
        $inputs = $request->all();
        $update = $this->consult( $user_id );
        $update->fill([
            'description'=> $inputs['description'], 
        ]);
        if ( $update->isClean() ) {
            $response = [
                'statusUpdate' => false,
                "message" => 'No se acaulizo nada'
            ];
        }else{
            $update->save();
            $changes = $update->changes;
            $changes['statusUpdate'] = true;
            $response = $changes;
        }
        return $response; 
    }
}
