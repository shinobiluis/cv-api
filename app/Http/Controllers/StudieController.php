<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studie;
use App\Http\Requests\StudieRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\StudieResource;
class StudieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudieResource::collection( Studie::all() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudieRequest $request)
    {
        // dd( $request->all() );
        $request->request->add([ 'user_id' => Auth::id() ]);
        $insert =  Studie::create( $request->all() ); 
        return (new StudieResource( $insert ))
            ->additional(['msg'=>'Estudio registrado correctamete'])
            ->response()
            ->setStatuscode(201);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Studie $study )
    {
        return new StudieResource( $study );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studie $study)
    {
        $study->update( $request->all() );
        return (new StudieResource( $study ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Studie $study )
    {
        $study->delete();
        return (new StudieResource( $study ));
    }
}
