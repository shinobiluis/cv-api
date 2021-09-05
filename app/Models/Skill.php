<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'abilities',
        'abilities_level',
        'order_abilities'
    ];
    
    protected $attributes = [
        'order_abilities' => 1
    ];
}
