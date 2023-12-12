<?php

namespace App\Imports;

use App\Models\Osszerendeles;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Osszerendelesimport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) 
    {
       
        return new Osszerendeles([
            //
           
            'elotag' =>$row['elotag'],
            'vezeteknev'=>$row['vezeteknev'],
            'utonev'=>$row['utonev'],
            'oktazon'=>$row['oktatasi_azonosito'],
            'osztalycsoport'=>$row['osztaly_csoport'],
            'tantargy'=>$row['tantargy'],
            'pedagogus'=>$row['pedagogus'],
            'pedom'=>$row['pedagogus_oktatasi_azonosito']
            //a [] közzé az excel fájl fejlécének neveit kell irni ékezet nélkül érdemes átvétel után kiiratdi az átvett adatokat!!
        ]);
    }
}
