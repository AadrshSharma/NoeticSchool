<?php

namespace App\Http\Controllers;

use App\Models\Noetic;
use App\Models\Personal;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NoeticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function stu()
    {
        //
        return Inertia::render('create');
    }
    public function view()
    {
        //
        return Inertia::render('view');
    }
    public function personal()
    {
        //
        return Inertia::render('personal');
    }
    public function updated($id)
    {
        //
        $data = Noetic::where('id', $id)->first();
        return Inertia::render('update', ['page' => $data]);
    }
    public function edit($id)
    {
        //
        $data = Personal::where('id', $id)->with('skills0')->first();
        // $data->skills0()->attach(collect('user_id', $id));
        return Inertia::render('edit', ['page' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function personalv()
    {
        //
        return Inertia::render('personalview');
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
     * @param  \App\Models\Noetic  $noetic
     * @return \Illuminate\Http\Response
     */
    public function show(Noetic $noetic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noetic  $noetic
     * @return \Illuminate\Http\Response
     */
    // public function edit(Noetic $noetic)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noetic  $noetic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noetic $noetic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noetic  $noetic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noetic $noetic)
    {
        //
    }
}
