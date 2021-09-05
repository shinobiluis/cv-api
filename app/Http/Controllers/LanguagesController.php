<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LanguagesRequest;
use App\Http\Resources\LanguagesResource;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LanguagesResource::collection( Language::all() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguagesRequest $request)
    {
        $request->request->add([ 'user_id' => Auth::id() ]);
        return (new LanguagesResource( Language::create( $request->all() ) )); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Language $language )
    {
        return new LanguagesResource( $language );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $language->update( $request->all() );
        return (new LanguagesResource( $language ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Language $language )
    {
        $language->delete();
        return (new LanguagesResource( $language ));
    }
}
