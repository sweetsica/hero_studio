<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReportExport implements FromArray, WithMultipleSheets
{
    public function array(): array
    {
       $data = Task::query()->get()->toArray();

        return $data;
    }

    public function sheets(): array
    {
        $sheets = [];

        for ($month = 1; $month <= 12; $month++) {
            $sheets[] = new InvoicesPerMonthSheet($this->year, $month);
        }

        return $sheets;
        // TODO: Implement sheets() method.
    }
}
