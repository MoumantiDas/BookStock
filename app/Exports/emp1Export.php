<?php

namespace App\Exports;

use App\Models\emp1;
use Maatwebsite\Excel\Concerns\FromCollection;

class emp1Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return emp1::all();
    }
}
