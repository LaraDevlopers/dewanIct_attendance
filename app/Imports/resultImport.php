<?php

namespace App\Imports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\ToModel;

class resultImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Result([
            'reg_number'=>$row[1],
            'roll_no'=>$row[2],
            's_name'=>$row[3],
            'f_name'=>$row[4],
            'm_name'=>$row[5],
            'cgpa'=>$row[6],
            'institute'=>$row[7],
            'institute_code'=>$row[8],
            'course_name'=>$row[9],
            'course_duration'=>$row[10],
            'passing_year'=>$row[11],
            'date_of_birth'=>$row[12],
        ]);
    }
}
