<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponseTrait;
use App\Http\Requests\JobRequest; 
use App\Models\JobsModel;
use App\Http\Resources\JobsResource;
class JobsController extends Controller
{
    
    use ApiResponseTrait;

    public function insertJob( 
        JobRequest $request,
        JobsModel $job
    ){
        $request->request->add([
            'user_id' => Auth::id(),
            'order_jobs' => 0
        ]);
        $insert = $job->insert( $request );
        return (new JobsResource( $insert ))
            ->additional(['msg'=>'Trabajo registrado correctamete'])
            ->response()
            ->setStatuscode(201);
        // return $this->showOne( $insert );
    } 

    public function consultJobs( JobsModel $job ){
        $consult = $job->consultAll( Auth::id() );
        // return $consult;
        return JobsResource::collection( $consult );
    }

    public function consultJob( $job_id, JobsModel $job ){
        $consult = $job->consult( $job_id, Auth::id() );
        return new JobsResource( $consult );
    }

    public function updateJob( JobsModel $job, JobRequest $request ){
        $update = $job->updateJob( Auth::id(), $request );
        return new JobsResource( $update );
    }
}
