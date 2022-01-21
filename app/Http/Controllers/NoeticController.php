<?php

namespace App\Http\Controllers;

use App\Models\Noetic;
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(Noetic $noetic)
    {
        //
    }

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
