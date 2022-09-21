<?php

namespace App\Imports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class resultImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Result([
            'reg_number'=>$row['reg_number'],
            'roll_no'=>$row['roll_no'],
            's_name'=>$row['s_name'],
            'f_name'=>$row['f_name'],
            'm_name'=>$row['m_name'],
            'cgpa'=>$row['cgpa'],
            'institute'=>$row['institute'],
            'institute_code'=>$row['institute_code'],
            'course_name'=>$row['course_name'],
            'course_duration'=>$row['course_duration'],
            'passing_year'=>$row['passing_year'],
            'date_of_birth'=>$row['date_of_birth'],
        ]);
    }
}
