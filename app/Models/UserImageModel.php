<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImageModel extends Model
{
    use HasFactory;
    protected $table = 'user_image';
    protected $fillable = [
        'user_id',
        'image'
    ];

    public function existsImage( $user_id, $image ){
        return $this->where([
            ['user_id', $user_id],
        ])->exists();
    }
    public function insertImage( $user_id, $image ){
        $exists = $this->existsImage( $user_id, $image );
        
        if($exists != 1){
            $response = $this->create([
                'user_id' => $user_id,
                'image' => $image
            ]);
        }else{
            $imageUser = $this->where([
                ['user_id', $user_id],
            ])->first();
            $imageUser->fill([
                'image' => $image
            ]);
            $imageUser->save();

            $response = $imageUser;
        }
        return $response;
    }

    public function consultAvatar( $user_id ){
        return $this->where([
            ['user_id', $user_id]
        ])->first();
    }
}
