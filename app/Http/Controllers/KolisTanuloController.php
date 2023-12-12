<?php

namespace App\Http\Controllers;

use App\Models\KolisKerdes;
use App\Models\KolisOsszerendeles;
use App\Models\KolisTanulok;
use App\Models\Valaszok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class KolisTanuloController extends Controller
{
    //
    public function bejelentkezes()
    {
        return view('pages.kolistanulok.tanuloibejelentkezes');
    }
    public function tajekoztato(Request $request)
    {
        $tanulo=$request->all();
        $tanuloom=$tanulo['Om'];
        //!!!om szám és születési idő egyezőségének vizsgálata ab-ból
        $valostanulo=KolisTanulok::where('oktatasiazonosito','=',$tanulo['Om'])->where('Szuletesiido','=',$tanulo['szulido'])->count();
        if ($valostanulo==0) {
            return redirect ('nincs');
        }
       
        $kerdesszama=KolisTanulok::find($tanuloom);
        $kerdesszam=$kerdesszama['kerdes'];

        return view('pages.kolistanulok.tajekoztato')->with(['om'=>$tanuloom,'kerdes'=>$kerdesszam]);
    }
    
    public function kerdoiv($om,$kerdes)
    {
        
       
        if ($kerdes==17)
        {
            return redirect ('vege');
        }
        $kerdes++;
        $kerdesszovege=KolisKerdes::find($kerdes);
        $kerdesszoveg=$kerdesszovege['kerdesszoveg'];
        $tanarok=KolisOsszerendeles::select('pedom','pedagogus')->where('oktazon','=',$om)->groupby('pedagogus','pedom')->get();
        return view('pages.kolistanulok.kitoltes')->with(['tanarok'=> $tanarok, 'om'=>$om, 'kerdesszoveg'=>$kerdesszoveg, 'kerdes'=>$kerdes]);
    }
public function rogzites(Request $request, $om, $kerdes)
{
    //volt e már erre a kérdésre válasz, ha igen tilson le
    //előző oldalra vissza gombok miatt (igy nincs dupla tárolás)
    $valoskerdes=KolisTanulok::find($om);
    if ($valoskerdes['kerdes']+1!=$kerdes)
    {
        return redirect ('anomalia');
    }

    $adatok=$request->all();
    //dump($adatok['Barkovánné_Uzonyi_Pálma_Erzsébet']); (szóköz helyett _ jel kerül a névbe)
    $tanarok=KolisOsszerendeles::select('pedom','pedagogus')->where('oktazon','=',$om)->groupby('pedagogus','pedom')->get();
    //Ha rossz adat van a küldöttek között
   
    foreach ($tanarok as $egytanar)
    {
        //A pedagógus nevében . és szóköz helyett aláhuzásjel kerül (laravel sajátosság)
        $seged=str_replace([" ","."], "_", $egytanar["pedagogus"]);
       
        if($adatok[$seged]<0 ||  $adatok[$seged]>4)
        {
            return redirect ('anomalia');
        }
    }
    foreach ($tanarok as $egytanar)
    {
        $seged=str_replace([" ","."], "_", $egytanar["pedagogus"]);
        //$seged=str_replace("."," ", $seged); //a dr.-ok miatt
        Valaszok::create([
            //'tanuloom'=>$om, //ha ehelyett egy konkrét értéket adok meg senki nem tudja az adatokból ki adta a választ
            'oktato'=>$egytanar['pedagogus'],
            'kerdes'=>$kerdes,
            'ertekeles'=>$adatok[$seged]
        ]);
    }
    //Kérdés sorszámát a ab megfelelő táblájában módosítani
        $tanulo=KolisTanulok::find($om);
        $tanulo->update(['kerdes'=>$kerdes]);
        
   
    Return view('pages.kolistanulok.rogzites')->with(['om'=>$om, 'kerdes'=>$kerdes]);
    //Return('kitoltes/{om}/{kerdesszam}')->with(['om'=>$om, 'kerdes'=>$kerdes]);
    

}
}