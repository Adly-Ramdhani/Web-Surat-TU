<?php

namespace App\Exports;

use App\Models\Letter_type;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromMapping;

class NamaMigrationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Letter_type::with('letter')->get();
        return view('klasifikasi.table', compact('letter_type'));
    }

   
} 
