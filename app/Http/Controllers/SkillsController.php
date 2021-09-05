<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Http\Resources\SkillsResource;
use App\Http\Requests\SkillsRequest;
use Illuminate\Support\Facades\Auth;
class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SkillsResource::collection( Skill::all() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillsRequest $request)
    {
        $request->request->add([ 'user_id' => Auth::id() ]);
        return (new SkillsResource( Skill::create( $request->all() ) )); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Skill $skill )
    {
        return new SkillsResource( $skill );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $skill->update( $request->all() );
        return (new SkillsResource( $skill ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Skill $skill )
    {
        $skill->delete();
        return (new SkillsResource( $skill ));
    }
}
