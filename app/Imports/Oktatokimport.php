<?php

namespace App\Imports;

use App\Models\Oktatok;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Oktatokimport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) 
    {
       
        return new Oktatok([
            //
           
            'nev' =>$row['nev'],
            'tanev'=>$row['tanev'],
            'szulhely'=>$row['szuletesi_hely'],
            'szulido'=>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['szuletesi_ido']),
            'oktaz'=>$row['oktatasi_azonosito'],
            '2fa'=>$row['2fa'],
            //a [] közzé az excel fájl fejlécének neveit kell irni ékezet nélkül
        ]);
    }
}
