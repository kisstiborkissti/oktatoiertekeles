<?php

namespace App\Http\Controllers;

use App\Models\Oktatok;
use Illuminate\Http\Request;
use App\Imports\Oktatokimport;
use App\Imports\Tanulokimport;
use App\Exports\Exportkitoltes;
use App\Imports\Osszerendelesimport;
use Maatwebsite\Excel\Facades\Excel;

class KulsoAdatokController extends Controller
{
    
    public function import(Request $request) 
    {
        
        $adatkategoria=$request['adatkategoria'];
       
        if($adatkategoria=="tanulok")
        {
            
        Excel::import(new Tanulokimport,request()->file('file'));
        return back();
        }
        if ($adatkategoria=="oktatok"){
            Excel::import(new Oktatokimport,request()->file('file'));
            return back();
           
        }
        if($adatkategoria=="osszerendeles")
        {            
        Excel::import(new Osszerendelesimport,request()->file('file'));
        return back();
        }

        dd("semmi");
    }
    public function export(){
        return Excel::download(new Exportkitoltes, 'tanulovalaszok.xlsx');
    }
   
    
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adatok = Oktatok::get();
  
        return view('pages.oktatok.index', compact('adatok'));
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
     * @param  \App\Models\Oktatok  $oktatok
     * @return \Illuminate\Http\Response
     */
    public function show(Oktatok $oktatok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oktatok  $oktatok
     * @return \Illuminate\Http\Response
     */
    public function edit(Oktatok $oktatok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oktatok  $oktatok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oktatok $oktatok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oktatok  $oktatok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oktatok $oktatok)
    {
        //
    }

}
