<?php

namespace App\Exports;

use App\Models\Valaszok;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exportkitoltes implements FromCollection,  WithHeadings
{
    public function headings(): array   
    {
        return ['sorszam', 'oktato', 'kerdes','valasz', 'updated_at','created_at'];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Valaszok::all();
        
    }
    
}
