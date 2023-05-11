<?php

namespace App\Imports;

use App\Jop;
use Maatwebsite\Excel\Concerns\ToModel;

class JopImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //exchange null in array to none
        foreach ($row as $key => $value) {
            if ($value == "") {
                $row[$key] = '(فارغ)';
            }
        }
        return new Jop([
            'jop_text' => implode(' | ', $row),
        ]);
    }
}
