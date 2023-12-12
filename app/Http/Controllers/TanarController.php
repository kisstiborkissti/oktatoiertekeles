<?php

namespace App\Http\Controllers;

use App\Models\Valaszok;
use App\Models\Kerdes;
use App\Models\KolisKerdes;
use App\Models\Oktatok;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

use function Pest\Laravel\call;

class TanarController extends Controller
{
    //
    public function tanaroklekerdezese()
    {
        $adatok=Oktatok::all();
        return view('pages.tanarok.kezdolap2')->with('adatok',$adatok);
    }
    public function tanaroklekerdezese3()
    {
        $adatok=Oktatok::all();
        return view('pages.tanarok.kezdolap3')->with('adatok',$adatok);
    }

    public function adatok3(Request $request)
    {
        //összes tanárhoz tarozó válasz
        $adatok=Valaszok::where('oktato', '=', $request->tnev)->get();
        //0,1,2,3,4 értékelések száma:
        for ($i=0;$i<5;$i++)
        {
            $ertekeles[$i]=0; //hogy legyen diagramm
            $ertekeles[$i]=Valaszok::where('oktato','=',$request->tnev)->where('ertekeles', '=',$i)->count();
        }
        // Összértékelésszám
        $osszertekeles=0;
        for ($i=0;$i<5;$i++)
        {
            $osszertekeles=$osszertekeles+$ertekeles[$i];
        }
        //Egyes kérdésre adott válaszok száma
        for ($i=0;$i<10;$i++)
        {
            $kerdesek[$i]=0;
            $kerdesek[$i]=Valaszok::where('oktato','=',$request->tnev)->where('kerdes', '=',$i+1)->count();
        }
        
        //az egyes kérdésekre az átlagpontszám  0 érték is (nenne van)érték!!!!
        for ($i=0;$i<10;$i++)
        {
            //hogy az eredmeny js diagrmnál is szám legyen(és nem szöveg) kell a plusz 0
            $kerdesekatlagnullaval[$i]=(Valaszok::where('oktato','=',$request->tnev)->where('kerdes', '=',$i+1)->avg('ertekeles'))+0;
        }
        //az egyes kérdésekre az átlagpontszám  0 érték NEM érték (0 nincs benne)!!!!
        for ($i=0;$i<10;$i++)
        {
            $kerdesekatlagnullanelkul[$i]=(Valaszok::where('oktato','=',$request->tnev)->where('kerdes', '=',$i+1)->where('ertekeles','!=',0)->avg('ertekeles'))+0;
        }
        //összes kérdés tekintetében az átlagpontszam 0 nincs benne
        $osszeskerdesatlaganullanelkul=Valaszok::where('oktato','=',$request->tnev)->where('ertekeles','!=',0)->avg('ertekeles');
        //összes kérdés tekintetében az átlagpontszam 0 is benne van!!
        $osszeskerdesatlaganullaval=Valaszok::where('oktato','=',$request->tnev)->avg('ertekeles');
       
        return view('pages.tanarok.eredmenyek1')->with([
            'oktato'=>$request['tnev'],
            'ertekeles'=>$ertekeles,
            'osszertekeles'=> $osszertekeles,
            'kerdesek'=>$kerdesek,
            'kerdesekatlagnullaval'=>$kerdesekatlagnullaval,
            'kerdesekatlagnullanelkul'=>$kerdesekatlagnullanelkul,
            'osszeskerdesatlaganullanelkul'=> $osszeskerdesatlaganullanelkul,
            'osszeskerdesatlaganullaval'=>$osszeskerdesatlaganullaval,
        ]);
    }
    public function adatok2(Request $request)
        {
            
            
            $oktato=$request->tnev;
            //összes a tanárhoz tarozó válasz
            $adatok=Valaszok::where('oktato', '=', $request->tnev)->get();
            //0,1,2,3,4 értékelések száma:
            for ($i=0;$i<5;$i++)
            {
                $ertekeles[$i]=0; //hogy legyen diagramm
                $ertekeles[$i]=Valaszok::where('oktato','=',$request->tnev)->where('ertekeles', '=',$i)->count();
            }
            // Összértékelésszám
            $osszertekeles=0;
            for ($i=0;$i<5;$i++)
            {
                $osszertekeles=$osszertekeles+$ertekeles[$i];
            }
            //Egyes kérdésre és azon belül adott értékelésű válaszok száma
            for ($i=0;$i<10;$i++)
            {
                for($j=0;$j<5;$j++)
                {
                    $kerdesek[$i][$j]=0;
                    $kerdesek[$i][$j]=Valaszok::where('oktato','=',$request->tnev)->where('kerdes', '=',$i+1)->where('ertekeles','=',$j)->count();
                }
            }
            
            //az egyes kérdésekre az átlagpontszám  0 érték is (nenne van)érték!!!!
            for ($i=0;$i<10;$i++)
            {
                //hogy az eredmeny js diagrmnál is szám legyen(és nem szöveg) kell a plusz 0
                $kerdesekatlagnullaval[$i]=(Valaszok::where('oktato','=',$request->tnev)->where('kerdes', '=',$i+1)->avg('ertekeles'))+0;
            }
            //az egyes kérdésekre az átlagpontszám  0 érték NEM érték (0 nincs benne)!!!!
            for ($i=0;$i<10;$i++)
            {
                $kerdesekatlagnullanelkul[$i]=round((Valaszok::where('oktato','=',$request->tnev)->where('kerdes', '=',$i+1)->where('ertekeles','!=',0)->avg('ertekeles'))+0,2);
            }
            //összes kérdés tekintetében az átlagpontszam 0 nincs benne
            $osszeskerdesatlaganullanelkul=round(Valaszok::where('oktato','=',$request->tnev)->where('ertekeles','!=',0)->avg('ertekeles'),2);
            //összes kérdés tekintetében az átlagpontszam 0 is benne van!!
            $osszeskerdesatlaganullaval=Valaszok::where('oktato','=',$request->tnev)->avg('ertekeles');
            
            //kérdések szövegének lekérdezése
            
            $kerdesszovege=Kerdes::select('kerdesszoveg')->get();
           
            if ($request->tipus=='PDF')
            {
                Pdf::setOption(['dpi' => 150, 'defaultFont' => 'TIMES']);
                $pdf = PDF::loadView('pages.tanarok.eredmenyek2',[
                    'oktato'=>$oktato,
                    'ertekeles'=>$ertekeles,
                    'osszertekeles'=> $osszertekeles,
                    'kerdesek'=>$kerdesek,
                    'kerdesekatlagnullaval'=>$kerdesekatlagnullaval,
                    'kerdesekatlagnullanelkul'=>$kerdesekatlagnullanelkul,
                    'osszeskerdesatlaganullanelkul'=> $osszeskerdesatlaganullanelkul,
                    'osszeskerdesatlaganullaval'=>$osszeskerdesatlaganullaval,
                    'kerdesszovege'=>$kerdesszovege,
                ])->setOption('TIMES');
               $fajlnev=$oktato.'.pdf';
                return $pdf->download($fajlnev);
               

            }
            else{

            return view('pages.tanarok.eredmenyek2')->with([
                'oktato'=>$oktato,
                'ertekeles'=>$ertekeles,
                'osszertekeles'=> $osszertekeles,
                'kerdesek'=>$kerdesek,
                'kerdesekatlagnullaval'=>$kerdesekatlagnullaval,
                'kerdesekatlagnullanelkul'=>$kerdesekatlagnullanelkul,
                'osszeskerdesatlaganullanelkul'=> $osszeskerdesatlaganullanelkul,
                'osszeskerdesatlaganullaval'=>$osszeskerdesatlaganullaval,
                'kerdesszovege'=>$kerdesszovege,
            ]);
            }
            
        } 
        public function adatokkoli(Request $request)
        {
            //összes a tanárhoz tarozó válasz
            $adatok=Valaszok::where('oktato', '=', $request->tnev)->get();
            //0,1,2,3,4 értékelések száma:
            for ($i=0;$i<5;$i++)
            {
                $ertekeles[$i]=0; //hogy legyen diagramm
                $ertekeles[$i]=Valaszok::where('oktato','=',$request->tnev)->where('ertekeles', '=',$i)->count();
            }
            // Összértékelésszám
            $osszertekeles=0;
            for ($i=0;$i<5;$i++)
            {
                $osszertekeles=$osszertekeles+$ertekeles[$i];
            }
            //Egyes kérdésre és azon belül adott értékelésű válaszok száma
            for ($i=0;$i<17;$i++)
            {
                for($j=0;$j<5;$j++)
                {
                    $kerdesek[$i][$j]=0;
                    $kerdesek[$i][$j]=Valaszok::where('oktato','=',$request->tnev)->where('kerdes', '=',$i+1)->where('ertekeles','=',$j)->count();
                }
            }
            
            //az egyes kérdésekre az átlagpontszám  0 érték is (nenne van)érték!!!!
            for ($i=0;$i<17;$i++)
            {
                //hogy az eredmeny js diagrmnál is szám legyen(és nem szöveg) kell a plusz 0
                $kerdesekatlagnullaval[$i]=(Valaszok::where('oktato','=',$request->tnev)->where('kerdes', '=',$i+1)->avg('ertekeles'))+0;
            }
            //az egyes kérdésekre az átlagpontszám  0 érték NEM érték (0 nincs benne)!!!!
            for ($i=0;$i<17;$i++)
            {
                $kerdesekatlagnullanelkul[$i]=round((Valaszok::where('oktato','=',$request->tnev)->where('kerdes', '=',$i+1)->where('ertekeles','!=',0)->avg('ertekeles'))+0,2);
            }
            //összes kérdés tekintetében az átlagpontszam 0 nincs benne
            $osszeskerdesatlaganullanelkul=round(Valaszok::where('oktato','=',$request->tnev)->where('ertekeles','!=',0)->avg('ertekeles'),2);
            //összes kérdés tekintetében az átlagpontszam 0 is benne van!!
            $osszeskerdesatlaganullaval=Valaszok::where('oktato','=',$request->tnev)->avg('ertekeles');
            
            //kérdések szövegének lekérdezése
            
            $kerdesszovege=KolisKerdes::select('kerdesszoveg')->get();
           
            return view('pages.tanarok.eredmenyekkoli')->with([
                'oktato'=>$request['tnev'],
                'ertekeles'=>$ertekeles,
                'osszertekeles'=> $osszertekeles,
                'kerdesek'=>$kerdesek,
                'kerdesekatlagnullaval'=>$kerdesekatlagnullaval,
                'kerdesekatlagnullanelkul'=>$kerdesekatlagnullanelkul,
                'osszeskerdesatlaganullanelkul'=> $osszeskerdesatlaganullanelkul,
                'osszeskerdesatlaganullaval'=>$osszeskerdesatlaganullaval,
                'kerdesszovege'=>$kerdesszovege
            ]);
    
            
        } 
   

}
