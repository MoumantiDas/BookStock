<?php

namespace App\Imports;
use excel;
use Illuminate\Support\Facades\Hash;
use App\Models\emp1;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithDrawings;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;


class emp1Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new emp1([
            'name'     => $row[0],
            'email'    => $row[1],
            'salary'     => $row[2],
            'phone'    => $row[3],
            'department'     => $row[4],

        ]);
    }
}
