<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class resultMultipleSheet implements WithMultipleSheets, SkipsUnknownSheets
{
    /**
    * @param Collection $collection
    */
    public function sheets(): array
    {
        return [
            // new secoendSheet(),
            new FirstSheetImport(),
        ];
    }

    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
}
