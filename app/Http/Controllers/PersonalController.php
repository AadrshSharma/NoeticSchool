<?php

namespace App\Http\Controllers;

// use App\Http\Requests\PersonalRequest;
use App\Http\Requests\PersonalStoreRequest;
use App\Http\Resources\PersonalStoreResource;
use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function created(PersonalStoreRequest $request)
    {
        //
        $data = $request->only('name','email','phone','country_id','state_id','city_id');
        $created = Personal::create($data);
        $created->skills0()->attach(collect($request->skills));
        return response()->json(['data' => 'created'], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        //
        // $data = Personal::all();
        // return PersonalStoreResource::collection(
        //     Personal::get()
        // );
        return PersonalStoreResource::collection(
            Personal::when($request->search, function($q) use($request){
            $q->where(function ($q) use($request) {
                $q->where('name','like','%'.$request->search.'%');
                                   
            }); 
        })
        ->when( $request->country_id , function ($q) use($request){
            $q->where('country_id' ,$request->country_id);
            
        })
        ->when( $request->state_id , function ($q) use($request){
            $q->where('state_id' ,$request->state_id);

        })
        ->when( $request->city_id , function ($q) use($request){
            $q->where('city_id' ,$request->city_id);
            
        })
        ->when(request('skills'), function ($q) {
            $q->whereHas('skills', function ($q) {
                $q->whereIn('skill.id', collect(request('skills0')));
            });
        })
        ->get()
     );
        // return response()->json(['data' => $data], 200);

        
    }
    public function delete(Request $request){
        $data = Personal::where('id', $request->id)->first();
        $data->delete();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        //
    }
}
