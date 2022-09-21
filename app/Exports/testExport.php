<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromCollection;

class testExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Result::all();
    }
}
