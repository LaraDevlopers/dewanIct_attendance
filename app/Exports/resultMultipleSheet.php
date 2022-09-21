<?php

namespace App\Exports;
;

use App\Models\Result;
use DateTime;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class resultMultipleSheet implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize
{
    private $month;
    private $year;

    public function __construct(int $year, int $month)
    {
        $this->month = $month;
        $this->year  = $year;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return Result
            ::query()
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        // return 'Month ' . $this->month;
        return DateTime::createFromFormat('m', $this->month)->format('F');
    }

    public function headings(): array
    {
       return [
            '#',
            'REG NO',
            'ID NO',
            'Name',
            'MOTHER NAME',
            'FATHER NAME',
            'INSTITUTE',
            'INSTITUTE CODE',
            'COURSE NAME',
            'COURSE DURATION',
            'PASSING YEAR',
            'DATE OF BIRTH',
            'CREATE AT',
            'UPDATED AT',
        ];
    }
}
