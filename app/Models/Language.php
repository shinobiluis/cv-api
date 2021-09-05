<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'language',
        'language_level',
        'order_languages'
    ];
    
    protected $attributes = [
        'order_languages' => 1
    ];
}
