<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $table = 'profiles';
    protected $fillable = [
        'user_id',
        'names',
		'surnames',
		'phone',
		'job_title'
    ];
    
    // public function user(){
    //     return $this->hasOne( User::class, 'id', 'user_id' );
    // }
    // Insertamos el perfil del usuario
    public function insertProfile( $data ){
        // insertamos y retornamos la respuesta
        return $this->create( $data );
    }

    // metodo para actualizar perfil
    public function updateProfile( $user_id, $inputs ){
        $profile = $this->consultProfile( $user_id );
        $profile->fill([
            'names' => $inputs['names'],
            'surnames' => $inputs['surnames'],
            'phone' => $inputs['phone'],
            'job_title' => $inputs['job_title']
        ]);
        $profile->save();
        return $profile;
    }

    // consultamos el perfil del usuario
    public function consultProfile( $user_id ){
        return $this->where([
            ['user_id', $user_id]
        ])->first();
    }
}
