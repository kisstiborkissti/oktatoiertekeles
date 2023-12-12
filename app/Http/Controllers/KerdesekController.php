<?php

namespace App\Http\Controllers;

use App\Models\Kerdes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KerdesekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adatok=Kerdes::all();
        return view('pages.kerdesek.index')->with('adatok',$adatok);
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
     * @param  \App\Models\Kerdes  $kerdes
     * @return \Illuminate\Http\Response
     */
    public function show(Kerdes $kerdes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kerdes  $kerdes
     * @return \Illuminate\Http\Response
     */
    public function edit($kerdes)
    {
        //
        $adatok=Kerdes::where('kerdes','=',$kerdes)->get();
        dd($adatok);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kerdes  $kerdes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kerdes $kerdes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kerdes  $kerdes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kerdes $kerdes)
    {
        //
    }
}
