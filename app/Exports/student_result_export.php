<?php

namespace App\Exports;

use App\Models\Result;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class student_result_export implements FromCollection, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Result::all();
    }
    //     public function headings(): array
    // {
    //    return [
    //         '#',
    //         'REG NO',
    //         'ID NO',
    //         'Name',
    //         'MOTHER NAME',
    //         'FATHER NAME',
    //         'INSTITUTE',
    //         'INSTITUTE CODE',
    //         'COURSE NAME',
    //         'COURSE DURATION',
    //         'PASSING YEAR',
    //         'DATE OF BIRTH',
    //         'CREATE AT',
    //         'UPDATED AT',
    //     ];
    // }
}
