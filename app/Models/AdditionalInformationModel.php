<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalInformationModel extends Model
{
    use HasFactory;

    protected $table = 'additional_information';
    protected $fillable = [
        'user_id',
        'address',
        'postal_code',
        'city_town',
        'date_of_birth',
        'place_of_birth',
        'driving_license',
        'gender',
        'linkedin',
        'web_page'
    ];

    public function insert( $data ){
        return $this->create( $data->all() );
    }

    public function consult( $user_id ){
        return $this->where( 'user_id', $user_id )->first();
    }

    // metodo para actualizar perfil
    public function updateAdditionalInformation( $user_id, $request ){
        $inputs = $request->all();
        $additionalInformation = $this->consult( $user_id );
        $additionalInformation->fill([
            'address'=> $inputs['address'], 
            'postal_code' => $inputs['postal_code'],
            'city_town' => $inputs['city_town'],
            'date_of_birth' => $inputs['date_of_birth'],
            'place_of_birth' => $inputs['place_of_birth'],
            'driving_license' => $inputs['driving_license'],
            'gender' => $inputs['gender'],
            'linkedin' => $inputs['linkedin'],
            'web_page' => $inputs['web_page']
        ]);
        if ( $additionalInformation->isClean() ) {
            $response = [
                'statusUpdate' => false,
                "message" => 'No se acaulizo nada'
            ];
        }else{
            $additionalInformation->save();
            $changes = $additionalInformation->changes;
            $changes['statusUpdate'] = true;
            $response = $changes;
        }
        return $response;
    }
}
