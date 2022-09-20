<?php

namespace App\Exports;

use App\Models\Result;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class resultExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function query()
    {
    return Result::query();
    }
}
