<?php

namespace App\Http\Controllers;

use App\Models\Tanulok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AktualiKitoltesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$adatok=DB::table('tanulok')->paginate(15);
        $adatok=Tanulok::simplepaginate(15);
        //$adatok=Tanulok::cursorPaginate(20);         
        return view('pages.eredmenyek.osszes')->with('adatok', $adatok);
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
     * @param  \App\Models\Tanulok  $tanulok
     * @return \Illuminate\Http\Response
     */
    public function show(Tanulok $tanulok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanulok  $tanulok
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanulok $tanulok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanulok  $tanulok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanulok $tanulok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanulok  $tanulok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanulok $tanulok)
    {
        //
    }
    public function osztalyvalaszto(){
        $adatok=DB::table('tanulok')->select('osztaly')->groupBy('osztaly')->orderBy('osztaly')->get();
        return view('pages.eredmenyek.osztalyvalaszto')->with('adatok', $adatok);
    }
    public function osztalytagjai(Request $request){
        //dd($request->osztaly);
        $adatok=DB::table('tanulok')->select('nev', 'oktatasiazonosito', 'kerdes','osztaly')->where('osztaly','=',$request->osztaly)->orderBy('nev')->get();
        
        
        return view('pages.eredmenyek.osztalyadatok')->with('adatok',$adatok);
    }
}
