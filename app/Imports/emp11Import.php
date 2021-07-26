<?php

namespace App\Imports;

use App\Models\emp1;

use Maatwebsite\Excel\Concerns\ToModel;

class emp11Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new emp1([
            //
        ]);
    }
}
