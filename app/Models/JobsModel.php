<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsModel extends Model
{
    use HasFactory;
    
    protected $table = 'jobs';
    protected $fillable = [
        'user_id',
        'company',
        'market_stall',
        'market_stall_city',
        'market_stall_month',
        'stall_market_year',
        'stall_market_month_end',
        'stall_market_year_end',
        'job_description',
        'order_jobs'
    ];
    
    public function insert( $data ){
        return $this->create( $data->all() );
    }

    public function consult( $job_id, $user_id ){
        return $this->where([
            [ 'id', $job_id ],
            [ 'user_id', $user_id ],
        ])->first();
    }

    public function consultAll( $user_id ){
        return $this->where( 'user_id', $user_id )->get();
    }

    // metodo para actualizar perfil
    public function updateJob( $user_id, $request ){
        $inputs = $request->all();
        $update = $this->consult( $inputs['id'], $user_id );
        $update->fill([
            "company" => $inputs['company'],
            "market_stall" => $inputs['market_stall'],
            "market_stall_city" => $inputs['market_stall_city'],
            "market_stall_month" => $inputs['market_stall_month'],
            "stall_market_year" => $inputs['stall_market_year'],
            "stall_market_month_end" => $inputs['stall_market_month_end'],
            "stall_market_year_end" => $inputs['stall_market_year_end'],
            "job_description" => $inputs['job_description'],
            "order_jobs" => $inputs['order_jobs']
        ]);
        if ( !$update->isClean() ) {
            $update->save();
        }
        return $update;
    }}
