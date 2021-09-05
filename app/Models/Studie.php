<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studie extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'institution',
        'institution_name',
        'institution_name_city',
        'study_date_start_month',
        'study_date_start_year',
        'study_date_end_month',
        'study_date_end_year',
        'study_description',
        'order_studiesandcertifications'
    ];

    protected $attributes = [
        'order_studiesandcertifications' => 1
    ];
}
