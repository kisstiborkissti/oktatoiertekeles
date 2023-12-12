<?php

namespace App\Imports;

use App\Models\Tanulok;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Tanulokimport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) 
    {
      
        return new Tanulok([
            //
           
            'nev' =>$row['neve'],
            'oktatasiazonosito'=>$row['oktatasi_azonosito'],
            'anyjaszulnev'=>$row['anyja_szuletesi_neve'],
            'szulhely'=>$row['szuletesi_hely'],
            'szulido'=>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['szuletesi_ido']),
            'tankotelezett'=>$row['tankotelezett'],
            'osztaly'=>$row['osztaly'],
            'kerdes'=>0
            //a [] közzé az excel fájl fejlécének neveit kell irni ékezet nélkül érdemes átvétel után kiiratdi az átvett adatokat!!
        ]);
    }
}
