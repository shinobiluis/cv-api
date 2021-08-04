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

    // Insertamos el perfil del usuario
    public function insertProfile( $data ){
        // insertamos y retornamos la respuesta
        return $this->create( $data );
    }

    // consultamos el perfil del usuario
    public function consultProfile( $user_id ){
        return $this->where([
            ['user_id', $user_id]
        ])->first();
    }
}
